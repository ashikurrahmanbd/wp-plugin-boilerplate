<?php

class Class_custom_post_type{


    public static function init() {

        add_action('init', [__CLASS__, 'register_custom_post_type']);
        
    }
    
    public static function register_custom_post_type() {

        register_post_type('custom_type', [
            'labels' => [
                'name' => __('Custom Types'),
                'singular_name' => __('Custom Type')
            ],
            'public' => true,
            'has_archive' => true,
        ]);
    }

}