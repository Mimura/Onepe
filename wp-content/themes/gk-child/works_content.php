<!--BuddyPressのグローバル変数を呼び出し、表示中のユーザーのIDを取得-->

<a href=<?php  echo bp_core_get_userlink(getParamVal("id"), false, true );?>>プロフィール   </a>
<a href="http://localhost/fastIlustsite/favoposts/?id=<?php echo getParamVal("id"); ?>"> お気に入り一覧 </a>

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
