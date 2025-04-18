<?php get_header(); ?>

<img src="<?php echo get_template_directory_uri(); ?>/images/page-kv (1).jpg" alt="page-kv" class="shoplist_main_img">

<div class="wrapper">
    <div class="shopdetail_list">
        <?php
        $args = array(
            'post_type' => 'shop',
            'posts_per_page' => -1
        );
        $shop_query = new WP_Query($args);

        if ($shop_query->have_posts()) :
            while ($shop_query->have_posts()) : $shop_query->the_post();
                $shop_img = get_field('shop_img');
                $shop_name = get_field('shop_name');
                $shop_address = get_field('shop_address');
                $tel = get_field('tel');
                $opening_time = get_field('opening_time');
                $closing_time = get_field('closing_time');
                $seats = get_field('seats');
                $smoking = get_field('smoking');
        ?>
                <div class="shopdetail_item">
                    <?php if ($shop_img): ?>
                        <img src="<?php echo esc_url($shop_img['url']); ?>" alt="<?php echo esc_attr($shop_img['alt']); ?>" class="shopdetail_img">
                    <?php endif; ?>
                    <div class="shopdetail_info">
                        <h3 class="shopdetail_name"><?php echo esc_html($shop_name); ?></h3>
                        <p class="shopdetail_address"><?php echo esc_html($shop_address); ?></p>
                        <p class="shopdetail_tel">TEL.<?php echo esc_html($tel); ?></p>
                        <p class="shopdetail_time">営業時間 / <?php echo esc_html($opening_time); ?> - <?php echo esc_html($closing_time); ?></p>
                        <p class="shopdetail_seats">席数 / <?php echo esc_html($seats); ?>席</p>
                        <p class="shopdetail_smoking">喫煙 / <?php echo esc_html($smoking); ?></p>
                    </div>
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>ショップ情報が登録されていません。</p>';
        endif;
        ?>
    </div>
</div>


<?php get_footer(); ?>