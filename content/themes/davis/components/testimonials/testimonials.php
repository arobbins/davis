<section class="component component-testimonials" style="background-color: #<?php the_sub_field('background_color', $post->ID); ?>">
  <div class="l-row l-row-center">
    <div class="l-col l-col-center">
      <?php
        $loop = new WP_Query(array( 'post_type' => 'testimonials', 'posts_per_page' => 1, 'orderby' => 'rand' ));

        while ( $loop->have_posts() ) : $loop->the_post(); ?>

          <div class="testimonial"><?php the_field('testimonial', get_the_id()); ?></div>
          <div class="testimonial-attribution"><?php the_field('testimonial_attribution', get_the_id()); ?></div>

        <?php endwhile;

        wp_reset_query();

      ?>
    </div>
  </div>
</section>