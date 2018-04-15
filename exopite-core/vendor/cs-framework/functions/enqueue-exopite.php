<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Framework admin enqueue style and scripts
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function cs_admin_enqueue_scripts( $current_page ) {

    // Loading only if need to (theme options, pages, posts and any post types, beacuse of the meta boxes)
    $allowed_pages = array( 'post.php', 'post-new.php', 'appearance_page_cs-framework' );
    if( ! in_array( $current_page, $allowed_pages ) ) return;

    // admin utilities
    wp_enqueue_media();

    // wp core styles
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_style( 'wp-jquery-ui-dialog' );

    // framework core styles
    wp_enqueue_style( 'cs-framework', CS_URI .'/assets/css/cs-framework.css', array(), '1.0.0', 'all' );
    //wp_enqueue_style( 'font-awesome', CS_URI .'/assets/css/font-awesome.css', array(), '4.2.0', 'all' );
    wp_enqueue_style( 'cs-extra-css', CS_URI .'/assets/css/cs-extra.css', array(), '1.0.0', 'all' );

    if ( is_rtl() ) {
      wp_enqueue_style( 'cs-framework-rtl', CS_URI .'/assets/css/cs-framework-rtl.css', array(), '1.0.0', 'all' );
    }

    // wp core scripts
    wp_enqueue_script( 'wp-color-picker' );
    wp_enqueue_script( 'jquery-ui-dialog' );
    wp_enqueue_script( 'jquery-ui-sortable' );
    wp_enqueue_script( 'jquery-ui-accordion' );

    // framework core scripts
    wp_enqueue_script( 'cs-plugins', CS_URI .'/assets/js/cs-plugins.js',    array(), '1.0.0', true );
    wp_enqueue_script( 'cs-framework', CS_URI .'/assets/js/cs-framework.js',  array( 'cs-plugins' ), '1.0.0', true );
    wp_enqueue_script( 'cs-extra-js', CS_URI .'/assets/js/cs-extra.js',  array( 'cs-plugins' ), '1.0.0', true );

    // Enqueue ACE scripts only in theme options
    if( $current_page == 'appearance_page_cs-framework' ) {

        // ace scripts
        wp_enqueue_script( 'cs-vendor-ace', CS_URI .'/assets/js/vendor/ace.js', array(), '1.0.0', true );
        wp_enqueue_script( 'cs-vendor-ace-mode', CS_URI .'/assets/js/vendor/mode-css.js', array( 'cs-vendor-ace' ), '1.0.0', true );
        wp_enqueue_script( 'cs-vendor-ace-language_tools', CS_URI .'/assets/js/vendor/ext-language_tools.js', array( 'cs-vendor-ace' ), '1.0.0', true );
    }

    wp_enqueue_script( 'cs-vendor-ace-load', CS_URI .'/assets/js/vendor/ace-load.js', array( 'cs-vendor-ace' ), '1.0.0', true );
}
add_action( 'admin_enqueue_scripts', 'cs_admin_enqueue_scripts' );