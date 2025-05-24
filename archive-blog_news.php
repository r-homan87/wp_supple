<?php get_header(); ?>

<img src="<?php echo get_template_directory_uri(); ?>/images/blog&news.jpg" alt="blog&news" class="blog_main_img pc_only">
<img src="<?php echo get_template_directory_uri(); ?>/images/sp_blog.jpg" alt="blog&news" class="blog_main_img sp_only">

<div class="blog wrapper blog_category">
    <div class="news_list">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="news_item">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>" class="news_item_img">
                    <?php endif; ?>

                    <p class="news_date"><?php echo get_the_date('Y/m/d'); ?></p>

                    <h3><?php the_title(); ?></h3>
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