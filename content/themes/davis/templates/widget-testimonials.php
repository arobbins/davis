<section class="l-box widget">
  <?php
    $loop = new WP_Query(array( 'post_type' => 'testimonials', 'posts_per_page' => 1, 'orderby' => 'rand' ));

    while ( $loop->have_posts() ) : $loop->the_post(); ?>

      <div class="testimonial"><?php the_field('testimonial', get_the_id()); ?></div>
      <div class="testimonial-attribution"><?php the_field('testimonial_attribution', get_the_id()); ?></div>

    <?php endwhile;

    wp_reset_query();

  ?>
</section>