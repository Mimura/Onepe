<!--BuddyPressのグローバル変数を呼び出し、表示中のユーザーのIDを取得-->

<?php $id = getParamVal("id"); $userInfo = get_userdata($id);?>
<a href=<?php  echo bp_core_get_userlink($id, false, true );?>>プロフィール</a>
<?php
$url = esc_url( get_home_url()) . "/favoposts/?id=" . $id ; ?>
<a href=<?php echo $url ;?>>お気に入り一覧 </a>

<h2><?php echo $userInfo->display_name; ?>の投稿一覧</h2>
<?php
global $bp;
$user_id = getParamVal("id")//$bp->displayed_user->id;
?>
<?php $paged = get_query_var('paged',1); ?>
<!--query_postsで、author=ユーザーID　で現在表示中のユーザーの記事一覧が取得可能-->
<?php query_posts("author={$user_id}&posts_per_page=2&paged={$paged}"); ?>
<div id="content" class="site-content archive" role="main">
    <?php while(have_posts()): the_post();
        //include TEMPLATEPATH . 'template-name.php';
        include(get_theme_root() . '/gk-child/content-archive.php');
        //get_template_part( 'content-archive', get_post_format() );
        ?>
    <?php endwhile; ?>
</div>
<?php portfolio_paging_nav(); ?>
<?php wp_reset_query(); ?>
