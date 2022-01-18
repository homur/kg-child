<?php

namespace Elementor;

class Tabs extends Widget_Base
{
	public function get_name()
	{
		return 'Tabs';
	}

	public function get_title()
	{
		return __('Tabs', 'plugin-name');
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
			'content_section',
			[
				'label' => __('Content', 'plugin-name'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __('Title', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Title',
				'placeholder' => __('Enter title here', 'plugin-name'),
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label' => __('Sub Title', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Sub title',
				'placeholder' => __('Enter title here', 'plugin-name'),
			]
		);

		$this->add_control(
			'page_title_bg_url',
			[
				'label' => __('Background url', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default'       => [
					'url'       => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'is_help_page',
			[
				'label' => __('Show help buttons', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'your-plugin'),
				'label_off' => esc_html__('Hide', 'your-plugin'),
				// 'return_value' => 'No',
				'default' => 'No',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_timeline_list_items',
			array(
				'label'         => __('Buttons', "plugin-name"),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'list_item_title',
			[
				'label'         => __('Text', "plugin-name"),
				'type'          => Controls_Manager::TEXT,
				'default'       => __('Button', "plugin-name"),
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
			'list_item_icon',
			[
				'label'         => __('Link', "plugin-name"),
				'type'          => Controls_Manager::MEDIA,
				'default'       => [
					'url'       => 'http://wordpress-497576-2250197.cloudwaysapps.local/wp-content/uploads/2021/12/go-to.png',
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
				'default'       => [
					[
						'list_item_title'      => 'FAQs',
						'list_item_link' => '#',
					],
					[
						'list_item_title'      => 'T&Cs',
						'list_item_link' => '#',
					],
					[
						'list_item_title'      => 'Values',
						'list_item_link' => '#',
					],
					[
						'list_item_title'      => 'Meet the team',
						'list_item_link' => '#',
					],
					[
						'list_item_title'      => 'Our mission',
						'list_item_link' => '#',
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

		$title = $settings['title'];
		$sub_title = $settings['sub_title'];
		$page_title_bg_url = $settings['page_title_bg_url'];
		$is_help_page = $settings['is_help_page'];

		echo '<div class="natural-page-title" style="background-image: url(' . $page_title_bg_url['url'] . ');">';
		echo '	<div class="container natural-page-title-container"> ';
		echo '		<div class="natural-page-title-texts-container">';
		echo '			<h2 class="natural-page-title-text">' . $title . '</h2>';
		if ($is_help_page == "yes") {
			echo ' <div class="help-buttons-container">';
			echo '<p class="help-buttons-title">Help</p>';
			$count = 0;
			foreach ($settings['list_items'] as $items => $item) {
				$title = $item['list_item_title'];
				$list_item_link = $item['list_item_link'];
				$list_item_icon = $item['list_item_icon']['url'];
?>
				<div class="help-buttons-list-item">
					<a class="help-buttons-item" href="<?php echo $list_item_link; ?>">
					<?php echo $title; ?>
					<img src="<?php echo $list_item_icon; ?>" alt="help button" class="help-buttons-list_item_icon"/>
					</a>
				</div>
<?php $count = $count + 1;
			}
			echo ' </div>';
		} else {
			echo '			<p class="natural-page-sub-title-text">' . $sub_title . '</p>';
		}
		echo '		</div>';
		echo '	</div>';
		echo '</div>';
	}
}
