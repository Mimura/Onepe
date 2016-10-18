<?php

/*
    Template for the entry header
*/

$video_code = portfolio_video_code();

?>
<?php if(!is_singular() || (is_singular() && get_theme_mod('portfolio_post_show_featured_image', '1') == '1')) : ?>
<!--	<header class="entry-header no-anim--><?php //if(is_singular() && is_sticky()) :?><!-- sticky--><?php //endif; ?><!----><?php //if(get_theme_mod('portfolio_full_width_images', '1') == '1') : ?><!-- full-width-image--><?php //endif; ?><!--">-->
		<?php if (has_post_thumbnail() && ! post_password_required()) : ?>

		<a>
			<?php

			$title = get_the_title();
			if(isset($title)) {
				$title = "noTitle";
			}
			$authorName =get_the_author();
			$authorLink = bp_core_get_userlink(get_the_author_meta('ID'), false, true );
			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'original' );
			$link = get_permalink();//the_permalink();

			echo '<a href="' . $large_image_url[0] . '"  rel="lightbox"
	title = "
		<a href = '.$link.'   target=\'_blank\' >'.$title.'</a><br/>
	<a href = '.$authorLink.'   target=\'_blank\' >'.$authorName.'</a>
	"     >';

		echo 	"<span class=\"cover\"  style=\"background-image: url(". $large_image_url[0] .")\"/></span>";

			?>

		</a>


		<?php elseif($video_code) : ?>
			<div class="video-wrapper">
				<?php echo $video_code; ?>
			</div>
		<?php endif; ?>
<!--	</header>-->
<!-- .entry-header -->
<?php endif; 