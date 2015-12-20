<?php if(is_front_page()) { ?>

<!-- <div class="headerr"> -->


<div class="video-wrapper">

  <video autoplay preload loop muted poster="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/davis-video-poster.jpg" class="video">
    <source src="<?php echo get_stylesheet_directory_uri(); ?>/assets/video/davis.mp4" type="video/mp4">
    <source src="<?php echo get_stylesheet_directory_uri(); ?>/assets/video/davis.webm" type="video/webm">
  </video>

  <div class="l-row l-row-center l-contained header">
    <a class="l-box l-box-4" href="<?= esc_url(home_url('/')); ?>">
      <img src="<?php the_field('global_logo', 'option'); ?>" alt="<?php bloginfo('name'); ?>" class="logo" />
    </a>
    <div class="l-box l-fit nav-wrapper">
      <nav class="l-row l-row-right nav-secondary">
        <?php
          if(has_nav_menu('secondary_navigation')) :
            wp_nav_menu(['theme_location' => 'secondary_navigation', 'menu_class' => 'nav nav-secondary l-row l-row-spaced']);
          endif;
        ?>
        <a href="<?php the_field('global_social_facebook'); ?>" class="icon icon-facebook"></a>
        <a href="<?php the_field('global_social_twitter'); ?>" class="icon icon-twitter"></a>
      </nav>
      <nav class="l-row l-row-right nav-primary">
        <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav nav-primary l-row l-row-right']);
          endif;
        ?>
      </nav>
    </div>
  </div>

  <div class="video-cta">
    <h1 class="video-text">Posuere laborum elementum maxime ullamcorper eaque.</h1>
    <a href="" class="btn btn-l btn-primary">Learn more</a>
  </div>

</div>

<?php } else { ?>

<header class="l-row l-row-center l-contained header">
  <a class="l-box l-box-4" href="<?= esc_url(home_url('/')); ?>">
    <img src="<?php the_field('global_logo', 'option'); ?>" alt="<?php bloginfo('name'); ?>" class="logo" />
  </a>
  <div class="l-box l-fit nav-wrapper">
    <nav class="l-row l-row-right nav-secondary">
      <?php
        if(has_nav_menu('secondary_navigation')) :
          wp_nav_menu(['theme_location' => 'secondary_navigation', 'menu_class' => 'nav nav-secondary l-row l-row-spaced']);
        endif;
      ?>
      <a href="<?php the_field('global_social_facebook'); ?>" class="icon icon-facebook"></a>
      <a href="<?php the_field('global_social_twitter'); ?>" class="icon icon-twitter"></a>
    </nav>
    <nav class="l-row l-row-right nav-primary">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav nav-primary l-row l-row-right']);
        endif;
      ?>
    </nav>
  </div>
</header>

<?php } ?>