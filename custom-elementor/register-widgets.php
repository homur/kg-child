<?php

class Elementor_Widgets
{
    protected static $instance = null;

    public static function get_instance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new static;
        }

        return static::$instance;
    }

    protected function __construct()
    {
        require_once('widgets/test_widget.php');
        require_once('widgets/section_title.php');
        require_once('widgets/home_page_title.php');
        require_once('widgets/home_what_we_can.php');
        require_once('widgets/full_width_button.php');
        require_once('widgets/natural_page_title.php');
        add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets']);
    }

    public function register_widgets()
    {
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\Test_Widget());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\Section_Title());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\Home_Page_Title());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\Home_What_We_Can());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\Full_Width_Button());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\Natural_Page_Title());

    }

}

add_action('init', 'my_elementor_init');

function my_elementor_init()
{
    Elementor_Widgets::get_instance();
}
