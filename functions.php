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
    wp_enqueue_style('contact-style', get_template_directory_uri() . '/css/style_contact.css');
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
            'rewrite' => array('slug' => 'menu'),
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

// サムネイル機能を有効化
add_theme_support('post-thumbnails');

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
            'rewrite' => array(
                'slug' => 'blognews',
                'with_front' => false
            ),
        )
    );
}
add_action('init', 'create_blog_news_post_type');

function modify_category_query_for_blog_news($query)
{
    if (!is_admin() && $query->is_main_query() && $query->is_category()) {
        $query->set('post_type', array('blog_news'));
    }
}
add_action('pre_get_posts', 'modify_category_query_for_blog_news');


function change_blog_news_posts_per_page($query)
{
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('blog_news')) {
        $query->set('posts_per_page', 12);
    }
}
add_action('pre_get_posts', 'change_blog_news_posts_per_page');

add_action('phpmailer_init', function ($phpmailer) {
    error_log('phpmailer_init フックが呼ばれた');
    $phpmailer->isSMTP();
    $phpmailer->Host       = SMTP_HOST;
    $phpmailer->SMTPAuth   = true;
    $phpmailer->Port       = SMTP_PORT;
    $phpmailer->Username   = SMTP_USER;
    $phpmailer->Password   = SMTP_PASS;
    $phpmailer->SMTPSecure = SMTP_SECURE;
    $phpmailer->From       = SMTP_FROM;
    $phpmailer->FromName   = SMTP_NAME;

    // SMTP デバッグ出力を強化
    $phpmailer->SMTPDebug = 4; // 詳細なデバッグ出力
    $phpmailer->Debugoutput = function ($str, $level) {
        error_log("SMTP DEBUG: " . $str);
    };
});
