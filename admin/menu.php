<?php

class Buttonify_Admin_Menu {

    public static function buttonify_add_admin_menu() {
        // Ana menüyü ekleyin
        add_menu_page(
            'Buttonify',
            'Buttonify',
            'manage_options',
            'buttonify-menu',
            array( 'Buttonify_Admin_Menu', 'buttonify_render_admin_page' ),
            'dashicons-whatsapp',
            20
        );
    }

    public static function buttonify_render_admin_page() {
        return include('page.php');
    }


}
