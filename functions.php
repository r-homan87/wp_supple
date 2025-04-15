<?php
function add_files()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('top-style', get_template_directory_uri() . '/css/style_top.css');
    wp_enqueue_style('concept-style', get_template_directory_uri() . '/css/style_concept.css');
    wp_enqueue_style('menu-style', get_template_directory_uri() . '/css/style_menu.css');
    wp_enqueue_style('shoplist-style', get_template_directory_uri() . '/css/style_shoplist.css');
    wp_enqueue_style('blog-style', get_template_directory_uri() . '/css/style_blog.css');
    wp_enqueue_style('error-style', get_template_directory_uri() . '/css/style_404.css');
}

add_action('wp_enqueue_scripts', 'add_files');

function my_custom_theme_setup()
{
    // サポートする機能を追加
    add_theme_support('title-tag');  // タイトルタグのサポート

    // メニュー
    register_nav_menus(
        array(
            'main-menu' => 'メインメニュー',
        )
    );
}
add_action('after_setup_theme', 'my_custom_theme_setup');

function create_menu_post_type()
{
    register_post_type(
        'menu',
        array(
            'labels' => array(
                'name' => 'メニュー',
                'singular_name' => 'メニュー'
            ),
            'public' => true,
            'has_archive' => false,
            'menu_position' => 5,
            'supports' => array('title', 'thumbnail'),
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'create_menu_post_type');

function add_menu_meta_boxes()
{
    add_meta_box('menu_details', 'メニュー詳細', 'menu_meta_box_callback', 'menu', 'normal', 'high');
}
add_action('add_meta_boxes', 'add_menu_meta_boxes');

function create_custom_post_type()
{
    register_post_type(
        'menu_item', // 投稿タイプのスラッグ
        array(
            'labels' => array(
                'name' => 'メニュー',
                'singular_name' => 'メニュー',
            ),
            'public' => true,
            'has_archive' => true,
            'menu_position' => 5,
            'supports' => array('title', 'editor', 'thumbnail'),
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'create_custom_post_type');

function register_menu_item_taxonomy()
{
    register_taxonomy(
        'menu_category',  // タクソノミーのスラッグ
        'menu_item',      // このタクソノミーを紐づける投稿タイプ
        array(
            'label' => 'メニューカテゴリー',
            'hierarchical' => true, // trueでカテゴリー型
            'public' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'rewrite' => array('slug' => 'menu_category'),
            'show_in_rest' => true, // ブロックエディター対応
        )
    );
}
add_action('init', 'register_menu_item_taxonomy');

function create_shop_post_type()
{
    register_post_type('shop', array(
        'labels' => array(
            'name' => 'ショップリスト',
            'singular_name' => 'ショップ',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 6,
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'create_shop_post_type');

function create_blog_news_post_type()
{
    register_post_type(
        'blog_news',
        array(
            'labels' => array(
                'name' => 'BLOG & NEWS',
                'singular_name' => 'BLOG & NEWS'
            ),
            'public' => true,
            'has_archive' => true,
            'menu_position' => 6,
            'supports' => array('title', 'editor', 'thumbnail'),
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'create_blog_news_post_type');
