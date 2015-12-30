<?php

/*
  Plugin Name: Davis Law Office Custom Post Types
  Version: 1.0
  Author: Andrew Robbins - https://simpleblend.net
  Description: Custom Post Types for Davis Law Office
*/

/*
  CPT: Services
*/
function custom_post_type_services() {

  $labels = array(
    'name'                => _x('Services', 'Post Type General Name', 'text_domain'),
    'singular_name'       => _x('Service', 'Post Type Singular Name', 'text_domain'),
    'menu_name'           => __('Services', 'text_domain'),
    'parent_item_colon'   => __('Parent Item:', 'text_domain'),
    'new_item'            => __('Add New Service', 'text_domain'),
    'edit_item'           => __('Edit Service', 'text_domain'),
    'not_found'           => __('No Service found', 'text_domain'),
    'not_found_in_trash'  => __('No Service found in trash', 'text_domain')
  );

  $args = array(
    'label'               => __('services', 'text_domain'),
    'description'         => __('Custom Post Type for Services', 'text_domain'),
    'labels'              => $labels,
    'supports'            => array('title'),
    'taxonomies'          => array(),
    'hierarchical'        => false,
    'public'              => false,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 100,
    'menu_icon'           => 'dashicons-hammer',
    'show_in_admin_bar'   => true,
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => true,
    'publicly_queryable'  => true,
    'capability_type'     => 'page'
  );

  register_post_type('services', $args);

}

/*
  CPT: Staff
*/
function custom_post_type_staff() {

  $labels = array(
    'name'                => _x('Staff', 'Post Type General Name', 'text_domain'),
    'singular_name'       => _x('Staff Member', 'Post Type Singular Name', 'text_domain'),
    'menu_name'           => __('Staff', 'text_domain'),
    'parent_item_colon'   => __('Parent Item:', 'text_domain'),
    'new_item'            => __('Add New Staff Member', 'text_domain'),
    'edit_item'           => __('Edit Staff Member', 'text_domain'),
    'not_found'           => __('No Staff Member found', 'text_domain'),
    'not_found_in_trash'  => __('No Staff Member found in trash', 'text_domain')
  );

  $args = array(
    'label'               => __('staff', 'text_domain'),
    'description'         => __('Custom Post Type for Staff', 'text_domain'),
    'labels'              => $labels,
    'supports'            => array('title'),
    'taxonomies'          => array(),
    'hierarchical'        => false,
    'public'              => false,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 100,
    'menu_icon'           => 'dashicons-universal-access',
    'show_in_admin_bar'   => true,
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => true,
    'publicly_queryable'  => true,
    'capability_type'     => 'page'
  );

  register_post_type('staff', $args);

}


/*
  CPT: Clients
*/
function custom_post_type_clients() {

  $labels = array(
    'name'                => _x('Clients', 'Post Type General Name', 'text_domain'),
    'singular_name'       => _x('Client', 'Post Type Singular Name', 'text_domain'),
    'menu_name'           => __('Clients', 'text_domain'),
    'parent_item_colon'   => __('Parent Item:', 'text_domain'),
    'new_item'            => __('Add New Client', 'text_domain'),
    'edit_item'           => __('Edit Client', 'text_domain'),
    'not_found'           => __('No Client found', 'text_domain'),
    'not_found_in_trash'  => __('No Client found in trash', 'text_domain')
  );

  $args = array(
    'label'               => __('clients', 'text_domain'),
    'description'         => __('Custom Post Type for Clients', 'text_domain'),
    'labels'              => $labels,
    'supports'            => array('title'),
    'taxonomies'          => array(),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 100,
    'menu_icon'           => 'dashicons-groups',
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => true,
    'publicly_queryable'  => true,
    'capability_type'     => 'page'
  );

  register_post_type('clients', $args);

}


/*
  CPT: Testimonials
*/
function custom_post_type_testimonials() {

  $labels = array(
    'name'                => _x('Testimonials', 'Post Type General Name', 'text_domain'),
    'singular_name'       => _x('Testimonial', 'Post Type Singular Name', 'text_domain'),
    'menu_name'           => __('Testimonials', 'text_domain'),
    'parent_item_colon'   => __('Parent Item:', 'text_domain'),
    'new_item'            => __('Add New Testimonial', 'text_domain'),
    'edit_item'           => __('Edit Testimonial', 'text_domain'),
    'not_found'           => __('No Testimonial found', 'text_domain'),
    'not_found_in_trash'  => __('No Testimonial found in trash', 'text_domain')
  );

  $args = array(
    'label'               => __('testimonials', 'text_domain'),
    'description'         => __('Custom Post Type for Testimonials', 'text_domain'),
    'labels'              => $labels,
    'supports'            => array('title'),
    'taxonomies'          => array(),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 100,
    'menu_icon'           => 'dashicons-format-quote',
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => true,
    'publicly_queryable'  => true,
    'capability_type'     => 'page'
  );

  register_post_type('testimonials', $args);

}

// Hookin, yo
add_action('init', 'custom_post_type_staff', 0);
add_action('init', 'custom_post_type_clients', 0);
add_action('init', 'custom_post_type_testimonials', 0);
add_action('init', 'custom_post_type_services', 0);

?>