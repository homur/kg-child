<?php

namespace Elementor;

class Browse_All_Sidebar extends Widget_Base
{
  public function get_name()
  {
    return 'Browse_All_Sidebar';
  }

  public function get_title()
  {
    return __('Browse All Sidebar', 'plugin-name');
  }

  public function get_icon()
  {
    return 'fa fa-plug';
  }

  public function get_categories()
  {
    return ['kg-widgets'];
  }

  /**
   * Register oEmbed widget controls.
   *
   * Adds different input fields to allow the user to change and customize the widget settings.
   *
   * @since 1.0.0
   * @access protected
   */
  protected function _register_controls()
  {

    $this->start_controls_section(
      'section_timeline_list_items',
      array(
        'label'         => __('Items', "plugin-name"),
      )
    );

    $repeater = new Repeater();

    $repeater->add_control(
      'list_item_title',
      [
        'label'         => __('Title', "plugin-name"),
        'type'          => Controls_Manager::TEXT,
        'default'       => __('Title', "plugin-name"),
      ]
    );

    $repeater->add_control(
      'list_item_link',
      [
        'label'         => __('Link', "plugin-name"),
        'type'          => Controls_Manager::URL,
        'default'       => __('#', "plugin-name"),
      ]
    );

    $repeater->add_control(
      'is_sub_item',
      [
        'label' => __('Is sub item', 'plugin-name'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__('Yes', 'your-plugin'),
        'label_off' => esc_html__('No', 'your-plugin'),
        // 'return_value' => 'No',
        'default' => 'No',
      ]
    );

    $this->add_control(
      'list_items',
      [
        'label'         => __('List Items', "plugin-name"),
        'type'          => Controls_Manager::REPEATER,
        'fields'        => $repeater->get_controls(),
        'render_type'   => 'template',
        // 'default'       => [
        // 	[
        // 		'list_item_title'      => 'List One',
        // 	],
        // 	[
        // 		'list_item_title'      => 'List Two',
        // 		'list_item_icon_bg_color'         => '#32DDD4',
        // 		'list_item_icon'       => [
        // 			'value'     => 'fas fa-laugh',
        // 			'library'   => 'fa-solid',
        // 		],
        // 	],
        // 	[
        // 		'list_item_title'      => 'List Three',
        // 		'list_item_icon_bg_color'         => '#DB87F7',
        // 		'list_item_icon'       => [
        // 			'value'     => 'fas fa-paw',
        // 			'library'   => 'fa-solid',
        // 		],
        // 	],
        // 	[
        // 		'list_item_title'      => 'List Four',
        // 		'list_item_icon_bg_color'         => '#A8ADFF',
        // 		'list_item_icon'       => [
        // 			'value'     => 'fas fa-magnet',
        // 			'library'   => 'fa-solid',
        // 		],
        // 	],
        // ],
        'title_field'   => '{{{ list_item_title }}}'
      ]
    );

    $this->end_controls_section();
  }

  /**
   * Render oEmbed widget output on the frontend.
   *
   * Written in PHP and used to generate the final HTML.
   *
   * @since 1.0.0
   * @access protected
   */
  protected function render()
  {

    $settings = $this->get_settings_for_display();

    $title = $settings['title'];
    $box_image_url = $settings['box_image_url'];
    $title_color = $settings['title_color'];
    $material_icons = $settings['material_icons'];
    $box_height = $settings['box_height'];
    $box_link = $settings['box_link'];
    $box_overlay = $settings['box_overlay'];
?>

    <div class="browse-all-sidebar-container" id="fixed">
      <h2 class="browse-all-sidebar-title">By Material</h2>

      <nav class="list-group" id="list-example">
        <ul class="sub collapse show" id="menuSpy">
          <?php $count = 0;
          foreach ($settings['list_items'] as $items => $item) {
            $icon = $item['list_item_icon']['value'];
            $title = $item['list_item_title'];
            $list_item_link = $item['list_item_link'];
            // $content = $item['list_item_content'];
            $is_sub_item = $item['is_sub_item'];
          ?>
            <a class="list-group-item list-group-item-action <?php if ($is_sub_item == "yes") {echo "browse-all-sidebar-list-sub-item";} ?> <?php if ($count == 1) {echo "active";} ?>" href="<?php echo $list_item_link['url']; ?>"><?php echo $title; ?></a>

          <?php $count = $count + 1;
          } ?>
        </ul>
      </nav>
    </div>
    <script>
      $(document).ready(function() {
        $('body').scrollspy({
          target: '#list-example',
          spy: "scroll",
          offset: 50,
        });
      })
    </script>
<?php
  }
}
