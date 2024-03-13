<?php

$nonce = wp_create_nonce( 'my-nonce' );

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    $nonceKey = $_POST['my_nonce'] ?? null;


    if(!wp_verify_nonce( $nonceKey, 'my-nonce')){

        echo '<div id="setting-error-settings_updated" class="notice notice-error settings-error is-dismissible"> 
<p><strong>Security Check Error.</strong></p></div>';

    } else {
        // Formdan gelen verileri al
        $wa_button_is_active = isset($_POST['wa_button_is_active']) ? $_POST['wa_button_is_active'] : 0;
        $wa_button_phone = isset($_POST['wa_button_phone']) ? $_POST['wa_button_phone'] : '902129099681';
        $wa_button_default_message = isset($_POST['wa_button_default_message']) ? $_POST['wa_button_default_message'] : 'Hi! I need help with something.';
        $wa_button_default_align = isset($_POST['wa_button_default_align']) ? $_POST['wa_button_default_align'] : 'bottom_right';
        $wa_button_background_color = isset($_POST['wa_button_background_color']) ? $_POST['wa_button_background_color'] : '#25D366';
        $wa_button_text_color = isset($_POST['wa_button_text_color']) ? $_POST['wa_button_text_color'] : '#FFFFFF';
        $wa_button_margin_left_px = isset($_POST['wa_button_margin_left_px']) ? $_POST['wa_button_margin_left_px'] : 10;
        $wa_button_margin_right_px = isset($_POST['wa_button_margin_right_px']) ? $_POST['wa_button_margin_right_px'] : 10;
        $wa_button_margin_bottom_px = isset($_POST['wa_button_margin_bottom_px']) ? $_POST['wa_button_margin_bottom_px'] : 10;
        $wa_button_margin_top_px = isset($_POST['wa_button_margin_top_px']) ? $_POST['wa_button_margin_top_px'] : 10;
        $wa_button_default_show = isset($_POST['wa_button_default_show']) ? $_POST['wa_button_default_show'] : 'all';
        $wa_button_title = isset($_POST['wa_button_title']) ? $_POST['wa_button_title'] : 'WhatsApp';
        $wa_button_text = isset($_POST['wa_button_text']) ? $_POST['wa_button_text'] : 'Contact on WhatsApp';

        // Alınan verileri WordPress seçenekleri olarak kaydet
        update_option('buttonify_wa_button_is_active', $wa_button_is_active);
        update_option('buttonify_wa_button_phone', $wa_button_phone);
        update_option('buttonify_wa_button_default_message', $wa_button_default_message);
        update_option('buttonify_wa_button_default_align', $wa_button_default_align);
        update_option('buttonify_wa_button_background_color', $wa_button_background_color);
        update_option('buttonify_wa_button_text_color', $wa_button_text_color);
        update_option('buttonify_wa_button_margin_left_px', $wa_button_margin_left_px);
        update_option('buttonify_wa_button_margin_right_px', $wa_button_margin_right_px);
        update_option('buttonify_wa_button_margin_bottom_px', $wa_button_margin_bottom_px);
        update_option('buttonify_wa_button_margin_top_px', $wa_button_margin_top_px);
        update_option('buttonify_wa_button_default_show', $wa_button_default_show);
        update_option('buttonify_wa_button_title', $wa_button_title);
        update_option('buttonify_wa_button_text', $wa_button_text);

        // Display a message that it has been updated successfully
        echo '<div id="setting-error-settings_updated" class="notice notice-success settings-error is-dismissible"> 
<p><strong>Settings Saved.</strong></p></div>';
    }

}

// Get current setting values
$wa_button_is_active = get_option('buttonify_wa_button_is_active', 0);
$wa_button_phone = get_option('buttonify_wa_button_phone', '902129099681');
$wa_button_default_message = get_option('buttonify_wa_button_default_message', 'Hi! I need help with something.');
$wa_button_default_align = get_option('buttonify_wa_button_default_align', 'bottom_right');
$wa_button_background_color = get_option('buttonify_wa_button_background_color', '#25D366');
$wa_button_text_color = get_option('buttonify_wa_button_text_color', '#FFFFFF');
$wa_button_margin_left_px = get_option('buttonify_wa_button_margin_left_px', 10);
$wa_button_margin_right_px = get_option('buttonify_wa_button_margin_right_px', 10);
$wa_button_margin_bottom_px = get_option('buttonify_wa_button_margin_bottom_px', 10);
$wa_button_margin_top_px = get_option('buttonify_wa_button_margin_top_px', 10);
$wa_button_default_show = get_option('buttonify_wa_button_default_show', 'all');
$wa_button_title = get_option('buttonify_wa_button_title', 'WhatsApp');
$wa_button_text = get_option('buttonify_wa_button_text', 'Contact on WhatsApp');
?>

