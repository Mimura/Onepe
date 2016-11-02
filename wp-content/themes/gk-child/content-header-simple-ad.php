<?php

/*
    Template for the entry header
*/

$video_code = portfolio_video_code();

?>
<?php if(!is_singular() || (is_singular() && get_theme_mod('portfolio_post_show_featured_image', '1') == '1')) : ?>
<!--	<header class="entry-header no-anim--><?php //if(is_singular() && is_sticky()) :?><!-- sticky--><?php //endif; ?><!----><?php //if(get_theme_mod('portfolio_full_width_images', '1') == '1') : ?><!-- full-width-image--><?php //endif; ?><!--">-->

		<a>

		</a>


<!--	</header>-->
<!-- .entry-header -->
<?php endif; 