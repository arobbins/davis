<section class="component component-clients">
  <div class="l-row l-row-center">
      <?php
      
        $loop = new WP_Query(array( 'post_type' => 'clients', 'orderby' => 'date', 'order' => 'ASC', 'posts_per_page' => -1));

        while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <div class="l-box l-box-4 l-col l-col-center client">
          <h2 class="client-name"><?php the_field('client_name', get_the_id()); ?></h2>
          <a href="<?php the_field('client_link', get_the_id()); ?>">
            <img src="<?php the_field('client_logo', get_the_id()); ?>" class="client-image">
          </a>
        </div>
        <?php endwhile;

        wp_reset_postdata();

      ?>
  </div>
</section>
