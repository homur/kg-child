<?php

namespace Elementor;

class Curved_Button extends Widget_Base
{
	public function get_name()
	{
		return 'Curved Button';
	}

	public function get_title()
	{
		return __('Curved Button', 'plugin-name');
	}

	public function get_icon()
	{
		return 'fa fa-plug';
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
			'button_text',
			[
				'label' => __('Button Text', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Title', 'plugin-domain'),
				'placeholder' => __('Title', 'plugin-name'),
			]
		);

		$this->add_control(
			'button_width',
			[
				'label' => __('Button Width', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('75px', 'plugin-domain'),
				'placeholder' => __('title width', 'plugin-name'),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => __('Button Text Color', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'COLOR',
				'default' => __('#262D36', 'plugin-domain'),
				'placeholder' => __('#262D36', 'plugin-name'),
			]
		);

		$this->add_control(
			'button_color',
			[
				'label' => __('Button Color', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'COLOR',
				'default' => __('#69BFF0', 'plugin-domain'),
				'placeholder' => __('#69BFF0', 'plugin-name'),
			]
		);

		$this->end_controls_section();
	}
// TODO: add link for button
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

		$button_text = $settings["button_text"];
		$button_color = $settings["button_color"];
		$button_width = $settings["button_width"];
		$button_text_color = $settings["button_text_color"];
		$is_active = $settings["button_text"] == 'All' ? 'active' : '';

		echo '<div class="carved-button-container" style="width: ' . $button_width . '">';
		echo '	<a href="#" class="btn btn-primary btn-block carved-button strip-wire-filter '.$is_active.'" style="background-color: ' . $button_color . '" role="button" aria-pressed="true">';
		echo '		<div class="carved-button-content">';
		echo '			<p class="carved-button-title" style="color:' . $button_text_color . '">' . $button_text . '</p>';
		echo '		</div>';
		echo '	</a>';
		echo '</div>';
	}
}
