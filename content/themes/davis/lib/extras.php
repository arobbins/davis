<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

//
// Add <body> classes
//
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

//
// Clean up the_excerpt()
//
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '" class="">' . __('Read more', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');


//
// Adding lazy load class to all images in content area of posts
//
function lazy_imgs($html, $id, $caption, $title, $align, $url, $size, $alt) {

  $imgNew = '<img data-original="' . $url . '" ';
  $html = str_replace('<img ', $imgNew, $html);
  return $html;
}
// add_filter('image_send_to_editor', 'lazy_imgs', 10, 8);


//
// Adding lazy load class to all images in content area of posts
//
function img_responsive($content) {
  return str_replace('<img class="', '<img class="is-lazy ', $content);
}
// add_filter('the_content', 'img_responsive');


//
// Adding class to all iframe videos
//
function custom_youtube_oembed( $code ) {
  if( stripos( $code, 'youtube.com' ) !== FALSE && stripos( $code, 'iframe' ) !== FALSE )
      $code = str_replace( '<iframe', '<iframe class="content-video" type="text/html" ', $code );

  return $code;
}
// add_filter( 'embed_oembed_html', 'custom_youtube_oembed' );

//
// Creating custom option pages
//
if(function_exists('acf_add_options_page')) {

  acf_add_options_page(array(
    'page_title'  => 'Theme Settings',
    'menu_title'  => 'Theme Settings',
    'menu_slug'   => 'theme-settings',
    'capability'  => 'edit_posts',
    'icon_url'    => 'dashicons-hammer',
    'redirect'    => false
  ));

}