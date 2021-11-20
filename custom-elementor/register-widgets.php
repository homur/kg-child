<?php 

class Elementor_Widgets {
    protected static $instance = null;

    public static function get_instance() {
        if( !isset( static::$instance ) ) {
            static::$instance = new static;
        }

        return static::$instance;
    }

    protected function __construct() {
        require_once('widgets/test_widget.php');
        add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets']);
    }

    public function register_widgets() {
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\Test_Widget());
    }
}

add_action( 'init', 'my_elementor_init');

function my_elementor_init() {
    Elementor_Widgets::get_instance();
}
