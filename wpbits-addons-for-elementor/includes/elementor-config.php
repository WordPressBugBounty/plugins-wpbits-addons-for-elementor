<?php
/**
 * Elementor Config File
 *
 * @package WPBits Addons For Elementor
 * @since 1.0
 */

/**
* Module List
*/	
function wpbits_afe_get_module_list() {
    $wpbits_afe_module_list =  array( 
                                    "heading"         => [ "name" => "Heading", "depended_css" => []],
                                    "button"          => [ "name" => "Button", "depended_css" => []],
                                    "dropdown_button" => [ "name" => "Dropdown Button", "depended_css" => ["button"]],
                                    "accordion"       => [ "name" => "Accordion", "depended_css" => ["tabs"]],
                                    "tabs"            => [ "name" => "Tabs", "depended_css" => []],
                                    "tooltip"         => [ "name" => "Tooltip", "depended_css" => []],
                                    "photo_gallery"   => [ "name" => "Photo Gallery", "depended_css" => ["library/featherlight"]],
                                    "banner"          => [ "name" => "Banner", "depended_css" => ["button"]],
                                    "team_member"     => [ "name" => "Team Member", "depended_css" => ["library/masonry","library/featherlight","library/animate"]],
                                    "price_table"     => [ "name" => "Price Table", "depended_css" => ["button"]],
                                    "price_menu"      => [ "name" => "Price Menu", "depended_css" => []],
                                    "logo_grid"       => [ "name" => "Logo Grid", "depended_css" => ["tooltip"]],
                                    "testimonial"     => [ "name" => "Testimonial", "depended_css" => []],
                                    "business_hours"  => [ "name" => "Business Hours", "depended_css" => []],
                                    "login_form"      => [ "name" => "Login Form", "depended_css" => []],
                                    "image_compare"   => [ "name" => "Image Compare", "depended_css" => []],
                                    "countdown"       => [ "name" => "Countdown", "depended_css" => []],
                                    "counter"         => [ "name" => "Counter", "depended_css" => []],
                                    "piechart"        => [ "name" => "Piechart", "depended_css" => []],
                                    "progress_bar"    => [ "name" => "Progress Bar", "depended_css" => []],
                                    "text_rotator"    => [ "name" => "Text Rotator", "depended_css" => []],
                                    "shape"           => [ "name" => "Shape", "depended_css" => []],
                                    "timeline"        => [ "name" => "Timeline", "depended_css" => []],
                                    "hotspot"         => [ "name" => "Hotspot", "depended_css" => []],
                                    "icon-box"        => [ "name" => "Icon Box", "depended_css" => []], 
                                );
                
        
    //Check Contact Form 7 Plugin
    if ( class_exists( "WPCF7" ) ){
        $wpbits_afe_module_list["contact_form_7"] = [ "name" => "Contact Form 7", "depended_css" => []];
    }


    return $wpbits_afe_module_list;
 
}
add_action( "elementor/widgets/widgets_registered", "wpbits_afe_get_module_list", 10, 1 );

/**
* Include Widgets
*/	
function wpbits_afe_widgets() {
    foreach ( wpbits_afe_get_module_list() as $module_name => $settings ) {
        if ( ! wpbits_afe_get_option($module_name))  { 
            include( WPBITS_AFE_ABSPATH . "/includes/widgets/".$module_name.".php" );
        }
    }
}
add_action( "elementor/widgets/widgets_registered", "wpbits_afe_widgets", 10, 1 );

/**
* Register JS files
*/	
function wpbits_afe_js(){
    
    $suffix = ( defined( 'WPBT_SCRIPT_DEBUG' ) && WPBT_SCRIPT_DEBUG ) ? '' : '.min';

    // lib files
    wp_register_script('wpb-afe-imagesloaded' , WPBITS_AFE_PLUGINS_URL . 'assets/js/library/imagesloaded'. $suffix .'.js', array( 'jquery' ), WPBITS_AFE_VERSION, true );
    wp_register_script('wpb-lib-masonry' , WPBITS_AFE_PLUGINS_URL . 'assets/js/library/masonry'. $suffix .'.js', array( 'jquery' ), WPBITS_AFE_VERSION, true );
    wp_register_script('wpb-lib-tabs' , WPBITS_AFE_PLUGINS_URL . 'assets/js/library/tabs'. $suffix .'.js', array( 'jquery' ), WPBITS_AFE_VERSION, true );
    wp_register_script('wpb-lib-lightbox' , WPBITS_AFE_PLUGINS_URL . 'assets/js/library/featherlight'. $suffix .'.js', array( 'jquery' ), WPBITS_AFE_VERSION, true );
    wp_register_script('macy' , WPBITS_AFE_PLUGINS_URL . 'assets/js/library/macy'. $suffix .'.js', array( 'jquery' ), WPBITS_AFE_VERSION, true );
        
    // widget files
    foreach (  wpbits_afe_get_module_list() as $module_name  => $settings ) {
        $file = WPBITS_AFE_PLUGIN_DIR_PATH . 'assets/js/'.$module_name.''. $suffix .'.js';
        if( file_exists($file) ){            
            wp_register_script('wpb-'.$module_name , WPBITS_AFE_PLUGINS_URL . 'assets/js/'.$module_name.''. $suffix .'.js', array( 'jquery' ), WPBITS_AFE_VERSION, true );
        }
    }
}
add_action( 'elementor/frontend/after_register_scripts', 'wpbits_afe_js');

