<?php

namespace Elementor;

class Full_Width_Button extends Widget_Base
{
	public function get_name()
	{
		return 'Full_Width_Button';
	}

	public function get_title()
	{
		return __('Full width button', 'plugin-name');
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
				'default' => __('Button', 'plugin-domain'),
				'placeholder' => __('Button', 'plugin-name'),
			]
		);

		$this->add_control(
			'button_color',
			[
				'label' => __('Button Color', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'COLOR',
				'default' => __('#99B9CB', 'plugin-domain'),
				'placeholder' => __('#99B9CB', 'plugin-name'),
			]
		);

		// $this->add_control(
		// 	'button_hover_color',
		// 	[
		// 		'label' => __('Button hover Color', 'plugin-name'),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'input_type' => 'COLOR',
		// 		'default' => __('#99B9CB', 'plugin-domain'),
		// 		'placeholder' => __('#99B9CB', 'plugin-name'),
		// 	]
		// );

		$this->add_control(
			'button_text_color',
			[
				'label' => __('Button Text Color', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'COLOR',
				'default' => __('#ffffff', 'plugin-domain'),
				'placeholder' => __('#ffffff', 'plugin-name'),
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

		$button_text = $settings["button_text"];
		$button_color = $settings["button_color"];
		$button_text_color = $settings["button_text_color"];
		// $button_hover_color = $settings["button_hover_color"];
		// $final_text_color;

		// if ($button_text_color == "#ffffff") :
		// 	$final_text_color = $button_text_color;
		// else :
		// 	$final_text_color = "#fff";
	  // endif;

		// echo $final_text_color;

		echo '<a href="#" class="btn btn-primary btn-block full-width-button" role="button" aria-pressed="true" style="background-color: '. $button_color .'">';
		echo '	<div class="full-width-button-content">';
		echo '		<p class="full-width-button-title" style="color:'. $button_text_color .'">' . $button_text . '</p>';
		echo '		<svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">';
		echo '			<path';
		echo '				class="full-width-button-icon-path"';
		echo '				d="M13 -6.11959e-07L11.59 1.41L16.17 6L6.99382e-07 6L5.24537e-07 8L16.17 8L11.58 12.59L13 14L20 7L13 -6.11959e-07Z" fill="' . $button_text_color . '" />';
		echo '		</svg>';
		echo '	</div>';
		echo '</a>';

		echo '
			<style>
				.full-width-button {
					border-radius: 0;
					padding: 30px;
					border: 0;
				}
				.full-width-button:hover {
					background-color: inherit
				}
				.full-width-button-content {
					display: -webkit-box;
					display: -ms-flexbox;
					display: flex;
					align-items: center;
					-webkit-box-pack: justify;
							-ms-flex-pack: justify;
									justify-content: space-between;
				}
				.full-width-button-title {
					margin-bottom: 0;
					font-size: 22px;
					font-weight: 700;
					line-height: 26px;
				}
			</style>
		';
	}
}
