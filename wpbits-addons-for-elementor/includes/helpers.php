<?php

/**
 * Helper functions
 */
if ( !function_exists( 'wpb_get_posts' ) ) {
    /**
     * 
     * Retrive posts of a post type
     * 
     */
    function wpb_get_posts(  $post_type = "post"  ) {
        $args = add_query_arg( array(
            'post_type'   => $post_type,
            'numberposts' => 1000,
        ) );
        $posts = get_posts( $args );
        // Properly format the array.
        $items = array();
        foreach ( $posts as $post ) {
            $items[$post->ID] = $post->post_title;
        }
        wp_reset_postdata();
        return $items;
    }

}
if ( !function_exists( "wpbits_afe_create_dynamic_css_file" ) ) {
    /**
     * create dynamic css file
     */
    function wpbits_afe_create_dynamic_css_file(  $output = "", $file_name = ""  ) {
        // create cache folder
        if ( !file_exists( wpbits_afe_get_custom_css_dir() ) ) {
            wpbits_afe_create_css_dir();
        }
        if ( wpbits_afe_is_css_dir_writeable() && !empty( $output ) ) {
            global $wp_filesystem;
            if ( empty( $wp_filesystem ) ) {
                require_once ABSPATH . '/wp-admin/includes/file.php';
                WP_Filesystem();
            }
            $comment = '/*' . "\n";
            $comment .= '* This is a dynamically generated css file by WPBits Addons For Elementor plugin. Do not edit.' . "\n";
            $comment .= '* Created on ' . date( "d-M-y H:i:s" ) . "\n";
            $comment .= '*/' . "\n";
            $wp_filesystem->put_contents( wpbits_afe_get_custom_css_dir() . sanitize_file_name( $file_name ), $comment . $output, FS_CHMOD_FILE );
        }
    }

}
if ( !function_exists( "wpbits_afe_is_css_dir_writeable" ) ) {
    /**
     * Check if the css dir is writable
     * 
     * @return bool
     */
    function wpbits_afe_is_css_dir_writeable() {
        return is_writable( wpbits_afe_get_custom_css_dir() );
    }

}
if ( !function_exists( "wpbits_afe_get_custom_css_dir" ) ) {
    /**
     * Get custom css dir
     * 
     * @return $dir
     */
    function wpbits_afe_get_custom_css_dir() {
        $upload_path = wp_upload_dir();
        $dir = $upload_path['basedir'] . "/wpbits-addons-for-elementor/";
        return $dir;
    }

}
if ( !function_exists( "wpbits_afe_get_custom_css_url" ) ) {
    /**
     * Get custom css url
     * 
     * @return $dir
     */
    function wpbits_afe_get_custom_css_url() {
        $upload_path = wp_upload_dir();
        if ( is_ssl() ) {
            $upload_path['baseurl'] = str_replace( "http://", "https://", $upload_path['baseurl'] );
            $upload_path['url'] = str_replace( "http://", "https://", $upload_path['url'] );
        }
        $url = $upload_path['baseurl'] . "/wpbits-addons-for-elementor/";
        return $url;
    }

}
if ( !function_exists( "wpbits_afe_create_dir" ) ) {
    /**
     * Creates a new dir
     * 
     * @return $dir
     */
    function wpbits_afe_create_dir(  $dir = ""  ) {
        if ( $dir == "" ) {
            return;
        }
        wp_mkdir_p( $dir );
    }

}
if ( !function_exists( "wpbits_afe_create_css_dir" ) ) {
    /**
     * Create the dynamic custom css dir
     * 
     * @return $dir
     */
    function wpbits_afe_create_css_dir() {
        wpbits_afe_create_dir( wpbits_afe_get_custom_css_dir() );
    }

}
if ( !function_exists( "wpbits_afe_get_theme_data" ) ) {
    /**
     * Get Theme Version 
     *
     * Returns the theme version of orginal theme only not childs
     * 
     * @return array("theme name","version")
     */
    function wpbits_afe_get_theme_data() {
        $theme_data = wp_get_theme();
        $main_theme_data = $theme_data->parent();
        if ( !empty( $main_theme_data ) ) {
            return array($main_theme_data->template, $main_theme_data->get( "Version" ));
        } else {
            return array($theme_data->template, $theme_data->get( "Version" ));
        }
    }

}
if ( !function_exists( "wpbits_afe_check_support" ) ) {
    /**
     * Check current installed theme	
     */
    function wpbits_afe_check_support() {
        if ( defined( "RT_EXTENSIONS_SLUG" ) ) {
            return true;
        }
        return false;
    }

}
if ( !function_exists( 'wpbits_afe_fs' ) ) {
    /**
     * Integration 
     */
    function wpbits_afe_fs() {
        global $wpbits_afe_fs;
        if ( !isset( $wpbits_afe_fs ) && !wpbits_afe_check_support() ) {
            require_once WPBITS_AFE_ABSPATH . 'freemius/start.php';
            $wpbits_afe_fs = fs_dynamic_init( array(
                'id'             => '8193',
                'slug'           => 'wpbits-addons-for-elementor',
                'premium_slug'   => 'wpbits-addons-for-elementor-pro',
                'type'           => 'plugin',
                'public_key'     => 'pk_f2ccf50952cfc09cf4f0443d4ad4b',
                'is_premium'     => false,
                'premium_suffix' => 'Pro',
                'has_addons'     => false,
                'has_paid_plans' => true,
                'menu'           => array(
                    'slug'       => 'wpbits_afe_welcome',
                    'first-path' => 'admin.php?page=wpbits_afe_welcome',
                    'support'    => false,
                ),
                'is_live'        => true,
            ) );
        }
        return $wpbits_afe_fs;
    }

    wpbits_afe_fs();
    do_action( 'wpbits_afe_fs_loaded' );
}