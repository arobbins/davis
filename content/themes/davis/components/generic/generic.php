<section class="component">
  <div class="l-row l-row-center component-generic">

      <?php
        // check if the repeater field has rows of data
        if(have_rows('generic_rows')):

          // loop through the rows of data
          while (have_rows('generic_rows') ) : the_row(); ?>

            <div class="l-row">
            <?php if(have_rows('generic_columns')):

              // loop through the rows of data
              while (have_rows('generic_columns') ) : the_row(); ?>
                <?php
                  //the_sub_field('generic_columns_width');
                ?>
                <div class="l-box <?php if(get_sub_field('generic_columns_width') == null) { echo 'l-fill'; } else { the_sub_field('generic_columns_width');} ?>">
                  <?php the_sub_field('generic_columns_content'); ?>
                </div>

              <?php endwhile;

            endif; ?>
            </div>

          <?php endwhile;

        else:

        endif;

      ?>

  </div>
</section>