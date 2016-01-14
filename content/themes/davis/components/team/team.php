<section class="component component-team">
  <div class="l-row l-row-center l-gutter-m">

      <?php

        $loop = new WP_Query(array( 'post_type' => 'staff', 'orderby' => 'date', 'order' => 'ASC', 'posts_per_page' => -1));

        while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <div class="l-box l-box-3 team-member">
            <img src="<?php the_field('staff_image', get_the_id()); ?>" class="team-image is-circle">
            <h2 class="team-name"><?php the_field('staff_name', get_the_id()); ?></h2>
            <h3 class="team-role"><?php the_field('staff_role', get_the_id()); ?></h3>
            <div class="team-bio"><?php the_field('staff_bio', get_the_id()); ?></div>
            <div class="team-social">
              <ul class="l-row l-row-center team-social-list">

                <?php if(get_field('staff_linkedin', get_the_id())) { ?>
                  <li class="team-social-item">
                    <a href="<?php the_field('staff_linkedin', get_the_id()); ?>" class="team-social-link">
                      <i class="fa fa-linkedin team-social-icon"></i>
                    </a>
                  </li>
                <?php } ?>

                <?php if(get_field('staff_twitter', get_the_id())) { ?>
                  <li class="team-social-item">
                    <a href="<?php the_field('staff_twitter', get_the_id()); ?>" class="team-social-link">
                      <i class="fa fa-twitter team-social-icon"></i>
                    </a>
                  </li>
                <?php } ?>

                <?php if(get_field('staff_facebook', get_the_id())) { ?>
                  <li class="team-social-item">
                    <a href="<?php the_field('staff_facebook', get_the_id()); ?>" class="team-social-link">
                      <i class="fa fa-facebook team-social-icon"></i>
                    </a>
                  </li>
                <?php } ?>

              </ul>
            </div>
        </div>
        <?php endwhile;

        wp_reset_query();

      ?>

  </div>
</section>
