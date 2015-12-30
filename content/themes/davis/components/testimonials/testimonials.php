<section class="component" style="background-color: #<?php the_sub_field('background_color', $post->ID); ?>">
  <div class="l-row l-row-center component-testimonials">
    <h1><?php the_sub_field('heading', $post->ID); ?></h1>
      <?php
        $loop = new WP_Query(array( 'post_type' => 'testimonials', 'posts_per_page' => 3 ));

        while ( $loop->have_posts() ) : $loop->the_post();

          the_field('testimonial', get_the_id());
          the_field('testimonial_attribution', get_the_id());
        endwhile;

        wp_reset_query();

      ?>
  </div>
</section>