/**
* Register Editor JS
*/	
function wpbits_afe_editor_js(){

    $suffix = ( defined( 'WPBT_SCRIPT_DEBUG' ) && WPBT_SCRIPT_DEBUG ) ? '' : '.min';
    
    // lib files    
    wp_enqueue_script('wpb-lib-lightbox' , WPBITS_AFE_PLUGINS_URL . 'assets/js/library/featherlight'. $suffix .'.js', array( 'jquery' ), WPBITS_AFE_VERSION, true );
    wp_enqueue_script('wpb-afe-imagesloaded' , WPBITS_AFE_PLUGINS_URL . 'assets/js/library/imagesloaded'. $suffix .'.js', array( 'jquery' ), WPBITS_AFE_VERSION, true );
    wp_enqueue_script('wpb-afe-editor' , WPBITS_AFE_PLUGINS_URL . 'assets/js/editor'. $suffix .'.js', array( 'jquery', 'underscore', 'backbone-marionette' ), WPBITS_AFE_VERSION, true );

    wp_localize_script(
        'wpb-afe-editor',
        'WPBEditorParams',
            apply_filters("WPBEditorParams",array(
                'elementor_version' => defined( 'ELEMENTOR_VERSION' ) ? ELEMENTOR_VERSION : 0,
                'wpbURL' => WPBITS_AFE_PLUGINS_URL,
                'home'   => esc_url( home_url( '/' ) ),
                'root'   => esc_url_raw( rest_url() ),
                'nonce'  => wp_create_nonce( 'wp_rest' )
            ))
        );    


    /**
     *  
     * Theme Library
     * 
     */    

    $theme_data = wp_get_theme(); 
    $main_theme_data = $theme_data->parent(); 

    if( ! empty( $main_theme_data ) ){		
        $theme_version = $main_theme_data->get("Version");
        $theme_name  = $main_theme_data->get("Name");
    }else{		
        $theme_version = $theme_data->get("Version");
        $theme_name  = $theme_data->get("Name");
    }
    
    wp_localize_script(
        'wpb-afe-editor',
        'WPBThemeLibrary',
                [            
                    'themeName'    => $theme_name,
                    'themeVersion' => $theme_version,
                    'themeURL'     => get_template_directory_uri(),
                    'templates'    => apply_filters( "WPBITS_AFE_THEME_LIB", "" )
                ]
        );    

    wp_localize_script(
        'wpb-afe-editor',
        'WPBAFEProTemplates',
                [   
                    'templates' => apply_filters( "WPBITS_AFE_PRO_LIB", "" )
                ]
        );    

            
}

add_action( 'elementor/editor/before_enqueue_scripts', 'wpbits_afe_editor_js', 10 );


/**
* Register CSS Files
*/	
function wpbits_afe_css(){
    $suffix = ( defined( 'WPBT_SCRIPT_DEBUG' ) && WPBT_SCRIPT_DEBUG ) ? '' : '.min';
    
    // enqueue font files                       
    $module_list = apply_filters('wpbits_afe_css_modules', wpbits_afe_get_module_list() );

    if( isset( $_GET["elementor-preview"] ) || is_preview() ) {

        foreach ( array_keys($module_list) as $module_name ){     

            if( isset( $module_list[$module_name]["depended_fonts"] ) ){
                foreach( $module_list[$module_name]["depended_fonts"] as $depended_font ){
                    wp_enqueue_style('wpb-lib-fonts-'.$depended_font, WPBITS_AFE_PLUGINS_URL . 'assets/css/fonts/'.$depended_font.'/css/'.$depended_font.'.css', false, WPBITS_AFE_VERSION );            
                }                
            }       

            if( defined("WPBITS_AFE_PRO_VERSION") ){
                if( isset( $module_list[$module_name]["depended_pro_fonts"] ) ){
                    foreach( $module_list[$module_name]["depended_pro_fonts"] as $depended_font ){
                        wp_enqueue_style('wpbits-afe-pro-lib-fonts-'.$depended_font, WPBITS_AFE_PRO_PLUGINS_URL . 'assets/css/fonts/'.$depended_font.'/css/'.$depended_font.'.css', false, WPBITS_AFE_PRO_VERSION );            
                    }                
                }    
            }       
        }
    }

    // frontend
    wp_enqueue_style('wpb-lib-frontend' , WPBITS_AFE_PLUGINS_URL . 'assets/css/frontend'.$suffix.'.css', false, WPBITS_AFE_VERSION );



}
add_action( "wp_enqueue_scripts", "wpbits_afe_css", 10, 1 );


