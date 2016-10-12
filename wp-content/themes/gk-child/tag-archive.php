<?php global $tags;//global!!

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

query_posts('tag='.$tags[0].'&paged='.$paged);

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
<?php portfolio_paging_nav(); ?>
<?php wp_reset_query(); ?>

