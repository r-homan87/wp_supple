<?php get_header(); ?>

<img src="<?php echo get_template_directory_uri(); ?>/images/blog&news.jpg" alt="blog&news" class="blog_main_img">

<div class="blog_single_wrapper">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="blog_single_article">

                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>" class="blog_single_main_visual">
                <?php endif; ?>

                <p class="blog_single_date"><?php echo get_the_date('Y/m/d'); ?></p>

                <h1 class="blog_single_title"><?php the_title(); ?></h1>

                <div class="blog_single_content">
                    <?php the_content(); ?>
                </div>

            </article>
    <?php endwhile;
    endif; ?>
</div>

<?php get_footer(); ?>