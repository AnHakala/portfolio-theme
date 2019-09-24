<!DOCTYPE html>
<html lang="en">
    <head>
      	<meta charset="UTF-8">
      	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
    <?php wp_head(); ?>
    </head>
    <body>
		<header id="site-header">
			<h2 id="site-name">My Page</h2>
			<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
		</header>
