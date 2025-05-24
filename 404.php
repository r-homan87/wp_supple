<?php get_header(); ?>

<div class="error_page wrapper">
    <img src="<?php echo get_template_directory_uri(); ?>/images/404error.jpg" alt="error_img" class="error_main_img pc_only">
    <img src="<?php echo get_template_directory_uri(); ?>/images/sp_404.jpg" alt="error_img" class="error_main_img sp_only">
    <p class="error_text">申し訳ございませんが、お探しのページは見つかりませんでした。<br>
        お探しのページは削除されたか、URLが変更された可能性がございます。</p>

    <a href="<?php echo esc_url(home_url('/')); ?>" class="black_btn">TOP</a>
</div>

<?php get_footer(); ?>