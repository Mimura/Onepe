<?php
/**
 * The main template file
 *
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<div id="content" class="site-content archive" role="main">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content-archive', get_post_format() ); ?>
				<?php endwhile; ?>
			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>
		</div><!-- #content -->

		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- エンジニア自動サイズ -->
		<ins class="adsbygoogle"
			 style="display:block"
			 data-ad-client="ca-pub-7171481905282599"
			 data-ad-slot="1759256866"
			 data-ad-format="auto"></ins>
		<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
		<?php portfolio_paging_nav(); ?>
	</div><!-- #primary -->

<?php get_footer(); ?>