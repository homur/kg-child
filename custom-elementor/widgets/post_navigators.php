<?php

namespace Elementor;

class Post_Navigators extends Widget_Base
{
	public function get_name()
	{
		return 'Post_Navigators';
	}

	public function get_title()
	{
		return __('Post Navigators', 'plugin-name');
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
				'label' => __('View all Button Text', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Button', 'plugin-domain'),
				'placeholder' => __('Button', 'plugin-name'),
			]
		);

		$this->add_control(
			'button_url',
			[
				'label' => __('View all Button Url', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => __('Button', 'plugin-domain'),
				'placeholder' => __('Button', 'plugin-name'),
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
		$button_url = $settings["button_url"]['url'];

?>
		<div class="container single-post-navigator-container">
			<div class="single-post-navigator">
				<div class="single-post-navigator-previous-btn">
					<?php
					previous_post_link('<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M24.667 13.9997C24.667 19.8797 19.8803 24.6663 14.0003 24.6663C8.12033 24.6663 3.33366 19.8797 3.33366 13.9997C3.33366 8.11967 8.12033 3.33301 14.0003 3.33301C19.8803 3.33301 24.667 8.11967 24.667 13.9997ZM27.3337 13.9997C27.3337 6.63967 21.3603 0.66634 14.0003 0.66634C6.64033 0.66634 0.666992 6.63967 0.666992 13.9997C0.666992 21.3597 6.64033 27.333 14.0003 27.333C21.3603 27.333 27.3337 21.3597 27.3337 13.9997ZM14.0003 15.333H19.3337V12.6663H14.0003V8.66634L8.66699 13.9997L14.0003 19.333V15.333Z" fill="#69BFF0"/>
				</svg> %link', 'Previous post', 'yes');
					?>
				</div>
				<div class="single-post-navigator-all-posts">
					<a href="<?php echo $button_url; ?>"><?php echo $button_text; ?></a>
				</div>
				<div class="single-post-navigator-next-btn">
					<?php
					next_post_link('%link <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M3.33301 14.0003C3.33301 8.12032 8.11968 3.33366 13.9997 3.33366C19.8797 3.33366 24.6663 8.12032 24.6663 14.0003C24.6663 19.8803 19.8797 24.667 13.9997 24.667C8.11968 24.667 3.33301 19.8803 3.33301 14.0003ZM0.666343 14.0003C0.666343 21.3603 6.63967 27.3337 13.9997 27.3337C21.3597 27.3337 27.333 21.3603 27.333 14.0003C27.333 6.64033 21.3597 0.666992 13.9997 0.666992C6.63968 0.666991 0.666343 6.64032 0.666343 14.0003ZM13.9997 12.667L8.66634 12.667L8.66634 15.3337L13.9997 15.3337L13.9997 19.3337L19.333 14.0003L13.9997 8.66699L13.9997 12.667Z" fill="#69BFF0"/>
				</svg>', 'Next post', 'yes');
					?>
				</div>
			</div>
		</div>
<?php
	}
}
