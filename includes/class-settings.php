<?php

class Class_settings{

    public static function init() {

        add_action('admin_menu', [__CLASS__, 'add_settings_page']);
        
    }

    public static function add_settings_page() {
        add_options_page(
            'Custom Plugin Settings',
            'Custom Plugin',
            'manage_options',
            'custom-plugin-settings',
            [__CLASS__, 'render_settings_page']
        );
    }

    public static function render_settings_page() {
        echo '<h1>Custom Plugin Settings</h1>';
        // Add form or settings fields here
    }

}