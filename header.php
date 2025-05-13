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

        <nav class="header_nav pc_only">
            <ul class="header_nav_list">
                <li id="menu-item-106" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-106"><a href="<?php echo esc_url(home_url('/concept')); ?>">CONCEPT</a></li>
                <li id="menu-item-113" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-113"><a href="<?php echo esc_url(home_url('/menu')); ?>">MENU</a></li>
                <li id="menu-item-114" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-114"><a href="<?php echo esc_url(home_url('/shop')); ?>">SHOPLIST</a></li>
                <li id="menu-item-103" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-103"><a href="<?php echo esc_url(home_url('/blognews')); ?>">BLOG&amp;NEWS</a></li>
                <li id="menu-item-120" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-120"><a href="<?php echo esc_url(home_url('/contact')); ?>">CONTACT</a></li>
                <li id="menu-item-116" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-116"><a href="<?php echo esc_url(home_url('/')); ?>" aria-current="page">ONLINE SHOP</a></li>
            </ul>
        </nav>

        <nav class="header_nav sp_only">
            <ul class="header_nav_list">
                <li id="menu-item-106" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-106"><a href="<?php echo esc_url(home_url('/concept')); ?>">CONCEPT</a></li>
                <li id="menu-item-113" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-113"><a href="<?php echo esc_url(home_url('/menu')); ?>">MENU</a></li>
                <li id="menu-item-114" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-114"><a href="<?php echo esc_url(home_url('/shop')); ?>">SHOPLIST</a></li>
                <li id="menu-item-103" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-103"><a href="<?php echo esc_url(home_url('/blognews')); ?>">BLOG&amp;NEWS</a></li>
                <li id="menu-item-120" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-120"><a href="<?php echo esc_url(home_url('/contact')); ?>">CONTACT</a></li>
            </ul>
        </nav>
    </header>
    <main>