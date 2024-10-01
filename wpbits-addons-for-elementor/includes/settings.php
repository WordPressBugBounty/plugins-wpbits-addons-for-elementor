<?php
/**
 * 
 * 
 * WP Menu Pages
 * 
 */
function wpbits_afe_menu_pages(){
    

    add_menu_page( esc_html_x('WPBits AFE','Admin Panel','wpbits-addons-for-elementor'), esc_html_x('WPBits AFE','Admin Panel','wpbits-addons-for-elementor'), 'edit_theme_options', 'wpbits_afe_welcome', 'wpbits_afe_welcome', NULL, 50 );    

    
    //chanage the title of the first page in the sub menu
    global $submenu;

    if ( isset( $submenu['wpbits_afe_welcome'] ) ) {
        $submenu['wpbits_afe_welcome'][0][0] = esc_html_x('Welcome','Admin Panel','wpbits-addons-for-elementor');
    }
    
}
add_action('admin_menu', 'wpbits_afe_menu_pages');   



/**
 * 
 * Welcome Page
 * 
 */
if( ! function_exists("wpbits_afe_welcome") ){
	/**
	 * 
	 * Welcome
	 * 
	 * @return output
	 * 
	 */	
	function wpbits_afe_welcome()
	{	
		?>

		<div class="wrap about-wrap">
			<div class="rt-admin-layout-wrapper">
				
				<h1><?php echo WPBITS_AFE_PLUGIN_NAME?></h1>

				<div class="about-text">			 
                    <?php printf( esc_html_x('Thank you for installing %s.','Admin Panel','wpbits-addons-for-elementor'), WPBITS_AFE_PLUGIN_NAME ) ;?>					 
				</div>
 
				<hr />

				<div class="three-col">

					<div class="col">
						<h3><?php echo esc_html_x( 'Documentation','Admin Panel','wpbits-addons-for-elementor' ); ?></h3>
						<p>
							<?php printf( esc_html_x('You can the find online documentation and demos of the plugin at %s','Admin Panel','wpbits-addons-for-elementor'), '<a href="https://wpbits.net" target="_blank">https://wpbits.net</a>' ) ;?>
						</p>
					</div>

					<div class="col">
						<h3><?php echo esc_html_x( 'Support','Admin Panel','wpbits-addons-for-elementor' ); ?></h3>
						<p>
							<?php printf( esc_html_x('If you have any questions regarding this plugin, please let us know %s','Admin Panel','wpbits-addons-for-elementor'), '<a href="https://wpbits.net/contact/" target="_blank">https://wpbits.net/contact/</a>' ) ;?>
						</p>
					</div>

					<div class="col">
						<h3><?php echo esc_html_x( 'Changelog','Admin Panel','wpbits-addons-for-elementor' ); ?></h3>
						<p>
							<?php printf( esc_html_x('Please check the bottom of the development page for the %1$schangelog%2$s','Admin Panel','wpbits-addons-for-elementor'), '<a href="https://wordpress.org/plugins/wpbits-addons-for-elementor/#developers" target="_blank">','</a>' ) ;?>
						</p>
					</div>
				</div>
			</div>
		</div>

		<?php
	}
}


/**
 * 
 * Settings
 * 
 */
add_action( 'cmb2_admin_init', 'wpbits_afe_register_theme_options_metabox' );

