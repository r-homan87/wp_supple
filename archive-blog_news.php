<?php get_header(); ?>

<img src="<?php echo get_template_directory_uri(); ?>/images/blog&news.jpg" alt="blog&news" class="blog_main_img">

<div class="blog wrapper blog_category">
    <div class="news_list">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php
                $sub_title = get_field('sub_title');
                $custom_image = get_field('custom_image');
                $news_date = get_field('news_date');
                ?>
                <a href="<?php the_permalink(); ?>" class="news_item">
                    <?php if ($custom_image): ?>
                        <img src="<?php echo esc_url($custom_image['url']); ?>" alt="<?php echo esc_attr($custom_image['alt']); ?>">
                    <?php endif; ?>

                    <?php if ($news_date): ?>
                        <p class="news_date">
                            <?php
                            $date = DateTime::createFromFormat('Ymd', $news_date);
                            echo $date ? $date->format('Y/m/d') : esc_html($news_date);
                            ?>
                        </p>
                    <?php endif; ?>

                    <h3><?php the_title(); ?></h3>

                    <?php if ($sub_title): ?>
                        <p><?php echo esc_html($sub_title); ?></p>
                    <?php endif; ?>
                </a>
            <?php endwhile; ?>

            <div class="pagination">
                <?php
                the_posts_pagination(array(
                    'mid_size' => 1,
                    'prev_text' => '<',
                    'next_text' => '>',
                ));
                ?>
            </div>

        <?php else : ?>
            <p>記事がまだありません。</p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>