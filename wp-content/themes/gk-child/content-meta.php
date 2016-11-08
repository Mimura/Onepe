<?php
	/*
		Template for the content meta
	*/
?>
<?php
if(
	get_theme_mod('portfolio_post_show_date', '1') == '1' ||
	get_theme_mod('portfolio_post_show_category', '1') == '1'
) : ?>
<aside class="post-meta">
	<?php
		// Post Formats
		$post_format = '';
		
		if(get_post_format() != '') {
			echo '<span class="format gk-format-'. get_post_format(). '"></span>';
		}
		
		if ('post' == get_post_type()) {
			
			if(get_theme_mod('portfolio_post_show_date', '1') == '1') {
				$date_format = esc_html(get_the_date('M, j, Y'));  
					
				if(get_theme_mod('portfolio_date_format', 'default') == 'wordpress') {
					$date_format = get_the_date(get_option('date_format'));
				}
				
				$date = sprintf( '<time class="entry-date" datetime="'. esc_attr(get_the_date('c')) . '">'. $date_format . $post_format .'</time>' );
				
				echo $date;
			}
			
			if(get_theme_mod('portfolio_post_show_category', '1') == '1') {
				// Translators: used between list items, there is a space after the comma.
				$categories_list = get_the_category_list(__( ', ', 'portfolio'));
				if ($categories_list) {
					echo '<span class="categories-links">' . __('Posted in ', 'portfolio') . $categories_list . '</span>';
				}
			}
?>
<!--			<a href=--><?php // echo bp_core_get_userlink(get_the_author_meta('ID'), false, true );?><!--><?php //echo get_the_author();?><!-- </a>-->
			<?php $url = esc_url( get_home_url()) . "/authorposts/?id=" . get_the_author_meta('ID') ; ?>
			<a href=<?php echo $url ;?> ><?php echo get_the_author();?> </a>
			<a><?php fav_authors_link(); ?></a>

			<?php if(function_exists('the_views')) {
				the_views();
			} ?>


			<?php
		}
		
//		if(current_user_can('edit_posts') || current_user_can('edit_pages')) {
//			edit_post_link(__('Edit', 'portfolio'), '<span class="edit-link">', '</span>');
//		}
	?>
</aside><!-- .post-meta -->
<?php endif; ?>