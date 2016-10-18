<?php 

	/*
		Template for the content item footer
	*/

if(is_single()) {

	 do_shortcode("[show_the_author_archive]") ;
}

	if (is_single() && get_the_author_meta('description') && get_theme_mod('portfolio_post_show_author', '1') == '1') : 
?>
<footer class="entry-meta">
	<?php get_template_part('author', 'bio'); ?>
</footer><!-- .entry-meta -->
<?php 
endif;

// EOF