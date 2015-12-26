<p>
  <label>Title</label>
  <input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>

<p>
  <label>Form?</label>
  <input class="checkbox" type="checkbox" <?php checked( $instance['form' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'form' ); ?>" name="<?php echo $this->get_field_name( 'form' ); ?>" />
</p>