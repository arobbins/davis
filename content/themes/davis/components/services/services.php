<section class="component" style="background-color: #<?php the_sub_field('background_color', $post->ID); ?>">

  <div class="l-row l-row-center component-services">
    <h1><?php the_sub_field('heading', $post->ID); ?></h1>

    <div class="l-row l-row-center">
      <?php
        $loop = new WP_Query(array( 'post_type' => 'services', 'posts_per_page' => -1 ));

        while ( $loop->have_posts() ) : $loop->the_post(); ?>

          <div class="l-box l-box-3">
            <?php
              the_field('service_name', get_the_id());
              the_field('service_description', get_the_id());
            ?>
          </div>

        <?php endwhile;

        wp_reset_query();

      ?>
    </div>
  </div>
</section>