<?php
function add_files() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

add_action('wp_enqueue_scripts', 'add_files');

function my_custom_theme_setup() {
    // サポートする機能を追加
    add_theme_support( 'title-tag' );  // タイトルタグのサポート

    // ナビゲーションメニューのサポート
    register_nav_menus( array(
        'primary' => 'Primary Menu',
    ) );
}
add_action( 'after_setup_theme', 'my_custom_theme_setup' );