/**
* Combined Assets
*/	
function wpbits_afe_css_combined(){     

    if (isset($_REQUEST['doing_wp_cron']) || wp_doing_ajax()) {
        return false;
    }

    $suffix = ( defined( 'WPBT_SCRIPT_DEBUG' ) && WPBT_SCRIPT_DEBUG ) ? '' : '.min';

    // load all assets inline for preview
    if( isset( $_GET["elementor-preview"] ) || is_preview() ) {
        wp_add_inline_style( 'wpb-lib-frontend', wpbits_afe_get_app_css() );  
        return;
    }          

    $create_cache = false;


    // template id
    if( get_query_var('wpbits_afe_template__id') ){
        $template_id = get_query_var('wpbits_afe_template__id');
    }else{
        $query_object = get_queried_object(); 
        $template_id = isset( $query_object->ID ) ? $query_object->ID : "";
    }    

    // is elementor page
    if( ! wpbits_afe_is_built_with_elementor( $template_id ) ){
        $template_id = "";
    }

    // Check cache file
    if( ! empty( $template_id) ){
        $file_name = "wpbits-afe-".$template_id.".css";
        $cache_file = wpbits_afe_get_custom_css_dir()."".$file_name;

        // craete the cache file
        if( file_exists( $cache_file ) ){

            $filetime = filemtime( $cache_file );

            // check filetime of the plugin css            
            if( file_exists( WPBITS_AFE_PLUGIN_DIR_PATH . 'assets/css/frontend.min.css' ) ){
                if(  $filetime < filemtime( WPBITS_AFE_PLUGIN_DIR_PATH . 'assets/css/frontend.min.css' ) ){
                    $create_cache = true;
                }  
            }        

            if( defined( "WPBITS_AFE_PRO_PLUGIN_DIR_PATH" ) ){
                if( file_exists( WPBITS_AFE_PRO_PLUGIN_DIR_PATH . 'afe/assets/css/afe-styles.min.css' ) ){
                    if(  $filetime < filemtime( WPBITS_AFE_PRO_PLUGIN_DIR_PATH . 'afe/assets/css/afe-styles.min.css' ) ){
                        $create_cache = true;
                    }  
                }
            }

        }else{
            $create_cache = true;                
        }

    }else{ 
        
        $get_template_locations = get_option("wpbits_afe_template_locations");
        $template_ids = array();

        // menu templates
        $menu_templates = isset( $get_template_locations["menu-item"] ) ? $get_template_locations["menu-item"] : array() ;

        foreach( $menu_templates as $location => $location_template_id ){
            $template_ids[] = $location_template_id;
        }

        // header template
        if( isset( $get_template_locations["header"] ) ){
            $template_ids[] = $get_template_locations["header"];       
        }

        // footer template
        if( isset( $get_template_locations["footer"] ) ){
            $template_ids[] = $get_template_locations["footer"];
        }    
                
        //Elementor Pro templates
        $elementorLibTemplates = get_posts(['post_type'=>'elementor_library','fields' => 'ids']);
        if( is_array( $elementorLibTemplates ) ){
            $template_ids = array_merge( $template_ids, $elementorLibTemplates );
        }

        if( empty( $template_ids ) ){
            return;
        }else{
            $file_name = "wpbits-afe-dynamic-global.css";
            $cache_file = wpbits_afe_get_custom_css_dir()."".$file_name;
    
            if( file_exists( $cache_file ) ){

                $create_cache = false;
    
                $filetime = filemtime( $cache_file );
    
                // check filetime of the plugin css            
                if( file_exists( WPBITS_AFE_PLUGIN_DIR_PATH . 'assets/css/frontend.min.css' ) ){
                    if(  $filetime < filemtime( WPBITS_AFE_PLUGIN_DIR_PATH . 'assets/css/frontend.min.css' ) ){
                        $create_cache = true;
                    }  
                }
            }else{
                $create_cache = true;
            }
        }
        
    }
    
    if( $create_cache ){        
        $output = wpbits_afe_get_combined_css( $template_id );
        $output_css = apply_filters("wpbits_afe_combined_css", $output[0] );      
    }
 
    if( $create_cache && isset($file_name) ){     
        wpbits_afe_create_dynamic_css_file( $output_css, $file_name );                
    }

    // enqueue css
    if( ! file_exists( $cache_file ) ){
        wp_add_inline_style( 'wpb-lib-frontend', $output_css );                
    }else{        
        wp_enqueue_style('wpb-lib-assets', wpbits_afe_get_custom_css_url().$file_name, false, WPBITS_AFE_VERSION );
    }
    
}
add_action( "wp_enqueue_scripts", "wpbits_afe_css_combined", 10, 1 );



