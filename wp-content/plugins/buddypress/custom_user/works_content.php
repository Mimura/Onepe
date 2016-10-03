<!--BuddyPressのグローバル変数を呼び出し、表示中のユーザーのIDを取得-->
<?php
global $bp;
$user_id = $bp->displayed_user->id;
?>
<?php do_shortcode('[favorite-authors-list]'); ?>
<?php $paged = get_query_var('paged'); ?>
<!--query_postsで、author=ユーザーID　で現在表示中のユーザーの記事一覧が取得可能-->
<?php query_posts("author={$user_id}&posts_per_page=10&cat=0&paged={$paged}"); ?>
<div id="content" class="site-content archive" role="main">
    <?php while(have_posts()): the_post();
        //include TEMPLATEPATH . 'template-name.php';
        include(get_theme_root() . '/gk-child/content-archive.php');
        //get_template_part( 'content-archive', get_post_format() );
        ?>
    <?php endwhile; ?>

</div>
<?php wp_reset_query(); ?>

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

