<section class="l-box widget">
  <h1 class="widget-title"><?php echo $title; ?></h1>
  <?php
    $args = array('numberposts' => 1);
    $recent_posts = wp_get_recent_posts($args);
    foreach( $recent_posts as $recent ){
      echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
      echo the_excerpt();
    }
  ?>
</section>