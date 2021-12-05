<?php

namespace Elementor;

class Home_What_We_Can extends Widget_Base {
	public function get_name() {
		return 'Home_What_We_Can';
	}

	public function get_title() {
		return __( 'Home What We Can', 'plugin-name' );
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
				'default' => 'What we can do for you',
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

		echo '<div class="container what-we-can">';
		echo '	<div class="inner-container">';
		echo '		<h3 class="what-we-can-heading">'. $title .'</h3>';
		echo '		<div class="fuild-container">';
		echo '			<div class="row">';
		echo '				<div class="col-sm-12 col-md-6">';
		echo '					<div class="card card-container">';
		echo '						<div class="card-body">';
		echo '							<div class="card-title-container">';
		echo '								<a href="#">';
		echo '								<h5 class="card-title">Bespoke processing</h5>';
		echo '								<svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">';
		echo '									<path d="M13 -6.11959e-07L11.59 1.41L16.17 6L6.99382e-07 6L5.24537e-07 8L16.17 8L11.58 12.59L13 14L20 7L13 -6.11959e-07Z" fill="#69BFF0"/>';
		echo '								</svg>';
		echo '								</a>';
		echo '							</div>';
		echo '							<p class="card-text">';
		echo '								With impressive Precision Strip And Wire processing capabilities that include slitting and shearing, traverse winding,';
		echo '								cut to length and edge dressing, you can have your material, your way.';
		echo '							</p>';
		echo '						</div>';
		echo '					</div>';
		echo '				</div>';
		echo '				<div class="col-sm-12 col-md-6">';
		echo '					<div class="card card-container">';
		echo '						<div class="card-body">';
		echo '							<div class="card-title-container">';
		echo '								<a href="#">';
		echo '								<h5 class="card-title">Bespoke processing</h5>';
		echo '								<svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">';
		echo '									<path d="M13 -6.11959e-07L11.59 1.41L16.17 6L6.99382e-07 6L5.24537e-07 8L16.17 8L11.58 12.59L13 14L20 7L13 -6.11959e-07Z" fill="#69BFF0" />';
		echo '								</svg>';
		echo '								</a>';
		echo '							</div>';
		echo '							<p class="card-text">';
		echo '								With impressive Precision Strip And Wire processing capabilities that include slitting and shearing, traverse winding,';
		echo '								cut to length and edge dressing, you can have your material, your way.';
		echo '							</p>';
		echo '						</div>';
		echo '					</div>';
		echo '				</div>';
		echo '				<dev class="space-divider"></dev>';
		echo '				<div class="col-sm-12 col-md-6">';
		echo '					<div class="card card-container">';
		echo '						<div class="card-body">';
		echo '							<div class="card-title-container">';
		echo '								<a href="#">';
		echo '									<h5 class="card-title">';
		echo '										Bespoke processing';
		echo '									</h5>';
		echo '									<svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">';
		echo '										<path d="M13 -6.11959e-07L11.59 1.41L16.17 6L6.99382e-07 6L5.24537e-07 8L16.17 8L11.58 12.59L13 14L20 7L13 -6.11959e-07Z" fill="#69BFF0"/>';
		echo '									</svg>';
		echo '								</div>';
		echo '							</a>';
		echo '							<p class="card-text">';
		echo '								With impressive Precision Strip And Wire processing capabilities that include slitting and shearing, traverse winding,';
		echo '								cut to length and edge dressing, you can have your material, your way.';
		echo '							</p>';
		echo '						</div>';
		echo '					</div>';
		echo '				</div>';
		echo '				<div class="col-sm-12 col-md-6">';
		echo '					<div class="card card-container">';
		echo '						<div class="card-body">';
		echo '							<div class="card-title-container">';
		echo '								<a href="#">';
		echo '								<h5 class="card-title">Bespoke processing</h5>';
		echo '								<svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">';
		echo '									<path d="M13 -6.11959e-07L11.59 1.41L16.17 6L6.99382e-07 6L5.24537e-07 8L16.17 8L11.58 12.59L13 14L20 7L13 -6.11959e-07Z" fill="#69BFF0"/>';
		echo '								</svg>';
		echo '							</a>';
		echo '							</div>';
		echo '							<p class="card-text">';
		echo '								With impressive Precision Strip And Wire processing capabilities that include slitting and shearing, traverse winding,';
		echo '								cut to length and edge dressing, you can have your material, your way.';
		echo '							</p>';
		echo '						</div>';
		echo '					</div>';
		echo '				</div>';
		echo '			</div>';
		echo '		</div>';
		echo '	</div>';
		echo '</div>';

		echo '
		<style>
		.what-we-can {
			min-height: 346px;
			margin-top: 32px;
			position: relative;
		}
		
		.what-we-can::after {
			content: "";
			border: 2px solid #eff1f5;
			width: 100%;
			height: 100%;
			position: absolute;
			top: 32px;
			z-index: -1;
			left: 0;
		}
		
		.what-we-can-heading {
			background: #69bff0;
			line-height: 25px;
			font-size: 22px;
			font-weight: 700;
			padding: 20px;
			color: #fff;
			margin-top: -32px;
			width: -webkit-fit-content;
			width: -moz-fit-content;
			width: fit-content;
			max-width: 100%;
			margin-bottom: 30px;
		}
		
		.inner-container {
			min-width: 461px;
			margin-left: 17px;
			margin-right: 17px;
		}
		
		.card-container {
			min-width: 407px;
			border-radius: 0;
			background-color: #14314a;
		}
		
		.card-title-container > a {
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-pack: justify;
					-ms-flex-pack: justify;
							justify-content: space-between;
			-webkit-box-align: center;
					-ms-flex-align: center;
							align-items: center;
			text-decoration: none;
			border-radius: 0 !important;
			color: #69bff0;
		}
		
		.card-title-container > a:hover {
			color: inherit;
			text-decoration: none;
			border-radius: 0 !important;
		}
		
		.card-title-container > a > h5 {
			font-size: 22px;
			color: #69bff0;
			font-weight: 700;
			margin-bottom: 0px;
		}
		
		p.card-text {
			margin-top: 20px;
			font-size: 18px;
			color: #d6d8df;
			font-weight: 600;
		}
		
		.space-divider {
			width: 100%;
			height: 30px;
		}
		
		.card-title > a {
			padding: 15px 20px;
			font-size: 22px;
			font-weight: 700;
			line-height: 26px;
			text-decoration: none;
			border-radius: 0 !important;
		}
		/*# sourceMappingURL=styles.css.map */
		</style>';
	}
}
