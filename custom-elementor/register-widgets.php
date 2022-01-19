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
        require_once('widgets/kg_table.php');
        require_once('widgets/post-grid.php');
        require_once('widgets/accordion.php');
        require_once('widgets/call_outs.php');
        require_once('widgets/box_sector.php');
        require_once('widgets/grades_list.php');
        require_once('widgets/section_title.php');
        require_once('widgets/curved_button.php');
        require_once('widgets/home_page_title.php');
        require_once('widgets/post_navigators.php');
        require_once('widgets/home_what_we_can.php');
        require_once('widgets/full_width_button.php');
        require_once('widgets/natural_page_title.php');
        require_once('widgets/browse_all_sidebar.php');
        require_once('widgets/detailed_page_title.php');
        add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets']);
    }

    public function register_widgets()
    {
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\Kg_Table());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\Call_Outs());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\Accordion());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\Box_sector());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\Grades_List());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\Section_Title());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\Curved_Button());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\Home_Page_Title());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\Post_Navigators());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\Home_What_We_Can());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\Full_Width_Button());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\Natural_Page_Title());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\Browse_All_Sidebar());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\Detailed_Page_Title());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\Cstm_Post_Grid_Widget());

    }

}

add_action('init', 'my_elementor_init');

function my_elementor_init()
{
    Elementor_Widgets::get_instance();
}
