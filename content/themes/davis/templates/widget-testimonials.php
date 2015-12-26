<section class="l-box widget">
  <h1 class="widget-title"><?php echo $title; ?></h1>
  <?php
    $loop = new WP_Query(array( 'post_type' => 'testimonials', 'posts_per_page' => 1 ));

    while ( $loop->have_posts() ) : $loop->the_post();

      the_field('testimonial', get_the_id());
      the_field('testimonial_attribution', get_the_id());
    endwhile;

    wp_reset_query();

  ?>
</section>