/**
 * Get combined modules CSS output
 * 
 */
function wpbits_afe_get_combined_css( $template_id ){
  
    $suffix = ( defined( 'WPBT_SCRIPT_DEBUG' ) && WPBT_SCRIPT_DEBUG ) ? '' : '.min';   
  

    $module_list = apply_filters('wpbits_afe_css_modules', wpbits_afe_get_module_list() );
    $module_list_keys = array_keys( $module_list );

    $data = ""; 
    $output = array("","post");// [0] css - [1] location

    // create template_ids array
    $template_ids = array();
    if( ! empty( $template_id ) ){
        $template_ids[] = $template_id;
    }
    
    //Elementor Pro templates
    $elementorLibTemplates = get_posts(['post_type'=>'elementor_library','fields' => 'ids']);
	if( is_array( $elementorLibTemplates ) ){
        $template_ids = array_merge( $template_ids, $elementorLibTemplates );
	}

    // WPBits AFE Pro templates 
    if( defined( "WPBITS_AFE_PRO_PLUGIN_DIR_PATH" ) ){

        if( empty( $template_ids ) ){ 
            $output[1] = "global";
        }

        $get_template_locations = get_option("wpbits_afe_template_locations");


        // menu templates
        $menu_templates = isset( $get_template_locations["menu-item"] ) ? $get_template_locations["menu-item"] : array() ;

        foreach( $menu_templates as $location => $location_template_id ){
            $template_ids[] = $location_template_id;
        }

        // header template
        if( isset( $get_template_locations["header"] ) ){
            $template_ids[] = $get_template_locations["header"];       
        }

        // footer template
        if( isset( $get_template_locations["footer"] ) ){
            $template_ids[] = $get_template_locations["footer"];
        }        
    }

    if( empty( $template_ids ) ){
        return $output;
    }

    // Template contents
    if( ! empty( $template_ids ) && is_array( $template_ids ) ){
        
        foreach( $template_ids as $template_id ){            
            $template_id = apply_filters( 'wpml_object_id', $template_id );      
            $document = Elementor\Plugin::$instance->documents->get_doc_for_frontend( $template_id, false );

            if( $document ){ 
                $data .= json_encode($document->get_elements_data());
            }         
        }
    }

    if( empty( $data ) ){      
        return $output;
    }

    if( $module_list_keys ){
       
        $module_list_keys_fixed = array();
        foreach( $module_list_keys as $m_name ){
            $module_list_keys_fixed[] = "wpb-".$m_name;
        }

        preg_match_all('/('. implode( "|", $module_list_keys_fixed ) .')/m', $data, $used_modules_match, PREG_SET_ORDER, 0);

        $used_modules = array(); 
        foreach( $used_modules_match as $module ){

            if( ! in_array( $module[0], $used_modules ) ){
                array_push( $used_modules, $module[0] );
            }
        }
    }

    $modules_to_include = array();
    $modules_to_include_pro = array();
    $fonts_to_include_pro = array();
    $fonts_to_include = array();

    
    if( isset( $used_modules ) && is_array( $used_modules ) ){
        
        foreach ( $used_modules as $module_name ){             
            
            $module_name = str_replace("wpb-","",$module_name);


            // modules to include
            if( isset( $module_list[$module_name]["plugin"] ) && "pro" === $module_list[$module_name]["plugin"]  ){
                $modules_to_include_pro[] = $module_name;
            }else{
                $modules_to_include[] = $module_name;                                                
            }
            
            // depended modules
            if( isset( $module_list[$module_name]["depended_pro_css"] ) ){
                foreach( $module_list[$module_name]["depended_pro_css"] as $depended_module_name ){
                    $modules_to_include_pro[] = $depended_module_name;                    
                }
            }

            if( isset( $module_list[$module_name]["depended_css"] ) ){
                foreach( $module_list[$module_name]["depended_css"] as $depended_module_name ){
                    $modules_to_include[] = $depended_module_name;                    
                }
            }

            // depended fonts
            if( isset( $module_list[$module_name]["depended_pro_fonts"] ) ){
                foreach( $module_list[$module_name]["depended_pro_fonts"] as $depended_font ){
                    $fonts_to_include_pro[] = $depended_font;                    
                }
            }

            if( isset( $module_list[$module_name]["depended_fonts"] ) ){
                foreach( $module_list[$module_name]["depended_fonts"] as $depended_font ){
                    $fonts_to_include[] = $depended_font;                    
                }
            }

        }
    }

    // include free fonts
    foreach( $fonts_to_include as $depended_font ){

        // skip wpbits theme framework ui fonts
        if( defined("WPBITS_THEME_FRAMEWORK") && "wpbt-framework-ui" === $module_name ){
            continue;
        }

        $font_file = WPBITS_AFE_PLUGIN_DIR_PATH . 'assets/css/fonts/'.$depended_font.'/css/'.$depended_font.'.css' ;
         
        if( file_exists( $font_file ) ){ 
            $font_file_csss = file_get_contents( $font_file );
            $output[0] .= str_replace('../font/',WPBITS_AFE_PLUGINS_URL.'/assets/css/fonts/'.$depended_font.'/font/', $font_file_csss );
        }  
    }                

    // include free modules
    foreach ( $modules_to_include as $module_name ){

        $file =  WPBITS_AFE_PLUGIN_DIR_PATH . 'assets/css/'.$module_name.''.$suffix.'.css';

        if( file_exists( $file ) ){
            $output[0] .= file_get_contents( $file );
        }            
    }

    // include pro fonts
    if( defined("WPBITS_AFE_PRO_VERSION") ){
        foreach( $fonts_to_include as $depended_font ){

            $font_file = WPBITS_AFE_PRO_PLUGIN_DIR_PATH . 'assets/css/fonts/'.$depended_font.'/css/'.$depended_font.'.css' ;
            
            if( file_exists( $font_file ) ){ 
                $font_file_csss = file_get_contents( $font_file );
                $output[0] .= str_replace('../font/',WPBITS_AFE_PRO_PLUGINS_URL.'/assets/css/fonts/'.$depended_font.'/font/', $font_file_csss );
            }  
        }         
            
        // include pro modules
        foreach ( $modules_to_include_pro as $module_name ){
            
            $file =  WPBITS_AFE_PRO_PLUGIN_DIR_PATH . 'afe/assets/css/'.$module_name.''.$suffix.'.css';
            if( file_exists( $file ) ){
                $output[0] .= file_get_contents( $file );  
            }   
        }
    }

    $output[0] = wpbits_afe_replace_css_strings( $output[0] );

    return $output;
}


