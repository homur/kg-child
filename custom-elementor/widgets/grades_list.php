<?php

namespace Elementor;

class Grades_List extends Widget_Base
{
	public function get_name()
	{
		return 'Grades List';
	}

	public function get_title()
	{
		return __('Grades List', 'plugin-name');
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
			'list_title',
			[
				'label' => __('List Title', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Title', 'plugin-domain'),
				'placeholder' => __('Title', 'plugin-name'),
			]
		);

		$this->add_control(
			'list_title_color',
			[
				'label' => __('List Title Color', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::COLOR,
				// 'input_type' => 'COLOR',
				'default' => __('#262D36', 'plugin-domain'),
				'placeholder' => __('#69BFF0', 'plugin-name'),
			]
		);

		$posts_args = array(
			'post_type' => 'materials',
			'post_style' => 'all_types',
			'post_status' => 'publish',
			'numberposts' => -1,
		);
		$posts = get_posts($posts_args);
		$post_list = [];
		$GLOBALS['posts_urls'] = [];
		$posts_test_urls = [];

		foreach ($posts as $post) {
			$post_list[$post->ID] = $post->post_title;			
			$terms = wp_get_post_terms( $post->ID, 'types', array( 'fields' => 'names' ) );
			$posts_test_urls[$post->ID] = ["post" => $post, "types" => $terms];
		}
		$GLOBALS['posts_urls'] = $posts_test_urls;

		$this->add_control(
			'list_items',
			[
				'label' => __('List Items', 'plugin-domain'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => $post_list,/* [
					'title'  => 'Title',
					'title2'	=> 'title 2',
				], */
				// 'default' => ['title', 'description'],
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

		$list_title = $settings["list_title"];
		$list_items = $settings['list_items'];
		$list_title_color = $settings["list_title_color"];
		global $posts_urls;
		$site_url = get_option('siteurl');

		echo '	<div class="grades-list-container">';
		echo '		<div class="grades-list-title" style="color: ' . $list_title_color . '">' . $list_title . '</div>';
		foreach ($list_items as $list_item_id) {
			$current_post = $posts_urls[$list_item_id]['post'];
			$current_types = $posts_urls[$list_item_id]['types'];
			$is_wire = in_array("Wire", $current_types) ? "1" : "0";
			$is_strip = in_array("Strip", $current_types) ? "1" : "0";
			// foreach ($posts_urls as $post_url) {
			// var_dump($post_url);
			echo '	<div class="grades-list-item" data-wire="'. $is_wire .'" data-strip="'. $is_strip .'">';
			echo '		<a href="' . $site_url . '/materials/' . $current_post->post_name . '">' . $current_post->post_title . ' </a>';
			echo '		<div class="grades-list-item-icons">';
			if ( $is_strip ) {
				echo '			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">';
				echo '				<circle cx="12" cy="12" r="10" fill="#085FA9"/>';
				echo '				<path d="M14.225 10.2358C14.159 10.1624 14.0197 10.0671 13.807 9.94977C13.5943 9.8251 13.3377 9.7151 13.037 9.61977C12.7437 9.5171 12.4393 9.46577 12.124 9.46577C11.2953 9.46577 10.881 9.7591 10.881 10.3458C10.881 10.5584 10.947 10.7271 11.079 10.8518C11.211 10.9764 11.409 11.0828 11.673 11.1708C11.937 11.2588 12.267 11.3541 12.663 11.4568C13.1763 11.5888 13.62 11.7428 13.994 11.9188C14.3753 12.0948 14.665 12.3294 14.863 12.6228C15.0683 12.9088 15.171 13.2901 15.171 13.7668C15.171 14.3241 15.0353 14.7751 14.764 15.1198C14.5 15.4571 14.148 15.7028 13.708 15.8568C13.268 16.0108 12.7913 16.0878 12.278 16.0878C11.6913 16.0878 11.1083 15.9998 10.529 15.8238C9.957 15.6404 9.44733 15.3911 9 15.0758L9.671 13.7668C9.737 13.8328 9.85433 13.9208 10.023 14.0308C10.1917 14.1334 10.397 14.2398 10.639 14.3498C10.881 14.4524 11.145 14.5404 11.431 14.6138C11.717 14.6871 12.0067 14.7238 12.3 14.7238C13.136 14.7238 13.554 14.4561 13.554 13.9208C13.554 13.6934 13.4697 13.5101 13.301 13.3708C13.1323 13.2314 12.894 13.1141 12.586 13.0188C12.2853 12.9234 11.9333 12.8171 11.53 12.6998C11.0313 12.5604 10.617 12.4064 10.287 12.2378C9.96433 12.0618 9.72233 11.8454 9.561 11.5888C9.39967 11.3248 9.319 10.9911 9.319 10.5878C9.319 10.0524 9.44367 9.6051 9.693 9.24577C9.94967 8.8791 10.2943 8.6041 10.727 8.42077C11.1597 8.2301 11.64 8.13477 12.168 8.13477C12.7107 8.13477 13.2167 8.22277 13.686 8.39877C14.1553 8.57477 14.5587 8.77643 14.896 9.00377L14.225 10.2358Z" fill="white"/>';
				echo '			</svg>';
			}
			if ( $is_wire ) {
				echo '			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">';
				echo '				<circle cx="12" cy="12" r="10" fill="#576D80"/>';
				echo '				<path d="M17.957 8.18994L15.537 15.9999H13.986L12.006 10.6319L10.07 15.9999H8.52999L6.10999 8.18994H7.77099L9.43199 13.7559L11.258 8.18994H12.765L14.646 13.7559L16.285 8.18994H17.957Z" fill="white"/>';
				echo '			</svg>';
			}
			echo '		</div>';
			echo '	</div>';
			// }
		}
		echo '	</div>';
	}
}

	