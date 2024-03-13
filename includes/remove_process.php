<?php
class Buttonify_Remove_Process {

    public static function buttonify_remove_options() {
        // Ayarları sil
        $options_to_remove = array(
            'buttonify_wa_button_is_active',
            'buttonify_wa_button_phone',
            'buttonify_wa_button_default_message',
            'buttonify_wa_button_default_align',
            'buttonify_wa_button_background_color',
            'buttonify_wa_button_text_color',
            'buttonify_wa_button_margin_left_px',
            'buttonify_wa_button_margin_right_px',
            'buttonify_wa_button_margin_bottom_px',
            'buttonify_wa_button_margin_top_px',
            'buttonify_wa_button_default_show',
            'buttonify_wa_button_title',
            'buttonify_wa_button_text'
        );

        // Ayarları sil
        foreach ($options_to_remove as $option) {
            delete_option($option);
        }
    }
}