/**
 * 
 * Get all modules combined as a single CSS output
 * 
 */
function wpbits_afe_get_app_css(){

    $suffix = ( defined( 'WPBT_SCRIPT_DEBUG' ) && WPBT_SCRIPT_DEBUG ) ? '' : '.min';   
     
    $output = ""; 

    $file = WPBITS_AFE_PLUGIN_DIR_PATH . 'assets/app'.$suffix.'.css' ;

    if( file_exists( $file ) ){
        $output .= file_get_contents( $file );  
    }

    // include pro 
    if( defined("WPBITS_AFE_PRO_VERSION") ){

        $file =  WPBITS_AFE_PRO_PLUGIN_DIR_PATH . 'afe/assets/app'.$suffix.'.css';

        if( file_exists( $file ) ){ 
            $output .= file_get_contents( $file );
        }  
    }
    
    return wpbits_afe_replace_css_strings($output);
}


/**
 * 
 * Replace CSS strings
 * 
 */
 if( ! function_exists("wpbits_afe_replace_css_strings") ){
     function wpbits_afe_replace_css_strings( $css = "" ){

        // Elementor Breakpoints
        $active_kit_id = \Elementor\Plugin::$instance->kits_manager->get_active_id();
        $kit = \Elementor\Plugin::$instance->documents->get( $active_kit_id ); 
        $meta_key = \Elementor\Core\Settings\Page\Manager::META_KEY;
        $kit_raw_settings = $kit->get_meta( $meta_key );
        
        $breakpoint_md = isset( $kit_raw_settings["viewport_md"] ) && ! empty( $kit_raw_settings["viewport_md"] ) ? $kit_raw_settings["viewport_md"] : 768;
        $breakpoint_lg = isset( $kit_raw_settings["viewport_lg"] ) && ! empty( $kit_raw_settings["viewport_lg"] ) ? $kit_raw_settings["viewport_lg"] : 1025;
    
        
        // replace WPBits env values
        return strtr($css,[
            'env(--wpbits-afe-elementor-viewport-md)' => $breakpoint_md."px",
            'env(--wpbits-afe-elementor-viewport-lg)' => $breakpoint_lg."px",
            'env(--wpbits-afe-elementor-viewport-md-p1)' => ($breakpoint_md+1)."px",
            'env(--wpbits-afe-elementor-viewport-lg-p1)' => ($breakpoint_lg+1)."px",    
            'env(--wpbits-afe-elementor-viewport-md-m1)' => ($breakpoint_md-1)."px",
            'env(--wpbits-afe-elementor-viewport-lg-m1)' => ($breakpoint_lg-1)."px",                        
        ]);

     }
}



