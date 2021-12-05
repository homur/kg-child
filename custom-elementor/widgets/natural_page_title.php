<?php

namespace Elementor;

class Natural_Page_Title extends Widget_Base {
	public function get_name() {
		return 'Natural_Page_Title';
	}

	public function get_title() {
		return __( 'Natural Page Title', 'plugin-name' );
	}

	public function get_icon() {
		return 'fa fa-plug';
	}

	public function get_categories() {
		return [ 'kg-widgets' ];
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Section Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Knight Group Blog',
				'placeholder' => __( 'Enter title here', 'plugin-name' ),
			]
		);
		
				$this->add_control(
			'page_title_video_url',
			[
				'label' => __('video url', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('https://wordpress-497576-2250197.cloudwaysapps.com/wp-content/uploads/2021/12/page-title.jpg', 'plugin-domain'),
				'placeholder' => __('Path to your video', 'plugin-name'),
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
	protected function render() {

		$settings = $this->get_settings_for_display();

		$title = $settings['title'];
		$page_title_video_url = $settings['page_title_video_url'];

		echo '<div class="natural-page-title" style="background-image: url('.$page_title_video_url.');"><div class="container"> ';
		echo '	<h2 class="natural-page-title-text">' . $title . '</h2>';
		echo '</div> </div>';

		echo '
		<style>
			.natural-page-title {
				display: -webkit-box;
				display: -ms-flexbox;
				display: flex;
				min-height: 300px;
				-webkit-box-align: center;
						-ms-flex-align: center;
								align-items: center;
				background-position: center 36%;
				background-size: cover;
			}
			.natural-page-title:after {
				top: 0;
				z-index: 0;
				content: "";
				width: 100%;
				height: 308px;
				position: absolute;
				background: rgba(18, 21, 24, 0.8);
			}
			.natural-page-title-text {
				z-index: 1;
				color: #ffffff;
				position: relative;
				font-size: 72px;
				font-weight: 900;
				line-height: 85px;
				margin: 140px 0 83px;
			}
		</style>';
	}
}
