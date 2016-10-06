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
			$authorName =get_the_author();
			$authorLink =get_author_posts_url(get_the_author_meta( 'ID' ));
			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'original' );
			$link = get_permalink();//the_permalink();

			echo '<a href="' . $large_image_url[0] . '"  rel="lightbox"
	title = "
		<a href = '.$link.' >'.$title.'</a><br/>
	<a href = '.$authorLink.' >'.$authorName.'</a>
	"     >';

		echo 	"<img src=\"". $large_image_url[0] ."\" alt=\"アイキャッチ\" style=\"width:auto;height:100%;\" />";
//			the_post_thumbnail(is_singular() ? 'full' : 'gk-portfolio-size');

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