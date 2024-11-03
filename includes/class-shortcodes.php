<?php

class Class_shortcodes{

    public static function init() {

        add_shortcode('custom_shortcode', [__CLASS__, 'render_custom_shortcode']);

    }

    public static function render_custom_shortcode($atts) {
        return '<p>This is a custom shortcode output.</p>';
    }


}