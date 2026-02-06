<?php
/**
 * WPBITS_AFE setup
 *
 * @package WPBits Addons For Elementor
 * @since 1.0
 */
 
/**
 * Main WPBITS_AFE Class.
 *
 * @class WPBITS_AFE
 */
final class WPBITS_AFE {

	/**
	 * WPBITS_AFE version.
	 *
	 * @var string
	 */
	public $version = '1.8.1';

	/**
	 * The single instance of the class.
	 *
	 * @var WPBITS_AFE
	 * @since 1.0
	 */
	protected static $_instance = null;

	/**
	 * Main WPBITS_AFE Instance.
	 *
	 * Ensures only one instance of WPBITS_AFE is loaded or can be loaded.
	 *
	 * @since 1.0
	 * @static
	 * @return WPBITS_AFE - Main instance.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * WPBITS_AFE Constructor.
	 */
	public function __construct() {
		$this->define_constants(); 
		$this->includes();
		$this->init_hooks();
	}

	/**
	 * When WP has loaded all plugins, trigger the `wpbits_afe_loaded` hook.
	 *
	 * This ensures `wpbits_afe_loaded` is called only after all other plugins
	 * are loaded, to avoid issues caused by plugin directory naming changing
	 * the load order. 
	 *
	 * @since 1.0
	 */
	public function on_plugins_loaded() {
		do_action( 'wpbits_afe_loaded' );
	}

	/**
	 * Hook into actions and filters.
	 *
	 * @since 1.0
	 */
	private function init_hooks() {
		add_action( 'plugins_loaded', array( $this, 'on_plugins_loaded' ), -1 );		 
		add_action( 'init', array( $this, 'init' ), 0 );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ));
		add_action( 'cmb2_meta_box_url', array( $this, 'cmb2_url_fix' ), 10 );		 
	}
 

	/**
	 * Admin Scripts
	 */
	function admin_scripts($hook){

		wp_enqueue_style('wpbits-afe-admin-global', WPBITS_AFE_PLUGINS_URL . 'assets/admin/admin-global.css', false, WPBITS_AFE_VERSION);

		if ( 'wpbits-afe_page_wpbits_afe_settings' != $hook ) {
			return;
		}
		wp_enqueue_style('wpbits-afe-admin', WPBITS_AFE_PLUGINS_URL . 'assets/admin/admin.css', false, WPBITS_AFE_VERSION);
		wp_enqueue_script('wpbits-afe-admin-tabs' , WPBITS_AFE_PLUGINS_URL . 'assets/admin/tabs.js', array( 'jquery' ), WPBITS_AFE_VERSION, true );
	}


	/**
	 * CMB2 URL fix
	 */
	function cmb2_url_fix($cmb2_url){

		if( isset( $_GET["page"] ) && (	"wpbits_afe_settings" == $_GET["page"] || "wpbits_afe_welcome" == $_GET["page"] ) ){
			if ( defined( "WP_DEBUG" ) && WP_DEBUG ) {
				return plugin_dir_url( __FILE__ ) . '/includes/cmb2';
			}		
		}

		return $cmb2_url;
	}


	/**
	 * Define Constants.
	 */
	private function define_constants() {
		$this->define( 'WPBITS_AFE_ABSPATH', dirname( WPBITS_AFE_PLUGIN_FILE ) . '/' );
		$this->define( 'WPBITS_AFE_PLUGIN_BASENAME', plugin_basename( WPBITS_AFE_PLUGIN_FILE ) );
		$this->define( 'WPBITS_AFE_VERSION', $this->version );	
		$this->define( 'WPBITS_AFE_PLUGINS_URL', plugins_url( '/', WPBITS_AFE_PLUGIN_FILE ) );	
		$this->define( 'WPBITS_AFE_PLUGIN_DIR_PATH', plugin_dir_path( WPBITS_AFE_PLUGIN_FILE ) );	
	}

	/**
	 * Define constant if not already set.
	 *
	 * @param string $name Constant name.
	 * @param string|bool $value Constant value.
	 */
	private function define( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}

	/**
	 * Include required core files used in admin and on the frontend.
	 */
	public function includes() {

		if( (isset( $_GET["page"] ) && ( "wpbits_afe_settings" == $_GET["page"] || "wpbits_afe_welcome" == $_GET["page"] ) ) || ( isset( $_POST["action"] ) && "wpbits_afe_settings" == $_POST["action"] ) ){
			if ( file_exists( dirname( WPBITS_AFE_PLUGIN_FILE ) . '/includes/cmb2/init.php' ) ) {
				require_once dirname( WPBITS_AFE_PLUGIN_FILE ) . '/includes/cmb2/init.php';
			} elseif ( file_exists(  dirname( WPBITS_AFE_PLUGIN_FILE ) . '/includes/CMB2/init.php' ) ) {
				require_once dirname( WPBITS_AFE_PLUGIN_FILE ) . '/includes/CMB2/init.php';
			}
	
			include_once WPBITS_AFE_ABSPATH . 'includes/admin-fields.php';
		}
		
		include_once WPBITS_AFE_ABSPATH . 'includes/image-resize.php';
		include_once WPBITS_AFE_ABSPATH . 'includes/helpers.php'; 
		include_once WPBITS_AFE_ABSPATH . 'includes/settings.php';
		include_once WPBITS_AFE_ABSPATH . 'includes/elementor-config.php';
	}

	/**
	 * Include required frontend files.
	 */
	public function frontend_includes() {
	}
 
	/**
	 * Init WPBITS_AFE when WordPress Initialises.
	 */
	public function init() {
		// Before init action.
		do_action( 'before_wpbits_afe_init' );

		// Set up localisation.
		$this->load_plugin_textdomain();

		// Init action.
		do_action( 'wpbits_afe_init' );
	}

	/**
	 * Load Localisation files.
	 *
	 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
	 *
	 * Locales found in:
	 *      - WP_LANG_DIR/wpbits-addons-for-elementor/wpbits-addons-for-elementor-LOCALE.mo
	 *      - WP_LANG_DIR/plugins/wpbits-addons-for-elementor-LOCALE.mo
	 */
	public function load_plugin_textdomain() {		 
		load_plugin_textdomain( 'wpbits-addons-for-elementor', false, WPBITS_AFE_ABSPATH . 'i18n/languages' );
	} 


}