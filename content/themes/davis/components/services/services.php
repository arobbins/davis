<?php if(get_sub_field('background_pattern', $post->ID)) { ?>
  <section class="component component-services" style="background-image: url(<?php the_sub_field('background_pattern_image', $post->ID); ?>);">
<?php } else { ?>
  <section class="component component-services" style="background-color: #<?php the_sub_field('background_color', $post->ID); ?>">
<?php } ?>

  <div class="l-row l-row-center">
    <h1 class="component-heading component-services-heading"><?php the_sub_field('heading', $post->ID); ?></h1>

    <div class="l-row l-row-center">
      <?php

        $loop = new WP_Query(array( 'post_type' => 'services', 'posts_per_page' => -1 ));

        while ( $loop->have_posts() ) : $loop->the_post(); ?>

          <div class="l-box l-box-3 l-col card card-primary">
            <h2 class="l-row l-row-justify l-col-center card-heading">
               <span class="l-fill"><?php the_field('service_name', get_the_id()); ?> </span>
               <i class="fa fa-<?php the_field('service_icon', get_the_id()); ?>"></i>
            </h2>
            <div class="card-description l-fit"><?php the_field('service_description', get_the_id()); ?></div>
            <a href="<?php the_field('service_page', get_the_id()); ?>" class="btn btn-primary">Learn more</a>
          </div>

        <?php endwhile;

        wp_reset_postdata(); 

      ?>
    </div>
  </div>
</section>
