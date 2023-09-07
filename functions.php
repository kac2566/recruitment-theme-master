<?php
/** 
 * Project constans
 */

const THEME_DIR = __DIR__;

require get_template_directory() . '/includes/enqueue.php';

if(class_exists('acf_pro')){
    require get_template_directory() . '/includes/acf_register_block.php';
}

add_theme_support( 'menus' );

register_nav_menus( array(
    'header_menu' => __( 'Header Menu' ),
    'footer_menu' => __( 'Footer Menu' ),
));

/**
 * Load the theme support files
 */

require get_template_directory() . '/includes/theme-support/index.php';