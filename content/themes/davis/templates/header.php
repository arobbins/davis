<?php
  use Roots\Sage\Titles;
  global $post;

  if(is_home()) {
    $id = get_option('page_for_posts');

  } else {
    $id = $post->ID;
  }

  if(is_single()) {
    $thumb_id = get_post_thumbnail_id();
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
    $thumb_url = $thumb_url_array[0];
  }

?>

<?php if(is_front_page()) { ?>

  <div class="video-wrapper header">

    <video autoplay preload loop muted poster="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/davis-video-poster.jpg" class="video">
      <source src="<?php echo get_stylesheet_directory_uri(); ?>/assets/video/davis.mp4" type="video/mp4">
      <source src="<?php echo get_stylesheet_directory_uri(); ?>/assets/video/davis.webm" type="video/webm">
    </video>

    <div class="l-row l-row-center l-contained header-container">
      <a class="l-box l-box-4 logo-wrapper" href="<?= esc_url(home_url('/')); ?>">
        <img src="<?php the_field('global_logo', 'option'); ?>" alt="<?php bloginfo('name'); ?>" class="logo" />
      </a>
      <div class="l-box l-fill nav-wrapper">
        <nav class="l-row l-row-right nav-secondary">
          <?php
            if(has_nav_menu('secondary_navigation')) :
              wp_nav_menu(['theme_location' => 'secondary_navigation', 'menu_class' => 'nav nav-secondary l-row l-row-right']);
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

    <div class="marquee-text">
      <h1 class="">Posuere laborum elementum maxime ullamcorper eaque.</h1>
      <a href="" class="btn btn-l btn-primary">Learn more</a>
    </div>

    <button class="menu-mobile-toggle">
      <span>toggle menu</span>
    </button>

  </div>

<?php } else { ?>

  <?php if(is_single()) { ?>

  <header class="header" style="background-image: url('<?php echo $thumb_url; ?>')">

  <?php } else { ?>

  <header class="header" style="background-image: url('<?php the_field('marquee_image', $id); ?>')">

  <?php } ?>

    <div class="l-row l-row-center l-contained header-container">

      <h1 class="marquee-text"><?= Titles\title(); ?></h1>

      <a class="l-box l-box-4 logo-wrapper" href="<?= esc_url(home_url('/')); ?>">
        <img src="<?php the_field('global_logo', 'option'); ?>" alt="<?php bloginfo('name'); ?>" class="logo" />
      </a>

      <div class="l-box l-fill nav-wrapper">

        <nav class="l-row l-row-right nav-secondary">
          <?php
            if(has_nav_menu('secondary_navigation')) :
              wp_nav_menu(['theme_location' => 'secondary_navigation', 'menu_class' => 'nav nav-secondary l-row l-row-right']);
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

    <button class="menu-mobile-toggle">
      <span>toggle menu</span>
    </button>

  </header>

<?php } ?>