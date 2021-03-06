<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>

  <?php get_template_part('templates/head'); ?>

  <body <?php body_class('l-col animated fadeIn'); ?>>

    <nav class="l-row l-row-right" id="menu">
      <?php
        if (has_nav_menu('mobile_navigation')) :
          wp_nav_menu(['theme_location' => 'mobile_navigation', 'menu_class' => 'nav nav-mobile l-row l-row-right']);
        endif;
      ?>
    </nav>

    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->

    <div id="content">

      <?php
        do_action('get_header');
        get_template_part('templates/header');

        $content = get_the_content();
        global $post;
      ?>

      <?php if (Setup\display_sidebar()) : ?>

        <div class="l-row l-row-center l-fill main cf">
          <main class="l-box l-fill" role="document">
            <?php include Wrapper\template_path(); ?>
          </main>
          <aside class="l-box l-box-3 sidebar">
            <?php include Wrapper\sidebar_path(); ?>
          </aside>
        </div>

      <?php else: ?>

        <?php

          if(!empty($content)) { ?>

            <main class="l-row l-row-center l-fill main cf" role="document">
              <div class="l-box l-fill">
                <?php include Wrapper\template_path(); ?>
              </div>
            </main>

          <?php } else {

            if(is_404()) {
              get_template_part('404');
            }

          } ?>

          <?php get_template_part('templates/content-components'); ?>

      <?php endif; ?>

      <?php
        do_action('get_footer');
        get_template_part('templates/footer');
        wp_footer();
      ?>

    </div>

  </body>
</html>
