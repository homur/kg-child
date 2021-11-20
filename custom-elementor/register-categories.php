<?php
function add_elementor_widget_categories(\Elementor\Elements_Manager $elements_manager ) {

	$categories['kg-widgets'] =
		[
			'title' => 'Knight Group',
			'icon'  => 'fa fa-plug'
		];

	$old_categories = $elements_manager->get_categories();
	$categories = array_merge($categories, $old_categories);

	$set_categories = function ( $categories ) {
		$this->categories = $categories;
	};

	$set_categories->call( $elements_manager, $categories );

}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' ); 