<?php

namespace Elementor;

class Kg_Table extends Widget_Base
{
  /**
   * Get widget name.
   *
   * Retrieve oEmbed widget name.
   *
   * @since 1.0.0
   * @access public
   *
   * @return string Widget name.
   */
  public function get_name()
  {
    return 'Kg_Table';
  }

  /**
   * Get widget title.
   *
   * Retrieve oEmbed widget title.
   *
   * @since 1.0.0
   * @access public
   *
   * @return string Widget title.
   */
  public function get_title()
  {
    return __('Table', 'plugin-name');
  }

  /**
   * Get widget icon.
   *
   * Retrieve oEmbed widget icon.
   *
   * @since 1.0.0
   * @access public
   *
   * @return string Widget icon.
   */
  public function get_icon()
  {
    return 'fa fa-plug';
  }

  /**
   * Get widget categories.
   *
   * Retrieve the list of categories the oEmbed widget belongs to.
   *
   * @since 1.0.0
   * @access public
   *
   * @return array Widget categories.
   */
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
        'label'         => __('Table Items', "plugin-name"),
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
      'list_item_description',
      [
        'label'         => __('Description', "plugin-name"),
        'type'          => Controls_Manager::WYSIWYG,
        'default'       => __('Description', "plugin-name"),
      ]
    );

    $repeater->add_control(
      'title_color',
      [
        'label'         => __('Title color', "plugin-name"),
        'type'          => Controls_Manager::COLOR,
        'default'       => __('#262d36', "plugin-name"),
      ]
    );

    $repeater->add_control(
      'title_bg_color',
      [
        'label'         => __('Title Background color', "plugin-name"),
        'type'          => Controls_Manager::COLOR,
        'default'       => __('#69bff0', "plugin-name"),
      ]
    );

    $this->add_control(
      'list_items',
      [
        'label'         => __('List Items', "plugin-name"),
        'type'          => Controls_Manager::REPEATER,
        'fields'        => $repeater->get_controls(),
        'render_type'   => 'template',
        'default'       => [
          [
            'list_item_title'      => 'List One',
            'list_item_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis',
          ],
          [
            'list_item_title'      => 'List Two',
            'list_item_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis',
          ],
          [
            'list_item_title'      => 'List Three',
            'list_item_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis',
          ],
        ],
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

    $count = 0;
    $accordion_id = rand(100,100000);
?>
    <div class="accordion kg-accordion" id="accordion<?php echo $accordion_id ?>">
      <?php
      foreach ($settings['list_items'] as $items => $item) {
        $title = $item['list_item_title'];
        $list_item_description = $item['list_item_description'];
        $title_color = $item['title_color'];
        $title_bg_color = $item['title_bg_color'];
      ?>

        <!-- <div class="card"> -->
        <style>
          /* button.accordion-button {

          } */
          button.accordion-button<?php echo $accordion_id . $count + 1 ?>[aria-expanded="true"] {
            background-color: <?= $title_bg_color ?>;
          }
        </style>
        <div class="accordion-header" id="accordionheading<?php echo $accordion_id . $count + 1 ?>">
          <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left accordion-button accordion-button<?php echo $accordion_id . $count + 1 ?>" 
            style="color: <?php echo $title_color; ?>" 
            type="button" 
            data-toggle="collapse" 
            data-target="#collapse<?php echo $accordion_id . $count + 1 ?>" 
            aria-expanded="<?php echo $count == 0 ? 'true' : 'false' ?>" a
            ria-controls="collapse1">
              <?= $title ?>
              <div class="accordion-icons">
                <svg class="minus" width="20" height="4" viewBox="0 0 20 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M19.3337 3.33334H0.666992V0.666672H19.3337V3.33334Z" fill="white" />
                </svg>
                <svg class="plus" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M19.3337 11.3334H11.3337V19.3334H8.66699V11.3334H0.666992V8.66669H8.66699V0.666687H11.3337V8.66669H19.3337V11.3334Z" fill="#69BFF0" />
                </svg>
              </div>
            </button>
          </h2>
        </div>
        <div id="collapse<?php echo $accordion_id . $count + 1 ?>" 
        class="collapse <?php echo $count == 0 ? 'show' : '' ?>" 
        aria-labelledby="accordionheading<?php echo $accordion_id . $count + 1 ?>" 
        data-parent="#accordion<?php echo $accordion_id ?>">
          <div class="accordion-content">
            <?php
            echo $list_item_description;
            // esc_html__($list_item_description); 
            ?>
          </div>
        </div>

        <!-- </div> -->
      <?php $count = $count + 1;
      }
      // $accordion_id = $accordion_id + 1;
      ?>
    </div>
<?php
  }
}
