<!DOCTYPE html>
<html lang="en">
    <head>
      	<meta charset="UTF-8">
      	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
		<link rel="stylesheet" href="https://use.typekit.net/nnn8mgu.css">
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>javascript/functions.js"></script>
    <?php wp_head(); ?>
    </head>
    <body>
		<header id="site-header">	
			<figure id="logo-container">
				<a class="header-links" href="<?php echo home_url(); ?>">
					<img id="header-theme-logo" src="<?php bloginfo('template_directory'); ?>/images/logo_main.png" alt="logotype">
				</a>
			</figure>
			<h2 id="header-title">ANDREAS HAKALA</h2>
				<nav id="nav-homepage">
					<ul id="menu-list">
						<li class="menu-row"><a href="#about-me-container">ABOUT</a></li>
						<li class="menu-row"><a href="#recent-projects-container">PROJECTS</a></li>
						<li class="menu-row"><a href="#contact-me-container">CONTACT</a></li>
					</ul>
				</nav>
				<!--
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
				-->
		</header>
		<header id="menuMainScroll" class="menu-scroll hide">
			<nav id="nav-homepage">
				<ul id="menu-list">
					<li class="menu-row"><a href="#about-me-container">ABOUT</a></li>
					<li class="menu-row"><a href="#recent-projects-container">PROJECTS</a></li>
					<li class="menu-row"><a href="#contact-me-container">CONTACT</a></li>
				</ul>
			</nav>
		</header>	
