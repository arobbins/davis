<section class="component" style="background-color: #<?php the_sub_field('background_color', $post->ID); ?>">
  <div class="l-row l-row-center component-latest">

    <h1><?php the_sub_field('component_latest_heading', $post->ID); ?></h1>
    <div class="l-row l-row-center">
      <?php
        $loop = new WP_Query(array( 'post_type' => 'post', 'posts_per_page' => 3 ));

        while ( $loop->have_posts() ) : $loop->the_post();

          $thumb_id = get_post_thumbnail_id();
          $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumb', true);
          $thumb_url = $thumb_url_array[0];

        ?>

          <div class="l-box l-box-3">
            <img src="<?php echo $thumb_url; ?>">
            <h2><?php the_title(); ?></h2>
            <p><?php the_excerpt(); ?></p>
          </div>

        <?php endwhile;

        wp_reset_query();

      ?>
    </div>

  </div>
</section>