<?php
/**
 * Plugin Name: Wp Plugin Boilerplate
 * Descripton: A clean Singleton Architecture based WordPress Plugin Boiler Plate
 * Version: 1.0
 * Author Ashikur Rahman
 * Author URI: https://pixelese.com/ashikur-rahman
 */



if( ! defined('ABSPATH') ) exit;

class Wp_plugin_boilerplate{

    private static $instance = null;

    private $version = '1.0.0';

    //private constructor to prevents external instantiaton
    private function __construct(){

        $this->load_dependencies();
        $this->initialize_hooks();

    }

    //singleton instance method
    public static function get_instance(){

        if(self::$instance === null){
            self::$instance = new self();
        }

        return self::$instance;

    }

    //Register activation and deactivation hooks
    private function register_activation_and_deactivation_hooks(){

        register_activation_hook( __FILE__, [$this, 'activate'] );

        register_deactivation_hook( __FILE__, [$this,  'deactivate']);

    }

    //activation callback to set default option
    public function activate(){

        if( ! get_option( 'horizon_scroll_version' ) ){

            add_option( 'horizon_scroll_versino', $this->version );

        }

    }

    //deactivaate callback
    public function deactivate(){

        //any task during plugin deactivation

    }


    //Load Dependencies by nclcuding modular files
    private function load_dependencies(){

        require_once plugin_dir_path( __FILE__ ) . 'includes/class-custom-post-type.php';
        require_once plugin_dir_path( __FILE__ ) . 'includes/class-shortcodes.php';
        require_once plugin_dir_path( __FILE__ ) . 'includes/class-settings.php';
        require_once plugin_dir_path( __FILE__ ) . 'includes/class-enqueue-scripts.php';

    }

    //Initialize Hooks
    private function initialize_hooks(){

        //initialize custom post type
       Class_custom_post_type::init();
  

        //initialize shortcode
        Class_shortcodes::init();

        //initialize Option menu
        Class_settings::init();

        //initialize enque-scripts
        Class_enqueue_scripts::init();
        

    }

    //prevent object clonning
    private function __clone(){}

    //Prevent unserialization
    private function __wakeup(){}




}


//intialize the plugin instance
Wp_plugin_boilerplate::get_instance();