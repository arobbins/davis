
  <?php

    the_content();

    wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']);

    if(have_rows('components')): ?>

    <div class="l-row l-row-center">

      <?php while(have_rows('components')) : the_row();

        //
        // Generic
        //
        if(get_row_layout() == 'component_generic'):

          get_template_part('components/generic/generic');

        //
        // Video
        //
        elseif(get_row_layout() == 'component_video'):

          //get_template_part('components/video/video');

        //
        // Featured Content
        //
        elseif(get_row_layout() == 'component_featured_content'):

          //get_template_part('components/featured-content/featured-content');

        endif;

      endwhile;

    else:

    endif; ?>
      <section>
        <h1>Hello</h1>
      </section>
    </div>