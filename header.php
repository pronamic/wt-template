<!DOCTYPE html>

<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta name="author" content="Pronamic" />
		
		<title>
			<?php wp_title( '' ); ?>
		</title>
		
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

		<link href="<?php bloginfo( 'template_directory' ); ?>/icons/icon.png" rel="shortcut icon" type="image/x-icon" />
		<link href="<?php bloginfo( 'template_directory' ); ?>/icons/apple-touch-icon.png" rel="apple-touch-icon" />
	
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	
		<?php
	
		if ( is_singular() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	
		wp_head();
	
		?>
	</head>
	
	<body <?php body_class(); ?>>
		<div id="wrapper">
			<div id="container">
				<header id="header">
					<h1 id="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<?php bloginfo( 'name' ); ?>
						</a>
					</h1>
	
					<nav id="utility-nav">
						<?php 
						
						wp_nav_menu( array( 
							'theme_location' => 'utility',
							'fallback_cb'    => ''
						) ); 
						
						?>
					</nav>

					<div id="search">
						<?php get_search_form(); ?>
					</div>
					
					<div class="clear"></div>
			
					<nav id="primary-nav" role="navigation">
						<?php 
						
						wp_nav_menu( array( 
							'theme_location' => 'primary',
							'fallback_cb'    => ''
						) ); 
						
						?>
					</nav>
				</header>
			
				<div id="main">