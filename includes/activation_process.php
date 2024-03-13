<?php
class Buttonify_Activation_Process {

    public static function buttonify_insert_default_options() {
        // Default Options
        $default_options = array(
            'buttonify_wa_button_is_active' => 0,
            'buttonify_wa_button_phone' => '902129099681',
            'buttonify_wa_button_default_message' => 'Hi! I need help with something.',
            'buttonify_wa_button_default_align' => 'bottom_right',
            'buttonify_wa_button_background_color' => '#25D366',
            'buttonify_wa_button_text_color' => '#FFFFFF',
            'buttonify_wa_button_margin_left_px' => 10,
            'buttonify_wa_button_margin_right_px' => 10,
            'buttonify_wa_button_margin_bottom_px' => 10,
            'buttonify_wa_button_margin_top_px' => 10,
            'buttonify_wa_button_default_show' => 'both', // both, only_mobile, only_desktop
            'buttonify_wa_button_title' => 'WhatsApp',
            'buttonify_wa_button_text' => 'Contact on WhatsApp'
        );

        // Save Default Options
        foreach ($default_options as $key => $value) {
            add_option( $key, $value );
        }
    }
}
