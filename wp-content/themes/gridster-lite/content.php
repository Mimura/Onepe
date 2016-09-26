<?php
/**
 * @package Gridster
 */
$title = get_the_title();
$authorName =get_the_author();
$authorLink =get_author_posts_url(get_the_author_meta( 'ID' ));
?>

<div id="post-<?php the_ID(); ?>" <?php post_class("poste"); ?> xmlns="http://www.w3.org/1999/html">
<?php if ( has_post_thumbnail() ) {
$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'original' );
$link = get_permalink();//the_permalink();
//$title = '<a href = ".$title." > tes </a>';
//echo '<a href="' . $large_image_url[0] . '"  rel="lightbox"  title = "<a href = http://127.0.0.1/fastllustsite >aaa</a>" >';
	echo '<a href="' . $large_image_url[0] . '"  rel="lightbox" 
	title = "
		<a href = '.$link.' >'.$title.'</a><br/>
	<a href = '.$authorLink.' >'.$authorName.'</a>
	"     >';

?>
<!--<a href="--><?php //$large_image_url[0]; ?><!--" rel=”lightbox”> --><?php

the_post_thumbnail('post-thumb', array('class' => 'postimg'));
} else { ?>
			<a>
<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/defaultthumb.png" class="postimg" alt="<?php the_title(); ?>" />

<?php } ?>
</a>
<!--<div class="portfoliooverlay"><a href="--><?php //the_permalink(); ?><!--"></a></div>-->
	<?php
    //変数定義
	$titleMini = mb_substr($title,0,10);
	$authorNameMini = mb_substr($authorName,0,10);

    $meta = get_post_meta(get_the_ID());
	$avator = $meta['dg_tw_author_avatar'];


	?>

<h2 class="posttitle"><a href="<?php the_permalink(); ?>" rel="bookmark">


<?php echo $titleMini; ?>
</a></h2>
<p class="postmeta">
<?php if($avator): ?>
	</br>
	<img border="1" width="30" height="30" alt="ユーザーアイコン" src="<?php echo $avator[0]; ?>" >
	<a href = <?php echo $authorLink; ?>><?php echo $authorNameMini ;?></a>
<?php endif; //$avatorがからじゃなければ のとじ?>
<?php //if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
<?php
//				/* translators: used between list items, there is a space after the comma */
//				$categories_list = get_the_category_list( __( ', ', 'gridster-lite' ) );
//				if ( $categories_list && gridster_categorized_blog() ) :
//			?>
<?php ////printf( __( '%1$s', 'gridster-lite' ), $categories_list ); ?>
<?php //endif; // End if categories ?>
<?php //endif; // End if 'post' == get_post_type() ?>


</p>
</div>
<!-- post -->