<div class="wrap">
    <h2>Buttonify Management Panel</h2>
    <form method="post">


        <input type="hidden" name="my_nonce" value="<?php echo esc_attr($nonce); ?>" />

        <table class="form-table" role="presentation">
            <tbody>
            <tr>
                <th scope="row">
                    <label for="wa_button_is_active">Button Is Active?</label>
                </th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text">
                            <span> Button Is Active?</span>
                        </legend>
                        <label for="wa_button_is_active">
                            <input type="checkbox" id="wa_button_is_active" name="wa_button_is_active" value="1" <?php checked($wa_button_is_active, 1); ?>> Chat Button Is Active? </label>
                    </fieldset>

                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="wa_button_phone">Phone Number</label>
                </th>
                <td>
                    <input type="number" id="wa_button_phone" name="wa_button_phone" class="regular-text" placeholder="902129099681" value="<?php echo esc_attr($wa_button_phone); ?>">
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="wa_button_default_message">Default Message</label>
                </th>
                <td>
                    <textarea id="wa_button_default_message" name="wa_button_default_message" class="regular-text" placeholder="Hi! I need help with something." rows="4" cols="50"><?php echo esc_textarea($wa_button_default_message); ?></textarea>
                    <p class="description" id="tagline-description">The default message you want your potential customers to send when reaching out to you.</p>
                </td>
            </tr>
            <tr>
                <th scope="row">Default Position</th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text">
                            <span> Default Position </span>
                        </legend>
                        <label>
                            <input type="radio" name="wa_button_default_align" value="top_left" <?php echo (esc_attr($wa_button_default_align) == 'top_left') ? 'checked="checked"' : ''; ?> >
                            <span class="date-time-text format-i18n">Top Left</span>
                        </label>
                        <label style="margin-left: 20px!important;">
                            <input type="radio" name="wa_button_default_align" value="top_right" <?php echo (esc_attr($wa_button_default_align) == 'top_right') ? 'checked="checked"' : ''; ?> >
                            <span class="date-time-text format-i18n">Top Right</span>
                        </label>
                        <label style="margin-left: 20px!important;">
                            <input type="radio" name="wa_button_default_align" value="bottom_left" <?php echo (esc_attr($wa_button_default_align) == 'bottom_left') ? 'checked="checked"' : ''; ?> >
                            <span class="date-time-text format-i18n">Bottom Left</span>
                        </label>
                        <label style="margin-left: 20px!important;">
                            <input type="radio" name="wa_button_default_align" value="bottom_right" <?php echo (esc_attr($wa_button_default_align) == 'bottom_right') ? 'checked="checked"' : ''; ?> >
                            <span class="date-time-text format-i18n">Bottom Right</span>
                        </label>
                    </fieldset>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label>Button Colors</label>
                </th>
                <td>
                    <label for="wa_button_background_color"><strong>Background Color: &nbsp; </strong></label><input type="color" id="wa_button_background_color" name="wa_button_background_color" class="regular-text" value="<?php echo esc_attr($wa_button_background_color); ?>">
                    <label style="margin-left: 10px;!important;" for="wa_button_text_color"><strong>Text Color: &nbsp; </strong></label><input type="color" id="wa_button_text_color" name="wa_button_text_color" class="regular-text" value="<?php echo esc_attr($wa_button_text_color); ?>">
                </td>
            </tr>

            <tr>
                <th scope="row">Display Options</th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text">
                            <span> Display Options </span>
                        </legend>
                        <label>
                            <input type="radio" name="wa_button_default_show" value="both" <?php echo (esc_attr($wa_button_default_show) == 'both') ? 'checked="checked"' : ''; ?> >
                            <span class="date-time-text format-i18n">Both</span>
                        </label>
                        <label style="margin-left: 20px!important;">
                            <input type="radio" name="wa_button_default_show" value="only_mobile" <?php echo (esc_attr($wa_button_default_show) == 'only_mobile') ? 'checked="checked"' : ''; ?> >
                            <span class="date-time-text format-i18n">Only Mobile</span>
                        </label>
                        <label style="margin-left: 20px!important;">
                            <input type="radio" name="wa_button_default_show" value="only_desktop" <?php echo (esc_attr($wa_button_default_show) == 'only_desktop') ? 'checked="checked"' : ''; ?> >
                            <span class="date-time-text format-i18n">Only Desktop</span>
                        </label>
                    </fieldset>
                </td>
            </tr>



            <tr>
                <th scope="row">
                    <label>Button Texts</label>
                </th>
                <td>
                    <label for="wa_button_title"><strong>Title: &nbsp; </strong></label><input type="text" id="wa_button_title" name="wa_button_title" class="regular-text" placeholder="WhatsApp" value="<?php echo esc_attr($wa_button_title); ?>">
                    <label style="margin-left: 10px!important;" for="wa_button_text"><strong>Text: &nbsp; </strong></label><input type="text" id="wa_button_text" name="wa_button_text" class="regular-text" placeholder="Contact on WhatsApp" value="<?php echo esc_attr($wa_button_text); ?>">
                </td>
            </tr>



            <tr>
                <th scope="row">
                    <label>Button Margin (px)</label>
                </th>
                <td>
                    <label for="wa_button_margin_top_px"><strong>Top: &nbsp; </strong></label><input type="number" id="wa_button_margin_top_px" name="wa_button_margin_top_px" class="" placeholder="10" min="0" value="<?php echo esc_attr($wa_button_margin_top_px); ?>">
                    <label style="margin-left: 10px!important;" for="wa_button_margin_bottom_px"><strong>Bottom: &nbsp; </strong></label><input type="number" id="wa_button_margin_bottom_px" name="wa_button_margin_bottom_px" class="" placeholder="10" min="0" value="<?php echo esc_attr($wa_button_margin_bottom_px); ?>">
                    <label style="margin-left: 10px!important;" for="wa_button_margin_left_px"><strong>Left: &nbsp; </strong></label><input type="number" id="wa_button_margin_left_px" name="wa_button_margin_left_px" class="" placeholder="10" min="0" value="<?php echo esc_attr($wa_button_margin_left_px); ?>">
                    <label style="margin-left: 10px!important;" for="wa_button_margin_right_px"><strong>Right: &nbsp; </strong></label><input type="number" id="wa_button_margin_right_px" name="wa_button_margin_right_px" class="" placeholder="10" min="0" value="<?php echo esc_attr($wa_button_margin_right_px); ?>">
                </td>
            </tr>


            </tbody>
        </table>

        <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>




    </form>
</div>

