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

/* ------------ Contact Form Function ------------ */
	
function create_contact_form() {
	$labels = array(
		'name'	                    => 'Messages',
		'singular_name'             => 'Message',
		'menu_name'        			=> 'Messages'
	);
	$args = array(
		'hierarchical' 				=> false,
		'labels'             		=> $labels,
		'show_ui'             		=> true,
		'show_in_menu'             	=> true,
		'capability_type'			=> 'post',
		'menu-positions'			=> 26,
		'supports'					=> array(
			'title', 
			'editor', 
			'author'
		),
		'menu_icon' 	=> 'dashicons-admin-comments'
	);
	register_post_type('contact-form', $args);
}
add_action('init', 'create_contact_form');
add_filter('manage_contact-form_posts_columns', 'set_contact_columns');
add_action('manage_contact-form_posts_custom_column', 'contact_custom_column', 10, 1);
add_action('add_meta_boxes', 'contact_add_meta_box');
add_action('save_post', 'save_contact_email_data');
	
function set_contact_columns($columns) {
	$newColumns = array();
	$newColumns['title'] = 'Name';
	$newColumns['message'] = 'Message';
	$newColumns['email'] = 'Email';
	$newColumns['date'] = 'Date';
	return $newColumns;
}

function contact_custom_column($column) {
	switch($column) {
		case 'message' :
			echo get_the_excerpt();
			break;
			
		case 'email' :
			$email = get_post_meta($post_id, '_contact_email_value_key', true);
			echo '<a href="mailto:'.$email.'">'.$email.'</a>';
			break;
	}	
}

/* ------------ Contact Meta Boxes ------------ */

function contact_add_meta_box() {
	add_meta_box('contact_email', 'User Email', 'portfolio_contact_email_callback', 'contact-form', 'side', 'default');
}

function portfolio_contact_email_callback($post) {
	wp_nonce_field('save_contact_email_data', 'contact_email_meta_box_nonce');
	$value = get_post_meta($post->ID, '_contact_email_value_key', true);
	echo '<label for="contact_email_field">User Email Adress</label>';
	echo '<input type="email" id="contact_email_field" name="contact_email_field" value="'. esc_attr($value) .'" size="25" />';
}

function save_contact_email_data($post_id) {
	if (!isset($_POST['contact_email_meta_box_nonce'])) {
		return;
	}
	if (!wp_verify_nonce($_POST['contact_email_meta_box_nonce'], 'save_contact_email_data')) {
		return;
	}
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}
	if (!current_user_can('edit_post', $post_id)) {
		return;
	}
	if (!isset($_POST['contact_email_field'])) {
		return;
	}
	$my_data = sanitize_text_field($_POST['contact_email_field']);
	update_post_meta($post_id, '_contact_email_value_key', $my_data);
}

/* ------------ Contact Form Plugin Function ------------ */

function mod_contact7_form_content( $template, $prop ) {
  if ( 'form' == $prop ) {
    return implode( '', array(
      '<div class="row">',
        '<div class="col">',
          '[text* your-name placeholder"Name"]',
          '[email* your-email placeholder"Email"]',
          '[text* your-subject placeholder"Subject"]',
        '</div>',
        '<div class=”col”>',
          '[textarea* your-message placeholder"Message"]',
        '</div>',
      '</div>',
      '<div class="row">',
        '[submit class:btn "Send Mail"]',
      '</div>'
    ) );
  } else {
    return $template;
  } 
}
add_filter('wpcf7_default_template', 'mod_contact7_form_content' ,10 ,2);

function mod_contact7_form_title( $template ) {
  $template->set_title('Contact us now');
  return $template;
}
add_filter('wpcf7_contact_form_default_pack', 'mod_contact7_form_title');

?>