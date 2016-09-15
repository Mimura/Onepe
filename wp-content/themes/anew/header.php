<!DOCTYPE html> 
<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<title><?php wp_title( '-', true, 'right' ); ?></title>
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="wrapper">

	<header id="header">
	
		<?php if (has_nav_menu('topbar')): ?>

			<nav class="nav-container group" id="nav-topbar">
				<div class="nav-toggle"><i class="fa fa-bars"></i></div>
				<div class="nav-text"><!-- put your mobile menu text here --></div>
				<div class="nav-wrap container"><?php wp_nav_menu(array('theme_location'=>'topbar','menu_class'=>'nav container-inner group','container'=>'','menu_id' => '','fallback_cb'=> false)); ?></div>
				
				<div class="container">	
					<div class="toggle-search"><i class="fa fa-search"></i></div>
					<div class="search-expand">
						<div class="search-expand-inner">
							<?php get_search_form(); ?>
						</div>
					</div>
				</div><!--/.container-->
				
			</nav><!--/#nav-topbar-->
		<?php endif; ?>
		
		<div class="container">
			<?php if ( ot_get_option('header-image') == '' ): ?>
			<div class="pad group">
				<?php echo alx_site_title(); ?>
				<?php if ( ot_get_option('site-description') != 'off' ): ?><p class="site-description"><?php bloginfo( 'description' ); ?></p><?php endif; ?>
				<?php alx_social_links() ; ?>
			</div>
			<?php endif; ?>
			<?php if ( ot_get_option('header-image') ): ?>
				<a href="<?php echo home_url('/'); ?>" rel="home">
					<img class="site-image" src="<?php echo ot_get_option('header-image'); ?>" alt="<?php get_bloginfo('name'); ?>">
				</a>
			<?php endif; ?>
		</div><!--/.container-->
		
	</header><!--/#header-->


<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- おもしろ動画レスポンシブ -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7171481905282599"
     data-ad-slot="3870796060"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

<script type="text/javascript">
var nend_params = {"media":9764,"site":119175,"spot":311742,"type":1,"oriented":1,"ad_num":4,"space":1,"align":1,"tdisplay":2,"tcolor":"%23000000","width":57,"height":57};
</script>
<script type="text/javascript" src="http://js1.nend.net/js/nendAdLoader.js"></script>



	<div id="page" class="container">
		<div class="main group">