<?php
/*
Template Name: TOP
*/
get_header();
?>

<picture>
    <source media="(max-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/images/bg_top_kv_sp_1.png">
    <img src="<?php echo get_template_directory_uri(); ?>/images/bg_top_kv_1.png" alt="bg_top" class="top_img">
</picture>

<div id="concept" class="concept">
    <h2 class="menu_title">CONCEPT</h2>
    <img src="<?php echo get_template_directory_uri(); ?>/images/pic_top_consept_2.png" alt="top_concept" class="concept_img">
    <h3 class="concept_title">一杯一杯まごころをこめて調製し、新鮮な香りと豊かな 風味のコーヒーを提供します。</h3>
    <p class="concept_description pc_only">親譲りの無鉄砲で小供の時から損ばかりしている。<br>
        小学校に居る時分学校の二階から飛び降りて一週間ほど腰を抜かした事がある。<br>
        なぜそんな無闇をしたと聞く人があるかも知れぬ。</p>
    <p class="concept_description sp_only">親譲りの無鉄砲で小供の時から損ばかりしている。<br>
        小学校に居る時分学校の二階から飛び降りて一週間ほど腰を抜かした事がある。
        なぜそんな無闇をしたと聞く人があるかも知れぬ。</p>
    <a href="<?php echo home_url('/concept'); ?>" class="black_btn">MORE</a>
</div>

<div id="menu" class="menu">
    <h2 class="menu_title">MENU</h2>
    <div class="menu_columns wrapper">
        <?php
        $categories = array('drip' => 'DRIP', 'espresso' => 'ESPRESSO');

        foreach ($categories as $slug => $label) :
        ?>
            <div class="menu_column">
                <h3 class="menu_category_title"><?php echo esc_html($label); ?></h3>

                <?php
                $args = array(
                    'post_type' => 'menu_item',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'menu_category',
                            'field' => 'slug',
                            'terms' => $slug,
                        ),
                    ),
                );
                $menu_query = new WP_Query($args);

                if ($menu_query->have_posts()) :
                    while ($menu_query->have_posts()) : $menu_query->the_post();
                        $menu_name = get_field('menu_name') ?: get_the_title(); // フォールバック
                        $price = get_field('price');
                ?>
                        <div class="menu_item">
                            <span class="menu_item_name"><?php echo esc_html($menu_name); ?></span>
                            <span class="menu_item_price">
                                <?php echo $price ? '¥' . esc_html($price) : ''; ?>
                            </span>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>メニューが登録されていません。</p>';
                endif;
                ?>

            </div>
        <?php endforeach; ?>
    </div>
    <a href="<?php echo esc_url(home_url('/menu')); ?>" class="white_btn">MORE</a>
</div>


<div id="shoplist" class="shoplist wrapper">
    <h2 class="menu_title">SHOP LIST</h2>
    <p>首都圏を中心に6店舗展開しています。<br>
        お近くの店舗でお待ちしています。</p>
    <div class="shop_list">
        <?php
        $args = array(
            'post_type' => 'shop',
            'posts_per_page' => -1
        );
        $shop_query = new WP_Query($args);

        if ($shop_query->have_posts()) :
            while ($shop_query->have_posts()) : $shop_query->the_post();
                $shop_name = get_field('shop_name');
        ?>
                <div class="shop_card">
                    <h3><?php echo esc_html($shop_name); ?></h3>
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>ショップ情報はまだ登録されていません。</p>';
        endif;
        ?>
    </div>
    <a href="<?php echo home_url('/shop'); ?>" class="black_btn">MORE</a>
</div>

<div>
    <img src="<?php echo get_template_directory_uri(); ?>/images/bg_top_separate_1.png" alt="top_separate" class="top_separate">
</div>

<div id="blog" class="blog wrapper">
    <h2 class="menu_title">BLOG & NEWS</h2>
    <div class="news_list">
        <?php
        $args = array(
            'post_type' => 'blog_news',
            'posts_per_page' => 3
        );
        $news_query = new WP_Query($args);

        if ($news_query->have_posts()) :
            while ($news_query->have_posts()) : $news_query->the_post();
        ?>
                <a href="<?php the_permalink(); ?>" class="news_item">
                    <?php if (has_post_thumbnail()): ?>
                        <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>">
                    <?php endif; ?>

                    <p class="news_date"><?php echo get_the_date('Y/m/d'); ?></p>
                    <h3><?php the_title(); ?></h3>
                </a>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>記事がまだありません。</p>';
        endif;
        ?>
    </div>
    <a href="<?php echo esc_url(get_post_type_archive_link('blog_news')); ?>" class="black_btn">MORE</a>
</div>

<?php get_footer(); ?>