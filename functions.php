<?php

/* ------------ Theme Supports ------------ */

add_theme_support('post-thumbnails');
add_theme_support('post-formats');
the_post_thumbnail($size);

add_image_size( 'grid_thumbnail', 300, 300, true);
add_image_size( 'single_large', 660, 400, true);

/* ------------ Projects Function ------------ */

function create_projects() {
	 $args = array(
      	'public' 					=> true,
      	'label' 					=> 'Projects',
		'has_archive' 				=> true,
		'hierarchical' 				=> false,
		'supports' 					=> array(
			'thumbnail', 
			'title', 
			'editor', 
			'author'
		),
		'menu_icon' 	=> 'dashicons-portfolio'
    );
	register_post_type( 'projects', $args );
	}
add_action( 'init', 'create_projects' );

/* ------------ Projects Taxonomies ------------ */

function create_project_type() {
	$labels = array(
		'name'                       => _x( 'Project Types', 'Taxonomy General Name', 'portfolio-theme' ),
		'singular_name'              => _x( 'Project Type', 'Taxonomy Singular Name', 'portfolio-theme' ),
		'menu_name'                  => __( 'Project Types', 'portfolio-theme' ),
		'all_items'                  => __( 'All Types', 'portfolio-theme' ),
		'new_item_name'              => __( 'New Type Name', 'portfolio-theme' ),
		'add_new_item'               => __( 'Add New Project Type', 'portfolio-theme' ),
		'edit_item'                  => __( 'Edit Project Type', 'portfolio-theme' ),
		'update_item'                => __( 'Update Project Type', 'portfolio-theme' ),
		'add_or_remove_items'        => __( 'Add or remove Project Types', 'portfolio-theme' ),
		'popular_items'              => __( 'Popular Types', 'portfolio-theme' )
	);
  	$args = array(
		'hierarchical' 				=> true,
		'labels' 					=> $labels,
		'object_type'				=> 'projects'
	);
  register_taxonomy( 'projects_type', array('projects'), $args );
}
add_action( 'init', 'create_project_type' );

function create_project_skill() {
	$labels = array(
		'name'                       => _x( 'Project Skills', 'Taxonomy General Name', 'portfolio-theme' ),
		'singular_name'              => _x( 'Project Skill', 'Taxonomy Singular Name', 'portfolio-theme' ),
		'menu_name'                  => __( 'Project Skills', 'portfolio-theme' ),
		'all_items'                  => __( 'All Skills', 'portfolio-theme' ),
		'new_item_name'              => __( 'New Skill Name', 'portfolio-theme' ),
		'add_new_item'               => __( 'Add New Project Skill', 'portfolio-theme' ),
		'edit_item'                  => __( 'Edit Project Skill', 'portfolio-theme' ),
		'update_item'                => __( 'Update Project Skill', 'portfolio-theme' ),
		'add_or_remove_items'        => __( 'Add or remove Project Skills', 'portfolio-theme' ),
		'popular_items'              => __( 'Popular Skills', 'portfolio-theme' )
	);
  	$args = array(
		'hierarchical' 				=> false,
		'labels' 					=> $labels,
		'object_type'				=> 'projects'
	);
  register_taxonomy( 'projects_skill', array('projects'), $args );
}
add_action( 'init', 'create_project_skill' );
	  
/* ------------ Menus Function ------------ */

function create_new_menu() {
  register_nav_menu('wpp_menu',__( 'header-nav'));
}
add_action( 'init', 'create_new_menu' );

?>