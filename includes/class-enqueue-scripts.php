<?php

class Class_enqueue_scripts{

    public static function init() {

        add_action('wp_enqueue_scripts', [__CLASS__, 'enqueue_frontend_assets']);

    }

    public static function enqueue_frontend_assets() {

        wp_enqueue_style('custom-plugin-styles', plugin_dir_url(__FILE__) . '../assets/css/style.css');

        wp_enqueue_script('custom-plugin-scripts', plugin_dir_url(__FILE__) . '../assets/js/script.js', ['jquery'], null, true);

    }

}