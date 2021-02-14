<?php /* Template Name: Simple Header */ ?>

<!DOCTYPE html>
<html lang="en">
    <head>
      	<meta charset="UTF-8">
      	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
		<link rel="stylesheet" href="https://use.typekit.net/nnn8mgu.css">
    <?php wp_head(); ?>
    </head>
    <body>
		<header id="project-header">		
			<figure id="logo-container-project">
				<a class="header-links" href="http://localhost/wordpress">
					<img id="header-simple-logo" src="<?php bloginfo('template_directory'); ?>/images/logo_main.png" alt="logotype">
				</a>
			</figure>
		</header>
