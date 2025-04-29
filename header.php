<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body>
    <header class="supple_header wrapper">
        <div class="header_top">
            <h1 class="header_logo">
                <a href="<?php echo esc_url(home_url('/')) ?>">
                    <img src="<?php echo esc_url(get_theme_file_uri('/images/logo_black.png')); ?>" alt="<?php bloginfo('name'); ?>">
                </a>
            </h1>
            <div class="online_shop_btn sp_only">
                <a href="<?php echo esc_url(home_url('/')) ?>">ONLINE SHOP</a>
            </div>
        </div>

        <nav class="header_nav">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container'      => false,
                'menu_class'     => 'header_nav_list',
                'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
            ));
            ?>
        </nav>
    </header>
    <main>