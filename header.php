<?php ?>
<!DOCTYPE html>
<html>
<head>
<title><?php
	global $page, $paged;
	wp_title( '|', true, 'right' );
		bloginfo( 'name' );
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );
	?>
</title>
<meta name="description" content="<?php if ( is_single() ) {
	single_post_title('', true);
	} else {
	bloginfo('name'); echo " - "; bloginfo('description');
	}
?>" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="initial-scale=1" />
<meta http-equiv="ClearType" content="true" />

<!-- The little things -->
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="shortcut icon" href="<?php echo bloginfo('template_directory'); ?>/favicon.png">
	<link rel="apple-touch-icon" href="<?php echo bloginfo('template_directory'); ?>/apple-touch-icon-precomposed.png"/>
<!-- The little things -->

<!-- Stylesheets -->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/style.css" />

<!-- Stylesheets -->

<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56858029-1', 'auto');
  ga('send', 'pageview');

</script>

<!-- Load scripts quick smart -->

	<?php wp_deregister_script('jquery');wp_head(); ?>
</head>

<body <?php body_class(); ?> id="top">
	<?php
		$banner_image = types_render_field("banner_image", array("raw" => true));
	?>	
    <header role="banner" class="banner-<?php echo $banner_image; ?>">
    	<div class="access-nav">
    		<div class="wrapper">
    			<ul>
    				<li><a href="http://www.djmikemorse.djintelligence.com/client">Client Login</a></li>
    			</ul>
    		</div>
    	</div>
    	<div class="header-main wrapper">
	        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="logo"><img src="<?php echo bloginfo('template_directory'); ?>/assets/img/morse-logo.svg" alt="<?php bloginfo( 'name' ); ?>" /></a>
        	<button id="menu-toggle"><i class="icon-menu"></i></button>
	        <div class="main-menu">
		        <nav role="navigation">
		            <?php
		                $args = array(
		                    'container' => 'false',
		                    'items_wrap' => '%3$s',
		                    );
		                wp_nav_menu($args);
		            ?>
		        	<li class="social-link"><a class="twitter" href="<?php echo ot_get_option('twitter_url'); ?>"><i class="icon-twitter"></i></a></li>
		        	<li class="social-link"><a class="facebook" href="<?php echo ot_get_option('facebook_url'); ?>"><i class="icon-facebook"></i></a></li>
		        	<li class="social-link"><a class="instagram" href="<?php echo ot_get_option('instagram_url'); ?>"><i class="icon-instagram"></i></a></li>
		        	<li class="social-link"><a class="youtube" href="<?php echo ot_get_option('youtube_url'); ?>"><i class="icon-youtube"></i></a></li>
		        </nav>
	        </div>
    	</div>
    	<?php 
    		if ( get_post_type() == 'staff' && is_archive()) {
	    		$title = ot_get_option('staff_archive_title');
	    		$subtitle = ot_get_option('staff_archive_subtitle');
    		} elseif ( get_post_type() == 'staff' ) {
	    		$title = get_the_title();
				$subtitle = types_render_field("header_subtitle", array("raw" => true));
    		} else {
	    		$title = types_render_field("header_title", array("raw" => true));
				$subtitle = types_render_field("header_subtitle", array("raw" => true));
    		} 
    			
    		if( empty($title)) {
    			$title = "A Wedding Experience";
			}
			
			if ( empty($subtitle)) {
				$subtitle = "That You Will Never Forget";
			}
    	?>
		<div class="page-heading">
			<h1><?php echo $title; ?></h1>
			<h2><?php echo $subtitle; ?></h2>
			<?php if ( is_page('home') ) : ?>
				<ul class="service-links">
					<li><a href="/wedding-services/">Wedding Services</a></li>
					<li><a href="/private-events/">Private Events</a></li>
					<li><a href="/corporate-events/">Corporate Events</a></li>
				</ul>
				<a class="button" href="http://www.djmikemorse.djintelligence.com/contact/">Book Your Event</a>
			<?php endif; ?>
		</div>
		
    </header>