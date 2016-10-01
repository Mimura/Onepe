<?php //子テーマで利用する関数を書く

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

/**
 * Created by PhpStorm.
 * User: nasig
 * Date: 2016/10/01
 * Time: 14:51
 */