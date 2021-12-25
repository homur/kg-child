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
      'list_item_display_icon',
      [
        'label'         => __('Icon', "plugin-name"),
        'type'          => Controls_Manager::CHOOSE,
        'options'       => [
          'none'  => [
            'title' => __('None', "plugin-name"),
            'icon'  => 'fa fa-ban',
          ],
          // 'icon'  => [
          // 	'title' => __('Icon', "plugin-name"),
          // 	'icon'  => 'fa fa-info-circle',
          // ],
          'image'  => [
            'title' => __('Image', "plugin-name"),
            'icon'  => 'fas fa-image',
          ],
        ],
        'default'       => 'image',
      ]
    );

    $repeater->add_control(
      'list_item_image',
      [
        'type'          => Controls_Manager::MEDIA,
        'default'       => [
          'url'       => Utils::get_placeholder_image_src(),
        ],
        'condition'     => [
          'list_item_display_icon'   => 'image',
        ],
      ]
    );

    $repeater->add_control(
      'list_item_icon',
      [
        'type'          => Controls_Manager::ICONS,
        'default'       => [
          'value'     => 'fas fa-leaf',
          'library'   => 'fa-solid',
        ],
        'condition'     => [
          'list_item_display_icon'   => 'icon',
        ],
      ]
    );

    $repeater->add_control(
      'list_item_icon_color',
      [
        'label'         => __('Icon Color', "plugin-name"),
        'type'          => Controls_Manager::COLOR,
        'default'       => '#ffffff',
        'condition'     => [
          'list_item_display_icon'   => 'icon',
        ],
      ]
    );

    $repeater->add_control(
      'list_item_icon_bg_color',
      [
        'label'         => __('Icon Background Color', "plugin-name"),
        'type'          => Controls_Manager::COLOR,
        'default'       => '#ff8181',
        'condition'     => [
          'list_item_display_icon'   => 'icon',
        ],
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

    <!-- <div id="sticky-sidebar"> -->
      <div class="browse-all-sidebar-container ">
        <?php $count = 0;
        foreach ($settings['list_items'] as $items => $item) {
          $icon = $item['list_item_icon']['value'];
          $title = $item['list_item_title'];
          $list_item_link = $item['list_item_link'];
          // $content = $item['list_item_content'];
          $icon_color = $item['list_item_icon_color'];
          $icon_bg_color = $item['list_item_icon_bg_color'];
        ?>

          <div class="call-outs-list-item">
            <?php if ($item['list_item_display_icon'] === 'image') { ?>
              <img src="<?php echo $item['list_item_image']['url']; ?>" class="call-outs-list-item-image" />
            <?php } ?>
            <div class="call-outs-list-item-content-box">
              <?php
              if ($list_item_link['url'] == null) {
              ?>
                <h2 class="call-outs-list-item-title"><?php echo $title; ?></h2>
              <?php
              } else {
              ?>
                <a href=<?php echo $list_item_link['url']; ?> class="call-outs-list-item-link">
                  <h2 class="call-outs-list-item-title"><?php echo $title; ?></h2>
                </a>

              <?php } ?>
            </div>
          </div>
        <?php $count = $count + 1;
        } ?>
      </div>
    <!-- </div> -->
<?php
  }
}
