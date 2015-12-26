<?php

/*
  Plugin Name: Davis Law Office Custom Widgets
  Version: 1.0
  Author: Andrew Robbins - https://simpleblend.net
  Description: Davis Law Office Widgets
*/

//
// Contact Widget
//
class ContactWidget extends WP_Widget {

  function ContactWidget() {
    // Instantiate the parent object
    parent::__construct(false, 'Contact');
  }

  function widget($args, $instance) {
    // Widget output
    extract($args);
    $title = apply_filters('widget_title', $instance['title']);
    $form = $instance[ 'form' ] ? 'true' : 'false';

    require('widgets/contact/contact.php');
  }

  function update($new_instance, $old_instance) {
    // Save widget options
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['form'] = strip_tags($new_instance['form']);
    return $instance;
  }

  function form($instance) {
    // Output admin widget options form
    $title = esc_attr($instance['title']);
    $form = esc_attr($instance['form']);

    require('widgets/contact/contact-fields.php');
  }
}

function contact_widget() {
  register_widget('ContactWidget');
}

add_action('widgets_init', 'contact_widget');


//
// News Widget
//
class NewsWidget extends WP_Widget {

  function NewsWidget() {
    // Instantiate the parent object
    parent::__construct(false, 'News');
  }

  function widget($args, $instance) {
    // Widget output
    extract($args);
    $title = apply_filters('widget_title', $instance['title']);
    $content = apply_filters('widget_content', $instance['content']);

    require('widgets/news/news.php');
  }

  function update($new_instance, $old_instance) {
    // Save widget options
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['content'] = strip_tags($new_instance['content']);

    return $instance;
  }

  function form($instance) {
    // Output admin widget options form
    $title = esc_attr($instance['title']);
    $content = esc_attr($instance['content']);

    require('widgets/news/news-fields.php');
  }
}

function news_widget() {
  register_widget('NewsWidget');
}

add_action('widgets_init', 'news_widget');


//
// Newsletter Widget
//
class Newsletter extends WP_Widget {

  function Newsletter() {
    // Instantiate the parent object
    parent::__construct(false, 'Newsletter');
  }

  function widget($args, $instance) {
    // Widget output
    extract($args);
    $title = apply_filters('widget_title', $instance['title']);

    require('widgets/newsletter/newsletter.php');
  }

  function update($new_instance, $old_instance) {
    // Save widget options
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);

    return $instance;
  }

  function form($instance) {
    // Output admin widget options form
    $title = esc_attr($instance['title']);

    require('widgets/newsletter/newsletter-fields.php');
  }
}

function wp_newsletter_widget() {
  register_widget('Newsletter');
}

add_action('widgets_init', 'wp_newsletter_widget');


//
// Testimonials Widget
//
class TestimonialsWidget extends WP_Widget {

  function TestimonialsWidget() {
    // Instantiate the parent object
    parent::__construct(false, 'Testimonials');
  }

  function widget($args, $instance) {
    // Widget output
    extract($args);
    $title = apply_filters('widget_title', $instance['title']);

    require('widgets/testimonials/testimonials.php');
  }

  function update($new_instance, $old_instance) {
    // Save widget options
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);

    return $instance;
  }

  function form($instance) {
    // Output admin widget options form
    $title = esc_attr($instance['title']);

    require('widgets/testimonials/testimonials-fields.php');
  }
}

function testimonials_widget() {
  register_widget('TestimonialsWidget');
}

add_action('widgets_init', 'testimonials_widget');


//
// Menu Widget
//
class MenuWidget extends WP_Widget {

  function MenuWidget() {
    // Instantiate the parent object
    parent::__construct(false, 'Menu');
  }

  function widget($args, $instance) {
    // Widget output
    extract($args);
    $title = apply_filters('widget_title', $instance['title']);

    require('widgets/menu/menu.php');
  }

  function update($new_instance, $old_instance) {
    // Save widget options
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);

    return $instance;
  }

  function form($instance) {
    // Output admin widget options form
    $title = esc_attr($instance['title']);

    require('widgets/menu/menu-fields.php');
  }
}

function menu_widget() {
  register_widget('MenuWidget');
}

add_action('widgets_init', 'menu_widget');



?>