<?php
  global $post;
  $currentPostID = $post->ID;

  if(is_page()) {
    $cat = get_field('categories');

  } else {
    $cat = get_the_category($currentPostID);
  }

  $args = array('numberposts' => 3, 'category' => $cat[0]->term_id);

  $recent_posts = wp_get_recent_posts($args);

?>

<section class="l-box widget widget-related-news">
  <h1 class="widget-title"><?php echo $title; ?></h1>
  <?php
    foreach( $recent_posts as $recent ){
      echo '<a href="' . get_permalink($recent["ID"]) . '" class="widget-title-link"><h2>' .   $recent["post_title"].'</h2></a>';
      echo '<div class="widget-snippet">' . get_the_excerpt() . '</div>';
    }
  ?>
</section>
