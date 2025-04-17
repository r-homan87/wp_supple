<?php get_header(); ?>

<img src="<?php echo get_template_directory_uri(); ?>/images/blog&news.jpg" alt="blog&news" class="blog_main_img">


<div class="blog_single wrapper">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php
            $sub_title = get_field('sub_title');
            $custom_image = get_field('custom_image');
            $news_date = get_field('news_date');
            ?>

            <article class="blog_article">
                <h1><?php the_title(); ?></h1>

                <?php if ($sub_title): ?>
                    <h2 class="blog_sub_title"><?php echo esc_html($sub_title); ?></h2>
                <?php endif; ?>

                <?php if ($news_date): ?>
                    <p class="blog_date">
                        <?php
                        $date = DateTime::createFromFormat('Ymd', $news_date);
                        echo $date ? $date->format('Y/m/d') : esc_html($news_date);
                        ?>
                    </p>
                <?php endif; ?>

                <?php if ($custom_image): ?>
                    <img src="<?php echo esc_url($custom_image['url']); ?>" alt="<?php echo esc_attr($custom_image['alt']); ?>" class="blog_main_img">
                <?php endif; ?>

                <div class="blog_content">
                    <?php the_content(); ?>
                </div>
            </article>

    <?php endwhile;
    endif; ?>
</div>

<?php get_footer(); ?>