/**
 * 
 * Delete cache files
 * 
 */ 
function wpbits_afe_delete_cache( $post_id, $post, $update ) {

    if( ! $update ){
        return;
    }

    global $wp_filesystem;

    if (empty($wp_filesystem)) {
        require_once (ABSPATH . '/wp-admin/includes/file.php');
        WP_Filesystem();
    }

    $css_cache_folder = wpbits_afe_get_custom_css_dir();

    if( $wp_filesystem->is_dir( $css_cache_folder ) ){
        $wp_filesystem->rmdir( wpbits_afe_get_custom_css_dir(), true );
    }

}
add_action( 'save_post', 'wpbits_afe_delete_cache', 100,3 );

/**
* Lightbox Inline Styles
*/	
function wpbits_afe_lightbox_styles() {
    $overlay_color = wpbits_afe_get_option('lightbox_overlay_color');
    $ui_color = wpbits_afe_get_option('lightbox_ui_color');
    $ui_hover_color = wpbits_afe_get_option('lightbox_ui_hover_color');
    $icon_size = wpbits_afe_get_option('lightbox_icon_size');
    $icon_padding = wpbits_afe_get_option('lightbox_icon_padding'); 
    $loader_color = wpbits_afe_get_option('lightbox_loader_color');
    $loader_bg_color = wpbits_afe_get_option('lightbox_loader_bg_color');  
    $caption_size = wpbits_afe_get_option('lightbox_caption_size');
    $caption_color = wpbits_afe_get_option('lightbox_caption_color');
    $caption_bg = wpbits_afe_get_option('lightbox_caption_bg');
    $caption_padding = wpbits_afe_get_option('lightbox_caption_padding');
    
    $inline_style = '';
    
    if ((!empty($caption_size)) && ($caption_size != '16')) {
        $inline_style .= '.featherlight .wpb-gallery-caption {font-size: ' . $caption_size . 'px;}';
    }
    
    if ((!empty($caption_color)) && ($caption_color != '#ffffff')) {
        $inline_style .= '.featherlight .wpb-gallery-caption {color: ' . $caption_color . ';}';
    }
    
    if ((!empty($caption_bg)) && ($caption_bg != 'rgba(0,0,0,0.7)')) {
        $inline_style .= '.featherlight .wpb-gallery-caption {background-color: ' . $caption_bg . ';}';
    }
    
    if ((!empty($caption_padding)) && ($caption_padding != '20')) {
        $inline_style .= '.featherlight .wpb-gallery-caption {padding-top: ' . $caption_padding . 'px;padding-bottom: ' . $caption_padding . 'px;}';
    }
    
    if ((!empty($overlay_color)) && ($overlay_color != 'rgba(0,0,0,0.7)')) {
        $inline_style .= '.featherlight:last-of-type {background: ' . $overlay_color . ';}';
    }
    
    if ((!empty($ui_color)) && ($ui_color != 'rgba(255,255,255,0.5)')) {
        $inline_style .= '.featherlight-next,.featherlight-previous,.featherlight .featherlight-close-icon {color: ' . $ui_color . ';}';
    }
    
    if ((!empty($ui_hover_color)) && ($ui_hover_color != '#ffffff')) {
        $inline_style .= '.featherlight-next:hover,.featherlight-previous:hover,.featherlight .featherlight-close-icon:hover {color: ' . $ui_hover_color . ';}';
    }
    
    if ((!empty($icon_size)) && ($icon_size != '30')) {
        $inline_style .= '.featherlight-next,.featherlight-previous,.featherlight .featherlight-close-icon {font-size: ' . $icon_size . 'px;line-height: ' . $icon_size . 'px;}';
    }
    
    if ((!empty($icon_padding)) && ($icon_padding != '25')) {
        $inline_style .= '.featherlight-previous {left: ' . $icon_padding . 'px;}';
        $inline_style .= '.featherlight-next {right: ' . $icon_padding . 'px;}';
        $inline_style .= '.featherlight .featherlight-close-icon {top: ' . $icon_padding . 'px;right: ' . $icon_padding . 'px;}';
    }
    
    if ((!empty($loader_color)) && ($loader_color != '#000000')) {
        $inline_style .= '.featherlight-loading .featherlight-content {border-top-color: ' . $loader_color . ';}';
    }
    
    if ((!empty($loader_bg_color)) && ($loader_bg_color != '#000000')) {
        $inline_style .= '.featherlight-loading .featherlight-content {border-bottom-color: ' . $loader_bg_color . ';border-left-color: ' . $loader_bg_color . ';border-right-color: ' . $loader_bg_color . ';}';
    }
    
    wp_add_inline_style( 'wpb-lib-lightbox', $inline_style );
}

