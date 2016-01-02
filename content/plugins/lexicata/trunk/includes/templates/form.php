<div id="lf_form_container">
    <form method="post" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
        <h3><?php echo get_option('lf_form_heading'); ?></h3>
        <p>
            <label class="description" for="lf_first_name">First Name *</label>
            <input id="lf_first_name" name="lf_first_name" class="" type="text" maxlength="255" value="<?php echo (isset($_POST['lf_first_name']) ? esc_attr($_POST['lf_first_name']) : '' ); ?>" required='required' />
        </p>
        <p>
            <label class="description" for="lf_last_name">Last Name *</label>
            <input id="lf_last_name" name="lf_last_name" class="" type="text" maxlength="255" value="<?php echo (isset($_POST['lf_last_name']) ? esc_attr($_POST['lf_last_name']) : '' ); ?>" required='required' />
        </p>
        <p>
            <label class="description" for="lf_email">Email *</label>
            <input id="lf_email" name="lf_email" class="" type="email" maxlength="255" placeholder="user@example.com" value="<?php echo (isset($_POST['lf_email']) ? esc_attr($_POST['lf_email']) : '' ); ?>" required='required' />
        </p>
        <p>
            <label class="description" for="lf_phone">Phone </label>
            <input id="lf_phone" name="lf_phone" class="" type="text" maxlength="24" placeholder="(###) ###-####" value="<?php echo (isset($_POST['lf_phone']) ? esc_attr($_POST['lf_phone']) : '' ); ?>" />
        </p>
        <p>
            <label class="description" for="lf_message"><?php echo get_option('lf_message_field_label'); ?> *</label>
            <textarea id="lf_message" name="lf_message" class="" required='required' ><?php echo (isset($_POST['lf_message']) ? esc_attr($_POST['lf_message']) : '' ); ?></textarea>
        </p>
        <div id="lf_wrap" style="display:none;">
            <label class="description" for="leave_this_blank">Leave this Blank if are sentient </label>
            <input name="leave_this_blank_url" type="text" value="" id="leave_this_blank"/>
        </div>
        <input type="hidden" name="leave_this_alone" value="<?php echo base64_encode(time()); ?>"/>
        <p class="buttons">
            <input type="hidden" name="form_id" value="1044046" />
            <input id="saveForm" class="button_text" type="submit" name="lf_submit" value="<?php echo get_option('lf_submit_button_text'); ?>" style="background-color: <?php echo get_option('lf_submit_button_color'); ?>; color:<?php echo get_option('lf_submit_button_text_color'); ?>" />
        </p>
    </form>
</div>
