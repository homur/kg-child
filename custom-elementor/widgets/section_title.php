<?php

namespace Elementor;

class Section_Title extends Widget_Base
{
	public function get_name()
	{
		return 'Section Title';
	}

	public function get_title()
	{
		return __('Section Title', 'plugin-name');
	}

	public function get_icon()
	{
		return 'fa fa-font';
	}

	public function get_categories()
	{
		return ['kg-widgets'];
	}

	// public function __construct( $data = [], $args = null ) {
	// 	parent::__construct( $data, $args );

	// 	wp_register_style('section-heading-styles', get_stylesheet_directory_uri() . '/src/sass/theme/custom-widgets/section-heading-styles.scss', __FILE__, [], '1.0.0');
	// 	// wp_register_style('section-heading-styles', get_template_directory_uri() . '/src/sass/theme/custom/widgets/section-heading-styles.css', __FILE__ , [], '1.1' );
	// }

	// public function get_style_depends()
	// {
	// 	$styles = ['section-heading-styles'];

	// 	return $styles;
	// }

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
				'default' => __('Section Title', 'plugin-domain'),
				'placeholder' => __('Section Title', 'plugin-name'),
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __('Title Color', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'COLOR',
				'default' => __('#262D36', 'plugin-domain'),
				'placeholder' => __('#262D36', 'plugin-name'),
			]
		);

		$this->add_control(
			'divider_color',
			[
				'label' => __('Devider Color', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'COLOR',
				'default' => __('#EFF1F5', 'plugin-domain'),
				// old default color: #69BFF0
				'placeholder' => __('#EFF1F5', 'plugin-name'),
			]
		);

		$this->add_control(
			'hide_divider',
			[
				'label' => __('hide_divider', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'your-plugin'),
				'label_off' => esc_html__('Hide', 'your-plugin'),
				// 'return_value' => 'No',
				'default' => 'No',
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

		$title = $settings["title"];
		$divider_color = $settings["divider_color"];
		$title_color = $settings["title_color"];
		$hide_divider = $settings['hide_divider'];

		echo '<div class="cfuild-ontainer">';
		if ($hide_divider == "No") {
		echo '	<svg width="120" height="3" viewBox="0 0 120 3" fill="none" xmlns="http://www.w3.org/2000/svg">';
		echo '		<rect class="section-heading-icon" width="120" height="2.05128" fill=' . $divider_color . ' />';
		echo '	</svg>';
		}
		echo '	<h2 class="custom-section-heading" style="color: ' . $title_color . '; border-bottom: 2px solid '. $divider_color . '";">' . $title . '</h2>';
		echo '</div>';
	}
}
