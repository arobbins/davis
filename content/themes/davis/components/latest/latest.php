<?php if(get_sub_field('background_pattern', $post->ID)) { ?>
  <section class="component component-latest" style="background-image: url(<?php the_sub_field('background_pattern_image', $post->ID); ?>);">
<?php } else { ?>
  <section class="component component-latest" style="background-color: #<?php the_sub_field('background_color', $post->ID); ?>">
<?php } ?>

  <div class="l-row l-row-center">

    <h1 class="component-heading component-latest-heading">
      <?php the_sub_field('heading', $post->ID); ?>
    </h1>

    <div class="l-row l-row-center">
      <?php
        $loop = new WP_Query(array( 'post_type' => 'post', 'posts_per_page' => 3 ));

        while ( $loop->have_posts() ) : $loop->the_post();

          $thumb_id = get_post_thumbnail_id();
          $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumb', true);
          $thumb_url = $thumb_url_array[0];

        ?>

          <div class="l-box l-box-3 card card-secondary">
            <img src="<?php echo $thumb_url; ?>" class="card-image">

            <a href="<?php the_permalink(); ?>" class="card-heading-link">
              <h2 class="card-heading"><?php the_title(); ?></h2>
            </a>

            <div class="card-meta">
              <?php get_template_part('templates/entry-meta'); ?>
            </div>

            <div class="card-description"><?php the_excerpt(); ?></div>
          </div>

        <?php endwhile;

        wp_reset_query();

      ?>
    </div>

  </div>
</section>