add_action('elementor/frontend/after_enqueue_styles','wpbits_afe_lightbox_styles', 9, 1 );

/**
* Add Elementor Category
*/	
function wpbits_afe_category(){
    
    Elementor\Plugin::instance()->elements_manager->add_category(
        'wpbits-elementor-addons',
        [
            'title'  => WPBITS_AFE_PLUGIN_NAME,
            'icon' => 'font'
        ],
        1
    );
}
add_action('elementor/init','wpbits_afe_category');

/**
 * 
 * Enqueue admin styles
 * 
 */
function wpbits_afe_admin_style() {
    
    $suffix = ( defined( 'WPBT_SCRIPT_DEBUG' ) && WPBT_SCRIPT_DEBUG ) ? '' : '.min';

    wp_enqueue_style('wpb-lib-modal' , WPBITS_AFE_PLUGINS_URL . 'assets/css/modal'.$suffix.'.css', false, WPBITS_AFE_VERSION );

} 

add_action( "elementor/editor/after_enqueue_styles", "wpbits_afe_admin_style", 10, 1 );

/**
 * 
 * Get data
 * 
 */
function wpbits_afe_get_data( $data ) {
 
    if( ! isset( $data[ 'tid' ] ) ) {
        return rest_ensure_response( false );
    }
   
    if( $data['istheme'] == "local" ){
        if( strpos($data["tid"], "wpb-pro-") !== false ){
            $pro_templates = apply_filters( "WPBITS_AFE_PRO_LIB", array() );
            $response = wp_remote_get( $pro_templates[ str_replace("wpb-pro-","",$data["tid"] ) ]->templateUrl );     
        }else{
            $response = wp_remote_get( WPBITS_AFE_PLUGINS_URL ."assets/js/templates/template-".$data["tid"].".json" ); 
        }
    }else{
        $theme_templates = apply_filters( "WPBITS_AFE_THEME_LIB", array() );
        $response = wp_remote_get( $theme_templates[$data["tid"]]["templateUrl"] );     
    }

    // process json
    $response = wpbits_process_json( json_decode( $response["body"], true ) );

    return rest_ensure_response( $response );    
}

/**
 * 
 *  Restroute for local
 * 
 */
function wpbits_afe_rest_route() {
    register_rest_route( 'wpbits-afe', 'get-json/(?P<istheme>[a-zA-Z0-9-]+)/(?P<tid>[a-zA-Z0-9-]+)', array(
        'methods' => 'GET',
        'callback' => 'wpbits_afe_get_data',
        'permission_callback' => function() {
            return current_user_can( 'edit_posts' );
        },
        'args' => array(
            'tid' => array( 
                'validate_callback' => function( $param, $request, $key ) {
                    return esc_url($param);
                }
            ),
            'istheme' => array( 
                'validate_callback' => function( $param, $request, $key ) {
                    return esc_url($param);
                }
            ),            
        )                    
    )
);
}
add_action( 'rest_api_init', 'wpbits_afe_rest_route', 10 );
 


/**
 * 
 * Get Previously Uploaded Image
 * 
 */
function wpbits_afe_get_image( $hash ){
    global $wpdb;

    $post_id = $wpdb->get_var(
        $wpdb->prepare(
            'SELECT `post_id` FROM `' . $wpdb->postmeta . '` WHERE `meta_key` = \'_wpbits_afe_image_hash\' AND `meta_value` = %s ;', 
            $hash
        )
    );

    if ( $post_id ) {
        return [
            'id' => $post_id,
            'url' => wp_get_attachment_url( $post_id ),
        ];
    }
    
    return false;
}


/**
 * 
 * Process JSON
 * 
 */
