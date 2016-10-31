<?php $id = getParamVal("id"); ?>
<a href=<?php  echo bp_core_get_userlink($id, false, true );?>>プロフィール</a>
<?php
$url = esc_url( get_home_url()) . "/authorposts/?id=" . $id ; ?>
<a href=<?php echo $url ;?>> 投稿一覧 </a>

<?php $userInfo = get_userdata($id);?>
<h2><?php echo $userInfo->display_name; ?>のお気に入り投稿</h2>

<?php
$favorite_post_ids = wpfp_get_users_favorites(get_userdata($id)->user_login);//wpfp_get_users_favorites($GLOBALS['bp']->displayed_user->userdata->user_login);
if(!empty($favorite_post_ids)):
    $args = array(
        'posts_per_page' => 4,//$wp_query->max_num_pages,
        'paged' => get_query_var('paged'),
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
    <ul class="list"><li>まだお気に入りはありません。</li></ul>
<?php endif; ?>
<?php else :?>
    <ul class="list"><li>まだお気に入りはありません。</li></ul>
<?php endif; ?>
<?php portfolio_paging_nav_custom(); ?>
<?php wp_reset_query(); ?>