function wpbits_afe_register_theme_options_metabox() {

    $get_module_list = wpbits_afe_get_module_list();     

	$cmb_options = apply_filters("wpbits_afe_settings_array",array(
		'id'           => 'wpbits_afe_settings_metabox',
		'title'        => esc_html__( 'WPBits Addons For Elementor', 'wpbits-addons-for-elementor' ) . ' - <span> v' . WPBITS_AFE_VERSION . '</span>',
		'object_types' => array( 'options-page' ),
        'option_key'      => 'wpbits_afe_settings',
        'capability'      => 'manage_options',
        'save_button'     => esc_html__( 'Save Settings', 'wpbits-addons-for-elementor' ),
        'menu_title'      => esc_html__( 'Settings', 'wpbits-addons-for-elementor' ),
        'parent_slug' => 'wpbits_afe_welcome',
		'position'        => 59,
		'vertical_tabs' => false,
        'tabs' => array(
            array(
                'id'    => 'tab-1',
                'icon' => 'dashicons-admin-generic',
                'title' => esc_html__( 'Elements', 'wpbits-addons-for-elementor' ),
                'fields' => array_keys($get_module_list) ,
            ), 
            array(
                'id'    => 'tab-2',
                'icon' => 'dashicons-format-image',
                'title' => esc_html__( 'Lightbox', 'wpbits-addons-for-elementor' ),
                'fields' => array(
                    'lightbox_overlay_color',
                    'lightbox_ui_color',
                    'lightbox_ui_hover_color',
                    'lightbox_icon_size',
                    'lightbox_icon_padding',
                    'lightbox_loader_color',
                    'lightbox_loader_bg_color',
                    'lightbox_caption_size',
                    'lightbox_caption_color',
                    'lightbox_caption_bg',
                    'lightbox_caption_padding'
                ),
            )
        )
    ));
    
    $cmb = new_cmb2_box( $cmb_options );
     
    /**
     * ELEMENTS
     */
    foreach ($get_module_list as $module => $module_vars ) {

        $cmb->add_field( array(
            'name'         => $module_vars["name"],
            'before_field' => '<a href="https://wpbits.net" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a><a href="https://wpbits.net/docs/wpbits-addons-for-elementor/" target="_blank" class="doc-link"><span class="dashicons dashicons-editor-help"></span></a>',
            'id'           => $module,
            'type'         => 'switch',
            'default'      => ''
        ) );
    }
	
    /**
     * Other Settings
     */
    if(isset($cmb_options["settings"])){
        foreach ($cmb_options["settings"] as $key => $setting ) {
            $cmb->add_field( $setting );
        }
    }


    /**
     * LIGHTBOX
     */

    $cmb->add_field(
        array(
            'name' => esc_html__( 'Overlay Color', 'wpbits-addons-for-elementor'),  
            'id' => 'lightbox_overlay_color',
            'type' => 'colorpicker',
            'default' => 'rgba(0,0,0,0.7)',
            'options' => array(
                'alpha' => true, 
            ),
        )
    );
    
    $cmb->add_field(
        array(
            'name' => esc_html__( 'UI Color', 'wpbits-addons-for-elementor'),  
            'id' => 'lightbox_ui_color',
            'type' => 'colorpicker',
            'default' => 'rgba(255,255,255,0.5)',
            'options' => array(
                'alpha' => true, 
            ),
        )
    );
    
    $cmb->add_field(
        array(
            'name' => esc_html__( 'UI Hover Color', 'wpbits-addons-for-elementor'),  
            'id' => 'lightbox_ui_hover_color',
            'type' => 'colorpicker',
            'default' => '#ffffff',
            'options' => array(
                'alpha' => true, 
            ),
        )
    );
    
    $cmb->add_field( array(
        'name' => esc_html__( 'Icon Size (px)', 'wpbits-addons-for-elementor' ),
        'id'   => 'lightbox_icon_size',
        'type' => 'text',
        'default' => 30,
        'attributes' => array(
            'type' => 'number',
            'pattern' => '\d*',
        )
    ) );
    
    $cmb->add_field( array(
        'name' => esc_html__( 'Icon Padding (px)', 'wpbits-addons-for-elementor' ),
        'id'   => 'lightbox_icon_padding',
        'type' => 'text',
        'default' => 25,
        'attributes' => array(
            'type' => 'number',
            'pattern' => '\d*',
        )
    ) );

    $cmb->add_field( array(
        'name' => esc_html__( 'Caption Padding (px)', 'wpbits-addons-for-elementor' ),
        'id'   => 'lightbox_caption_padding',
        'type' => 'text',
        'default' => 10,
        'attributes' => array(
            'type' => 'number',
            'pattern' => '\d*',
        )
    ) );
    
    $cmb->add_field( array(
        'name' => esc_html__( 'Caption Font Size (px)', 'wpbits-addons-for-elementor' ),
        'id'   => 'lightbox_caption_size',
        'type' => 'text',
        'default' => 16,
        'attributes' => array(
            'type' => 'number',
            'pattern' => '\d*',
        )
    ) );
    
    $cmb->add_field(
        array(
            'name' => esc_html__( 'Caption Color', 'wpbits-addons-for-elementor'),  
            'id' => 'lightbox_caption_color',
            'type' => 'colorpicker',
            'default' => '#ffffff',
            'options' => array(
                'alpha' => true, 
            ),
        )
    );
    
    $cmb->add_field(
        array(
            'name' => esc_html__( 'Caption Background Color', 'wpbits-addons-for-elementor'),  
            'id' => 'lightbox_caption_bg',
            'type' => 'colorpicker',
            'default' => 'rgba(0,0,0,0.7)',
            'options' => array(
                'alpha' => true, 
            ),
        )
    );
    
    $cmb->add_field(
        array(
            'name' => esc_html__( 'Loader Color', 'wpbits-addons-for-elementor'),  
            'id' => 'lightbox_loader_color',
            'type' => 'colorpicker',
            'default' => '#000000',
            'options' => array(
                'alpha' => true, 
            ),
        )
    );
    
    $cmb->add_field(
        array(
            'name' => esc_html__( 'Loader Background Color', 'wpbits-addons-for-elementor'),  
            'id' => 'lightbox_loader_bg_color',
            'type' => 'colorpicker',
            'default' => '#ffffff',
            'options' => array(
                'alpha' => true, 
            ),
        )
    );

}

/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string $key     Options array key
 * @param  mixed  $default Optional default value
 * @return mixed           Option value
 */
function wpbits_afe_get_option( $key = '', $default = false ) {
	if ( function_exists( 'cmb2_get_option' ) ) {
		// Use cmb2_get_option as it passes through some key filters.
		return cmb2_get_option( 'wpbits_afe_settings', $key, $default );
	}

	// Fallback to get_option if CMB2 is not loaded yet.
	$opts = get_option( 'wpbits_afe_settings', $default );

	$val = $default;

	if ( 'all' == $key ) {
		$val = $opts;
	} elseif ( is_array( $opts ) && array_key_exists( $key, $opts ) && false !== $opts[ $key ] ) {
		$val = $opts[ $key ];
	}

	return $val;
}
