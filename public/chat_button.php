<?php

function darken_color($hex, $percent) {
    // Breaking down the color code
    $red = hexdec(substr($hex, 1, 2));
    $green = hexdec(substr($hex, 3, 2));
    $blue = hexdec(substr($hex, 5, 2));

    // The value to be used for darkening as a percentage
    $delta = $percent / 100;

    // Darken colors with a constant value
    $red *= (1 - $delta);
    $green *= (1 - $delta);
    $blue *= (1 - $delta);

    // Controlling RGB values from 0 to 255
    $red = max(0, min(255, round($red)));
    $green = max(0, min(255, round($green)));
    $blue = max(0, min(255, round($blue)));

    // Create the new color code
    return sprintf("#%02X%02X%02X", $red, $green, $blue);
}


function buttonify_add_chat_button_to_footer(){

    // Get current setting values
    $wa_button_is_active = get_option('buttonify_wa_button_is_active', 0);
    $wa_button_phone = get_option('buttonify_wa_button_phone', '902129099681');
    $wa_button_default_message = urlencode(esc_attr(get_option('buttonify_wa_button_default_message', 'Hi! I need help with something.')));
    $wa_button_default_align = get_option('buttonify_wa_button_default_align', 'bottom_right');
    $wa_button_background_color = get_option('buttonify_wa_button_background_color', '#25D366');
    $wa_button_background_color_hover = darken_color($wa_button_background_color, 20);
    $wa_button_text_color = get_option('buttonify_wa_button_text_color', '#FFFFFF');
    $wa_button_margin_left_px = get_option('buttonify_wa_button_margin_left_px', 10);
    $wa_button_margin_right_px = get_option('buttonify_wa_button_margin_right_px', 10);
    $wa_button_margin_bottom_px = get_option('buttonify_wa_button_margin_bottom_px', 10);
    $wa_button_margin_top_px = get_option('buttonify_wa_button_margin_top_px', 10);
    $wa_button_default_show = get_option('buttonify_wa_button_default_show', 'all');
    $wa_button_title = get_option('buttonify_wa_button_title', 'WhatsApp');
    $wa_button_text = get_option('buttonify_wa_button_text', 'Contact on WhatsApp');

    $wa_button_url = "https://wa.me/$wa_button_phone?text=$wa_button_default_message";

    $wa_show_class = '';
    switch ($wa_button_default_show){
        case $wa_button_default_show == 'only_mobile':
            $wa_show_class = 'buttonify-mobile-only';
            break;
        case $wa_button_default_show == 'only_desktop':
            $wa_show_class = 'buttonify-desktop-only';
            break;
    }

    if($wa_button_is_active){
    ?>

        <style>
            .buttonify-whatsapp-button {
                display: inline-flex;
                justify-content: flex-start;
                align-items: center;
                padding: 12px 20px;
                background: <?php echo esc_attr($wa_button_background_color); ?>;
                text-align: left;
                text-decoration: none;
                font-family: sans-serif;
                font-size: 16px;
                line-height: 20px;
                border-radius: 12px;
                box-shadow: rgba(255, 255, 255, 0.25) 0 0 0 3px inset;
                transition: 0.3s ease-out;
                margin: 10px;
                overflow: visible;
                position: fixed;
            }
            .buttonify-whatsapp-button, .buttonify-whatsapp-button:hover, .buttonify-whatsapp-button:focus, .buttonify-whatsapp-button:active {
                color: <?php echo esc_attr($wa_button_text_color); ?>;
                text-decoration: none;
            }
            .buttonify-whatsapp-button:hover, .buttonify-whatsapp-button:focus {
                background: <?php echo esc_attr($wa_button_background_color_hover); ?>; /* In case of hover the background color will be darker */
            }
            .buttonify-whatsapp-button:focus {
                outline: none;
            }
            .buttonify-whatsapp-button:active {
                background: <?php echo esc_attr($wa_button_background_color_hover); ?>;
                transition: none;
            }
            .buttonify-whatsapp-button p {
                margin: 0;
            }
            .buttonify-whatsapp-button span {
                display: block;
                font-size: 14px;
                line-height: 18px;
            }
            .buttonify-whatsapp-button strong {
                display: block;
                font-weight: 700;
            }
            .buttonify-whatsapp-button svg {
                width: 36px;
                height: 36px;
                fill: currentcolor;
                flex-shrink: 0;
                margin-right: 8px;
            }

            /* Left Top */
            .buttonify-whatsapp-button.top_left {
                top: <?php echo esc_attr($wa_button_margin_top_px); ?>px !important;
                left: <?php echo esc_attr($wa_button_margin_left_px); ?>px !important;
            }

            /* Right Top */
            .buttonify-whatsapp-button.top_right {
                top: <?php echo esc_attr($wa_button_margin_top_px); ?>px !important;
                right: <?php echo esc_attr($wa_button_margin_right_px); ?>px !important;
            }

            /* Left Bottom */
            .buttonify-whatsapp-button.bottom_left {
                bottom: <?php echo esc_attr($wa_button_margin_bottom_px); ?>px !important;
                left: <?php echo esc_attr($wa_button_margin_left_px); ?>px !important;
            }

            /* Right Bottom */
            .buttonify-whatsapp-button.bottom_right {
                bottom: <?php echo esc_attr($wa_button_margin_bottom_px); ?>px !important;
                right: <?php echo esc_attr($wa_button_margin_right_px); ?>px !important;
            }


            /* Class that makes it visible only on mobile */
            .buttonify-mobile-only {
                display: none; /* First hide it on all devices */
            }

            @media only screen and (max-width: 768px) {
                .buttonify-mobile-only {
                    display: block; /* Make visible on mobile devices */
                }
            }

            /* Class that makes it appear only on the desktop */
            .buttonify-desktop-only {
                display: none; /* First hide it on all devices */
            }

            @media only screen and (min-width: 769px) {
                .buttonify-desktop-only {
                    display: block; /* Make visible on desktop devices */
                }
            }

        </style>

    <a class="buttonify-whatsapp-button <?php echo esc_attr($wa_button_default_align).' '.esc_attr($wa_show_class); ?>" href="<?php echo esc_attr($wa_button_url); ?>" target="_blank">
        <svg fill="<?php echo esc_attr($wa_button_text_color); ?>" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path d="M.057,22,1.6,16.351a10.9,10.9,0,1,1,4.233,4.133L.057,22ZM6.1,18.51A9.04,9.04,0,1,0,3.59,16.066L2.674,19.41l3.43-.9ZM16.542,13.5c-.068-.114-.249-.182-.522-.318s-1.612-.8-1.862-.886-.431-.137-.613.137-.7.886-.863,1.068-.318.2-.59.068A7.435,7.435,0,0,1,9.9,12.217,8.2,8.2,0,0,1,8.386,10.33c-.159-.272-.017-.42.119-.556s.272-.318.409-.478a1.787,1.787,0,0,0,.275-.454.5.5,0,0,0-.023-.478c-.069-.136-.613-1.477-.84-2.022s-.446-.459-.613-.468l-.523-.009a1,1,0,0,0-.726.341A3.057,3.057,0,0,0,5.511,8.48,5.3,5.3,0,0,0,6.623,11.3a12.145,12.145,0,0,0,4.653,4.113,15.762,15.762,0,0,0,1.553.574,3.744,3.744,0,0,0,1.716.108,2.806,2.806,0,0,0,1.839-1.3,2.269,2.269,0,0,0,.159-1.3Z"/>
        </svg>
        <p>
            <strong><?php echo esc_attr($wa_button_title); ?></strong>
            <span><?php echo esc_attr($wa_button_text); ?></span>
        </p>
    </a>

<?php }
}
