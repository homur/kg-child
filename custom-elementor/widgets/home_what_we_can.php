<?php

namespace Elementor;

class Home_What_We_Can extends Widget_Base
{
	public function get_name()
	{
		return 'Home_What_We_Can';
	}

	public function get_title()
	{
		return __('What We Can', 'plugin-name');
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
				'label' => __('Main Title', 'plugin-name'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __('The Title', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'What we can do for you',
				'placeholder' => __('Enter title here', 'plugin-name'),
			]
		);

		$this->end_controls_section();

		// 1st section 

		$this->start_controls_section(
			'1st_section',
			[
				'label' => __('1st Section', 'plugin-name'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'1st_title',
			[
				'label' => __('Section Title', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Bespoke processing',
				'placeholder' => __('Enter title here', 'plugin-name'),
			]
		);

		$this->add_control(
			'1st_description',
			[
				'label' => __('Description', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __('With impressive Precision Strip And Wire processing capabilities that include slitting and shearing, traverse winding, cut to length and edge dressing, you can have your material, your way.', 'plugin-domain'),
				'placeholder' => __('Enter link here', 'plugin-name'),
			]
		);

		$this->add_control(
			'1st_link',
			[
				'label' => __('Section Link', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => __('#', 'plugin-domain'),
				'placeholder' => __('Enter link here', 'plugin-name'),
			]
		);

		$this->end_controls_section();

		// 2nd section 

		$this->start_controls_section(
			'2nd_section',
			[
				'label' => __('2nd Section', 'plugin-name'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'2nd_title',
			[
				'label' => __('Section Title', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Bespoke processing',
				'placeholder' => __('Enter title here', 'plugin-name'),
			]
		);

		$this->add_control(
			'2nd_description',
			[
				'label' => __('Description', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __('With impressive Precision Strip And Wire processing capabilities that include slitting and shearing, traverse winding, cut to length and edge dressing, you can have your material, your way.', 'plugin-domain'),
				'placeholder' => __('Enter link here', 'plugin-name'),
			]
		);

		$this->add_control(
			'2nd_link',
			[
				'label' => __('Section Link', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => __('#', 'plugin-domain'),
				'placeholder' => __('Enter link here', 'plugin-name'),
			]
		);

		$this->end_controls_section();

		// 3rd section 

		$this->start_controls_section(
			'3rd_section',
			[
				'label' => __('3rd Section', 'plugin-name'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'3rd_title',
			[
				'label' => __('Section Title', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Bespoke processing',
				'placeholder' => __('Enter title here', 'plugin-name'),
			]
		);

		$this->add_control(
			'3rd_description',
			[
				'label' => __('Description', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __('With impressive Precision Strip And Wire processing capabilities that include slitting and shearing, traverse winding, cut to length and edge dressing, you can have your material, your way.', 'plugin-domain'),
				'placeholder' => __('Enter link here', 'plugin-name'),
			]
		);

		$this->add_control(
			'3rd_link',
			[
				'label' => __('Section Link', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => __('#', 'plugin-domain'),
				'placeholder' => __('Enter link here', 'plugin-name'),
			]
		);

		$this->end_controls_section();

		// 4th section 

		$this->start_controls_section(
			'4th_section',
			[
				'label' => __('4th Section', 'plugin-name'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'4th_title',
			[
				'label' => __('Section Title', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Bespoke processing',
				'placeholder' => __('Enter title here', 'plugin-name'),
			]
		);

		$this->add_control(
			'4th_description',
			[
				'label' => __('Description', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __('With impressive Precision Strip And Wire processing capabilities that include slitting and shearing, traverse winding, cut to length and edge dressing, you can have your material, your way.', 'plugin-domain'),
				'placeholder' => __('Enter link here', 'plugin-name'),
			]
		);

		$this->add_control(
			'4th_link',
			[
				'label' => __('Section Link', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::URL,
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
	protected function render()
	{

		$settings = $this->get_settings_for_display();

		$title = $settings['title'];
		$_1st_title = $settings['1st_title'];
		$_1st_link = $settings['1st_link'];
		$_1st_description = $settings['1st_description'];
		$_2nd_title = $settings['2nd_title'];
		$_2nd_link = $settings['2nd_link'];
		$_2nd_description = $settings['2nd_description'];
		$_3rd_title = $settings['3rd_title'];
		$_3rd_link = $settings['3rd_link'];
		$_3rd_description = $settings['3rd_description'];
		$_4th_title = $settings['4th_title'];
		$_4th_link = $settings['4th_link'];
		$_4th_description = $settings['4th_description'];

		echo '<div class="container what-we-can">';
		echo '	<div class="inner-container">';
		echo '		<h3 class="what-we-can-heading">' . $title . '</h3>';
		echo '		<div class="fuild-container">';
		echo '			<div class="row">';
		echo '				<div class="col-sm-12 col-md-6">';
		echo '					<div class="card card-container">';
		echo '						<div class="card-body">';
		echo '							<div class="card-title-container">';
		echo '								<a href="' . $_1st_link . '">';
		echo '								<h5 class="card-title">' . $_1st_title . '</h5>';
		echo '								<svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">';
		echo '									<path d="M13 -6.11959e-07L11.59 1.41L16.17 6L6.99382e-07 6L5.24537e-07 8L16.17 8L11.58 12.59L13 14L20 7L13 -6.11959e-07Z" fill="#69BFF0"/>';
		echo '								</svg>';
		echo '								</a>';
		echo '							</div>';
		echo '							<p class="card-text">' . $_1st_description . '</p>';
		echo '						</div>';
		echo '					</div>';
		echo '				</div>';
		echo '				<div class="col-sm-12 col-md-6">';
		echo '					<div class="card card-container">';
		echo '						<div class="card-body">';
		echo '							<div class="card-title-container">';
		echo '								<a href="' . $_2nd_link . '">';
		echo '								<h5 class="card-title">' . $_2nd_title . '</h5>';
		echo '								<svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">';
		echo '									<path d="M13 -6.11959e-07L11.59 1.41L16.17 6L6.99382e-07 6L5.24537e-07 8L16.17 8L11.58 12.59L13 14L20 7L13 -6.11959e-07Z" fill="#69BFF0" />';
		echo '								</svg>';
		echo '								</a>';
		echo '							</div>';
		echo '							<p class="card-text">' . $_2nd_description . '</p>';
		echo '						</div>';
		echo '					</div>';
		echo '				</div>';
		echo '				<dev class="space-divider"></dev>';
		echo '				<div class="col-sm-12 col-md-6">';
		echo '					<div class="card card-container">';
		echo '						<div class="card-body">';
		echo '							<div class="card-title-container">';
		echo '								<a href="' . $_3rd_link . '">';
		echo '									<h5 class="card-title"> ' . $_3rd_title . ' </h5>';
		echo '									<svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">';
		echo '										<path d="M13 -6.11959e-07L11.59 1.41L16.17 6L6.99382e-07 6L5.24537e-07 8L16.17 8L11.58 12.59L13 14L20 7L13 -6.11959e-07Z" fill="#69BFF0"/>';
		echo '									</svg>';
		echo '								</div>';
		echo '							</a>';
		echo '							<p class="card-text">' . $_3rd_description . '</p>';
		echo '						</div>';
		echo '					</div>';
		echo '				</div>';
		echo '				<div class="col-sm-12 col-md-6">';
		echo '					<div class="card card-container">';
		echo '						<div class="card-body">';
		echo '							<div class="card-title-container">';
		echo '								<a href="' . $_4th_link . '">';
		echo '								<h5 class="card-title">' . $_4th_title . '</h5>';
		echo '								<svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">';
		echo '									<path d="M13 -6.11959e-07L11.59 1.41L16.17 6L6.99382e-07 6L5.24537e-07 8L16.17 8L11.58 12.59L13 14L20 7L13 -6.11959e-07Z" fill="#69BFF0"/>';
		echo '								</svg>';
		echo '							</a>';
		echo '							</div>';
		echo '							<p class="card-text">' . $_4th_description . '</p>';
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