function wpbits_process_json( $response, $collect = "" ){

	$collect = empty($collect) ? [] : $collect;

	foreach( $response as $key => $value  ){
		
		if( is_array( $value ) ){
          
			if( isset( $value["url"] ) ) {
                
                preg_match('/.(mov|mp4|m4a|m4v|mpg|mpeg|wmv|avi|flv|3gp|3gpp|3g2|3gp2|mp3|jpg|jpeg|png|svg)/', $value["url"], $matches );
                
                if( empty( $matches ) ){
                    continue;
                }

                /**
                 * get previously uploaded image id/url or upload 
                 */
                $get_saved_image = wpbits_afe_get_image( sha1( $value["url"] ) );

                if( $get_saved_image ){
                    $value["id"] = $get_saved_image["id"];
                    $value["url"] = $get_saved_image["url"];
                    $collect[$key] = $value;
                }else{
                     
                    $newAttachmentID = wpbits_afe_handle_upload( $value );

                    if( isset($newAttachmentID["url"]) && isset($newAttachmentID["id"]) ){ 
                        $value["id"] = $newAttachmentID["id"];  
                        $value["url"] = $newAttachmentID["url"];                        
                    }

                    $collect[$key] = $value;
                }


            }elseif( ( $key === "wp_gallery" || $key === "gallery" ) && is_array( $value ) ){  
                
                    $value_ = [];
         
                    foreach( $value as $gallery_item ){

                        /**
                         * get previously uploaded image id/url or upload 
                         */
                        $get_saved_image = wpbits_afe_get_image( sha1( $gallery_item["url"] ) );

                        if( $get_saved_image ){
                            $gallery_item["id"] = $get_saved_image["id"];
                            $gallery_item["url"] = $get_saved_image["url"];                            
                        }else{
                            $newAttachmentID = wpbits_afe_handle_upload( $gallery_item );
                            $gallery_item["id"] = $newAttachmentID["id"];
                            $gallery_item["url"] = $newAttachmentID["url"];
                        }
                                                

                        $value_[] = $gallery_item; 
                    }

                   $collect[$key] = $value_;
                     
                     
			}else{
				$collect[$key] = wpbits_process_json($value);
            }
            

		}else{
            $collect[$key] = $value; 
		}

	}

	return $collect;
}


/**
 * 
 * Handle Media Upload
 * 
 */
 function wpbits_afe_handle_upload( $attachment ) {

        //get xml content & store 
        global $wp_filesystem;
    

        if (empty($wp_filesystem)) {
            require_once (ABSPATH . '/wp-admin/includes/file.php');
            WP_Filesystem();
        }

        require_once(  ABSPATH . '/wp-admin/includes/image.php' );

        // Extract the file name and extension from the url.
        $filename = basename( $attachment['url'] );

       
        /***
         * 
         * 
         * TO-DO: Test wp_safe_remote_get instead of wp_remote_get
         * wp_safe_remote_get fails on localhost URL's
         * 
         */
        $file_content = wp_remote_retrieve_body( wp_remote_get( $attachment['url'] ) );

        if ( empty( $file_content ) ) {
            return false;
        }

        $upload = wp_upload_bits(
            $filename,
            null,
            $file_content
        );

        $post = [
            'post_title' => $filename,
            'guid' => $upload['url'],
        ];

        $info = wp_check_filetype( $upload['file'] );

        if ( $info ) {
            $post['post_mime_type'] = $info['type'];
        } else {
            return $attachment;
        }

        $post_id = wp_insert_attachment( $post, $upload['file'] );

        wp_update_attachment_metadata(
            $post_id,
            wp_generate_attachment_metadata( $post_id, $upload['file'] )
        );
        
        update_post_meta( $post_id, '_wpbits_afe_image_hash', sha1( $attachment['url'] ) );

        $new_attachment = [
            'id' => $post_id,
            'url' => $upload['url'],
        ];

        return $new_attachment;
 }

 /**
  *
  *  Pro Templates
  *
  */
  add_action("init",function(){
	
    add_filter( "WPBITS_AFE_PRO_LIB", function( $WPBL_Templates ){

        // Check for transient, if none, grab remote file
        if ( false === ( $data = get_transient( 'wpbits-afe-pro-tmplts' ) ) ) {
 
            $site_url = urlencode(strtr(get_site_url(),array("http://" => "", "https://" => "","/" => "#")));
            $file_content = wp_remote_get( 'https://wpbits.net/wp-json/wpbits-afe-pro/prod/'.rand(1,15).'-'. $site_url );

            if ( is_wp_error( $file_content ) ) {
                return $WPBL_Templates;
            }

            // Parse remote file
            $data = wp_remote_retrieve_body( $file_content );

            // Check for error
            if ( is_wp_error( $data ) || empty( $data ) ) {
                return $WPBL_Templates;
            }

            // data transient, expire after 12 hours
            set_transient( 'wpbits-afe-pro-lib', $data, 12 * HOUR_IN_SECONDS );     

        }

        return json_decode($data);        

    }, 1);


},5); 




if( ! function_exists("wpbits_afe_is_built_with_elementor") ){
	/**
	 * Check if is built with elementor
	 * 
	 * @return bool
	 */
	function wpbits_afe_is_built_with_elementor( $postid = "" ) { 
		
		if( empty( $postid ) ){
			$postid = get_the_ID();
		}
			
		return ! ! get_post_meta( $postid, '_elementor_edit_mode', true );
	}
} 

