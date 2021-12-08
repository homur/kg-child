<?php

namespace Elementor;

class Home_Page_Title extends Widget_Base {
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
	public function get_name() {
		return 'Home_Page_Title';
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
	public function get_title() {
		return __( 'Home Page Title', 'plugin-name' );
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
	public function get_icon() {
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
				'label' => __( 'Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Premium Quality Precision Strip and Wire',
				'placeholder' => __( 'Enter title here', 'plugin-name' ),
			]
		);
		
				$this->add_control(
			'video_url',
			[
				'label' => __('video url', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('https://wordpress-497576-2250197.cloudwaysapps.com/wp-content/uploads/2021/11/1056399188-preview.mp4', 'plugin-domain'),
				'placeholder' => __('Path to your video', 'plugin-name'),
			]
		);

		$this->add_control(
			'stripBtnUrl',
			[
				'label' => __('strip button Url', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('#', 'plugin-domain'),
				'placeholder' => __('Enter link here', 'plugin-name'),
			]
		);

		$this->add_control(
			'wireBtnUrl',
			[
				'label' => __('wire button Url', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('#', 'plugin-domain'),
				'placeholder' => __('Enter link here', 'plugin-name'),
			]
		);

		$this->add_control(
			'wireBtnUrl',
			[
				'label' => __('wire button Url', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('#', 'plugin-domain'),
				'placeholder' => __('Enter link here', 'plugin-name'),
			]
		);

		$this->add_control(
			'getQuoteBtnUrl',
			[
				'label' => __('Get a Quote button Url', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('#', 'plugin-domain'),
				'placeholder' => __('Enter link here', 'plugin-name'),
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
		$videoUrl = $settings['video_url'];
		$wireBtnUrl = $settings['wire_url'];
		$stripBtnUrl = $settings['strip_url'];
		$getQuoteBtnUrl = $settings['getQuoteBtnUrl'];

		echo '<style>
		.page-title-hero {
  position: relative;
}
.page-title-video {
  width: 100%;
  height: 861px;
  object-fit: fill;
}
.page-title-content-container {
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  color: #f1f1f1;
  width: 100%;
  padding: 20px;
  display: flex;
  align-items: center;
  z-index: 1;
  position: absolute;
  height: 100%;
}
.page-title-video-container {
  max-width: 100%;
  max-height: 861px;
}
.page-title-video-container:after {
    width: 100%;
    content: "";
    position: absolute;
    height: 100%;
    max-height: 861px;
    left: 0;
    top: 0;
    background: rgba(18, 21, 24, 0.4);
  }
.page-title-content-inner-container {
  width: 100%;
  margin: 0 auto;
  max-width: 991px;
}
.page-title-heading {
  font-size: 72px;
  font-weight: 900;
  line-height: 85px;
  margin-bottom: 80px;
  font-feature-settings: "pnum" on, "lnum" on, "ordn" on, "ss01" on, "ss04" on, "ss06" on, "ss11" on, "ss09" on, "liga" off;
}
.post-card-title {
  font-size: 22px;
  color: #69BFF0;
  font-weight: 700;
  margin-bottom: 0px;
}
</style>';
		echo '<div class="page-title-hero">';
		echo '<div class="page-title-video-container">';
		echo '	<video autoplay muted loop id="video" class="page-title-video">';
		echo '		<source src= '.$videoUrl.'	type="video/mp4"/>';
		echo '		Your browser does not support HTML5 video.';
		echo '	</video>';
		echo '	<div class="page-title-content-container">';
		echo '		<div class="page-title-content-inner-container">';
		echo ' 			<h3 class="page-title-heading">'. $title .'</h3>';
		echo ' 			<div class="page-title-buttons">';
		echo ' 				<!-- TODO: get a quote button will go here -->';
		echo '				<div class="button-container get-quote-btn-container">';
		echo '					<a href="'. $getQuoteBtnUrl .'" class="btn btn-primary button" role="button" aria-pressed="true"><p>Get a quote</p></a>';
		echo '				</div>';
		echo ' 				<div class="buttons-container">';
		echo ' 					<a class="trans-button" href=' . $stripBtnUrl . '>';
		echo ' 						<p>Strip</p>';
		echo ' 						<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">';
		echo ' 							<path d="M3.33301 13.9998C3.33301 8.11984 8.11968 3.33317 13.9997 3.33317C19.8797 3.33317 24.6663 8.11984 24.6663 13.9998C24.6663 19.8798 19.8797 24.6665 13.9997 24.6665C8.11968 24.6665 3.33301 19.8798 3.33301 13.9998ZM0.666343 13.9998C0.666343 21.3598 6.63967 27.3332 13.9997 27.3332C21.3597 27.3332 27.333 21.3598 27.333 13.9998C27.333 6.63984 21.3597 0.666504 13.9997 0.666503C6.63968 0.666503 0.666343 6.63984 0.666343 13.9998ZM13.9997 12.6665L8.66634 12.6665L8.66634 15.3332L13.9997 15.3332L13.9997 19.3332L19.333 13.9998L13.9997 8.6665L13.9997 12.6665Z" fill="white"/>';
			echo ' 					</svg>';
			echo ' 				</a>';
			echo ' 			</div>';
			echo ' 			<div class="buttons-container">';
			echo ' 				<a class="trans-button" href=' . $wireBtnUrl . ' >';
			echo ' 					<p>Wire</p>';
			echo ' 					<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">';
			echo ' 						<path d="M3.33301 13.9998C3.33301 8.11984 8.11968 3.33317 13.9997 3.33317C19.8797 3.33317 24.6663 8.11984 24.6663 13.9998C24.6663 19.8798 19.8797 24.6665 13.9997 24.6665C8.11968 24.6665 3.33301 19.8798 3.33301 13.9998ZM0.666343 13.9998C0.666343 21.3598 6.63967 27.3332 13.9997 27.3332C21.3597 27.3332 27.333 21.3598 27.333 13.9998C27.333 6.63984 21.3597 0.666504 13.9997 0.666503C6.63968 0.666503 0.666343 6.63984 0.666343 13.9998ZM13.9997 12.6665L8.66634 12.6665L8.66634 15.3332L13.9997 15.3332L13.9997 19.3332L19.333 13.9998L13.9997 8.6665L13.9997 12.6665Z" fill="white"/>';
				echo ' 				</svg>';
				echo ' 			</a>';
				echo ' 		</div>';
				echo ' 	</div>';
			echo ' 	</div>';
		echo ' 	</div>';
		echo ' </div>';
	echo ' </div>';

	}
}
