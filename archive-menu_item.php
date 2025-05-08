<?php get_header(); ?>

<img src="<?php echo get_template_directory_uri(); ?>/images/page-kv.jpg" alt="page-kv" class="menu_main_img">

<div class="menu_intro wrapper">
    <h2 class="menu_intro_title">使用しているコーヒー豆を紹介します</h2>
    <p class="menu_intro_text">
        SUPPLEでは上質なコーヒー豆を<br>
        世界中から直接輸入しています。
    </p>
</div>

<div class="menu_list wrapper">
    <?php if (have_posts()) : while (have_posts()) : the_post();
            $menu_img = get_field('menu_img');
            $menu_name = get_field('menu_name');
            $price = get_field('price');
            $menu_details = get_field('menu_details');
    ?>
            <div class="menu_block_item">
                <?php if ($menu_img): ?>
                    <img src="<?php echo esc_url($menu_img['url']); ?>" alt="<?php echo esc_attr($menu_img['alt']); ?>" class="menu_item_img">
                <?php endif; ?>
                <div class="menu_item_content">
                    <h3 class="menu_item_name"><?php echo esc_html($menu_name); ?></h3>
                    <p class="menu_item_price">¥<?php echo esc_html($price); ?></p>
                    <p class="menu_item_details"><?php echo esc_html($menu_details); ?></p>
                </div>
            </div>
        <?php endwhile;
    else : ?>
        <p>メニューがまだ登録されていません。</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>