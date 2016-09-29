<!--BuddyPressのグローバル変数を呼び出し、表示中のユーザーのIDを取得-->
<?php
global $bp;
$user_id = $bp->displayed_user->id;
?>
<?php $paged = get_query_var('paged'); ?>
<!--query_postsで、author=ユーザーID　で現在表示中のユーザーの記事一覧が取得可能-->
<?php query_posts("author={$user_id}&posts_per_page=10&paged={$paged}"); ?>
<?php if ( have_posts() ) : ?>
<?php while(have_posts()):
    $post = the_post();?>
    <section>
        <h1><?php the_title(); ?></h1>
        <!--サムネイルも投稿済みなので、必要に応じて取得-->
        <?php the_post_thumbnail( array(150,150) ); ?>
        <!--記事のテキスト部分の200文字だけ取得-->
<!--        <p>--><?php //echo mb_substr(get_the_excerpt(), 0, 200);?><!--</p>-->
    </section>
<?php endwhile; ?>
<?php endif; ?>

