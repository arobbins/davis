<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

//
// Modifying the excerpt length
//
function custom_excerpt_length($length) {
  return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999);

//
// Modifying the comments form
//
function custom_comments($comment, $args, $depth) {
   include(locate_template('templates/comments-custom.php'));
}

//
// Modifying the comment reply links
//
function replace_reply_link_class($class){
   $class = str_replace("class='comment-reply-link", "class='btn btn-primary btn-s", $class);
   return $class;
}
add_filter('comment_reply_link', 'replace_reply_link_class');

//
// Updating class links on blog buttons
//
function posts_link_attributes() {
  return 'class="btn btn-primary"';
}

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

//
// Getting an excerpt by post ID
//
function get_post_excerpt_by_id($post_id) {
  global $post;
  $post = get_post( $post_id );
  setup_postdata( $post );
  $the_excerpt = get_the_excerpt();
  wp_reset_postdata();
  return $the_excerpt;
}

//
// Changing the default Wordpress login logo
//
function custom_login_logo() { ?>
  <style type="text/css">
    .login h1 a {
      background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/logo-primary.svg);
      padding-bottom: 20px;
      width: 300px;
      background-size: contain;
    }
  </style>
<?php }
add_action('login_enqueue_scripts', 'custom_login_logo');
