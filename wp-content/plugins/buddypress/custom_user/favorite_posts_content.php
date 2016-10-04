
<?php
$favorite_post_ids = wpfp_get_users_favorites($GLOBALS['bp']->displayed_user->userdata->user_login);
if(!empty($favorite_post_ids)):
    $args = array(
        'posts_per_page' => $wp_query->max_num_pages,
        'paged' => get_query_var('page'),
        'post__in' => $favorite_post_ids
    );
    query_posts($args);
    ?>
    <div id="content" class="site-content archive" role="main">
    <?php if ( have_posts() ) : ?>
    <?php while(have_posts()): the_post();

        include(get_theme_root() . '/gk-child/content-archive.php');

        ?>
    <?php endwhile; ?>
    </div>
<?php else : ?>
    <ul class="list"><li>まだ投稿はありません。</li></ul>
<?php endif; ?>
<?php else :?>
    <ul class="list"><li>まだ投稿はありません。</li></ul>
<?php endif; ?>
<?php wp_reset_query(); ?>

