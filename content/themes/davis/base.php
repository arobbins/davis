<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>

  <?php get_template_part('templates/head'); ?>

  <body <?php body_class('l-col animated fadeIn'); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>

    <?php if (Setup\display_sidebar()) : ?>

      <div class="l-row l-row-center l-fit">
        <main class="l-box l-fit" role="document">
          <?php include Wrapper\template_path(); ?>
        </main>
        <aside class="l-box l-box-3 l-sidebar">
          <?php include Wrapper\sidebar_path(); ?>
        </aside>
      </div>

    <?php else: ?>

      <main class="l-row l-row-center l-fit" role="document">
        <div class="l-box l-fit">
          <?php include Wrapper\template_path(); ?>
        </div>
      </main>

    <?php endif; ?>

    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>
</html>
