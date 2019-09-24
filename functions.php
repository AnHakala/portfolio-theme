<?php

/* ------------ Theme Supports ------------ */

add_theme_support('post-thumbnails');
add_theme_support('post-formats');
the_post_thumbnail($size);

add_image_size( 'grid_thumbnail', 300, 300, true);
add_image_size( 'single_large', 660, 400, true);

/* ------------ Projects Function ------------ */

function create_post_type() {
	 $args = array(
      	'public' => true,
      	'label'  => 'Projects',
		'has_archive' => true,
		'hierarchical' => false,
		'supports' => array(
			'thumbnail', 
			'title', 
			'editor', 
			'author'
		),
		'menu_icon' => 'dashicons-portfolio'
    );
	register_post_type( 'wpp_projects', $args );
	}
add_action( 'init', 'create_post_type' );

/* ------------ Menus Function ------------ */

function create_new_menu() {
  register_nav_menu('wpp_menu',__( 'header-nav' ));
}
add_action( 'init', 'create_new_menu' );

?>
