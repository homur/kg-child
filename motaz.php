<?php
/**
* Add custom fields to menu item
*
* This will allow us to play nicely with any other plugin that is adding the same hook
*
* @param  int $item_id 
* @params obj $item - the menu item
* @params array $args
*/
function kia_custom_fields( $item_id, $item ) {

	wp_nonce_field( 'menu_cstm_type_nonce', '_menu_cstm_type_nonce_name' );
	$menu_cstm_type = get_post_meta( $item_id, '_menu_cstm_type', true );

	wp_nonce_field( 'menu_cstm_before_html_nonce', '_menu_cstm_before_html_nonce_name' );
	$menu_cstm_before_html = get_post_meta( $item_id, '_menu_cstm_before_html', true );

	// echo "Menu Type Value: " . $menu_cstm_type;
	?>
	    <input type="hidden" class="nav-menu-id" value="<?php echo $item_id ;?>" />
	<div class="field-menu_cstm_type description-wide" style="margin: 5px 0;">
	    <b class="description"><?php _e( "Type", 'custom-menu-meta' ); ?></b>
	    <br />


	    <div class="logged-input-holder">
	        <input type="radio" name="menu_cstm_type[<?php echo $item_id ;?>]" id="mega-menu-for-<?php echo $item_id ;?>" value="mega_menu" <?php echo esc_attr( $menu_cstm_type ) == "mega_menu" ? "checked" : "" ?> />
	        <label for="mega-menu-for-<?php echo $item_id ;?>">
	            <?php _e( 'Mega Menu', 'custom-menu-meta'); ?>
	        </label>
			<input type="radio" name="menu_cstm_type[<?php echo $item_id ;?>]" id="section-title-for-<?php echo $item_id ;?>" value="section_title" <?php echo esc_attr( $menu_cstm_type ) == "section_title" ? "checked" : "" ?> />
	        <label for="section-title-for-<?php echo $item_id ;?>">
	            <?php _e( 'Section Title', 'custom-menu-meta'); ?>
	        </label>
			<input type="radio" name="menu_cstm_type[<?php echo $item_id ;?>]" id="accordion-for-<?php echo $item_id ;?>" value="accordion" <?php echo esc_attr( $menu_cstm_type ) == "accordion" ? "checked" : "" ?> />
	        <label for="accordion-for-<?php echo $item_id ;?>">
	            <?php _e( 'Accordion', 'custom-menu-meta'); ?>
	        </label>
	    </div>

	</div>

	<div class="field-menu_cstm_before_html description-wide" style="margin: 5px 0;">
	    <b class="description"><?php _e( "Before Html (svg ... )", 'custom-menu-meta' ); ?></b>
	    <br />

	    <div class="logged-input-holder">
		<textarea name="menu_cstm_before_html[<?php echo $item_id ;?>]" rows="4" cols="40"><?php echo htmlspecialchars( $menu_cstm_before_html ) ?></textarea>
			
	    </div>

	</div>

	<?php
}
add_action( 'wp_nav_menu_item_custom_fields', 'kia_custom_fields', 10, 2 );

/**
* Save the menu item meta
* 
* @param int $menu_id
* @param int $menu_item_db_id	
*/
function kia_nav_update( $menu_id, $menu_item_db_id ) {

	// Verify this came from our screen and with proper authorization.
	if ( ! isset( $_POST['_menu_cstm_type_nonce_name'] ) || ! wp_verify_nonce( $_POST['_menu_cstm_type_nonce_name'], 'menu_cstm_type_nonce' ) ) {
		return $menu_id;
	}
	if ( ! isset( $_POST['_menu_cstm_before_html_nonce_name'] ) || ! wp_verify_nonce( $_POST['_menu_cstm_before_html_nonce_name'], 'menu_cstm_before_html_nonce' ) ) {
		return $menu_id;
	}

	if ( isset( $_POST['menu_cstm_type'][$menu_item_db_id]  ) ) {
		$sanitized_data = $_POST['menu_cstm_type'][$menu_item_db_id];
		update_post_meta( $menu_item_db_id, '_menu_cstm_type', $sanitized_data );
	} else {
		delete_post_meta( $menu_item_db_id, '_menu_cstm_type' );
	}

	if ( isset( $_POST['menu_cstm_before_html'][$menu_item_db_id]  ) ) {
		$sanitized_data = $_POST['menu_cstm_before_html'][$menu_item_db_id];
		update_post_meta( $menu_item_db_id, '_menu_cstm_before_html', $sanitized_data );
	} else {
		delete_post_meta( $menu_item_db_id, '_menu_cstm_before_html' );
	}
}
add_action( 'wp_update_nav_menu_item', 'kia_nav_update', 10, 2 );

/**
* Displays text on the front-end.
*
* @param string   $title The menu item's title.
* @param WP_Post  $item  The current menu item.
* @return string      
*/
// function kia_custom_menu_title( $title, $item ) {

// 	if( is_object( $item ) && isset( $item->ID ) ) {

// 		$menu_cstm_type = get_post_meta( $item->ID, '_menu_cstm_type', true );

// 		if ( ! empty( $menu_cstm_type ) ) {
// 			$title .= ' - ' . $menu_cstm_type;
// 		}
// 	}
// 	return $title;
// }
// add_filter( 'nav_menu_item_title', 'kia_custom_menu_title', 10, 2 );

// function modify_home_in_nav_menu_objects( $items, $args ) {
//     foreach ( $items as $k => $object ) {
//         // you can also target given page using this if:
//         // if ( 'page' == $object->object && 2 == $object->object_id ) {
//         // if ( 30 == $object->ID ) {
// 			// $object->title .= var_dump($items);
//             $object->classes[] = 'test-class';
//         // }
//     }
//     return $items;
// }
// add_filter( 'wp_nav_menu_objects', 'modify_home_in_nav_menu_objects', 10, 2 );

class Understrap_WP_Bootstrap_Navwalker extends Walker_Nav_Menu {

	/**
	 * Starts the list before the elements are added.
	 *
	 * @since WP 3.0.0
	 *
	 * @see Walker_Nav_Menu::start_lvl()
	 *
	 * @param string   $output Used to append additional content (passed by reference).
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat( $t, $depth );
		// Default class to add to the file.
		$classes = array( 'dropdown-menu' );
		/**
		 * Filters the CSS class(es) applied to a menu list element.
		 *
		 * @since WP 4.8.0
		 *
		 * @param array    $classes The CSS classes that are applied to the menu `<ul>` element.
		 * @param stdClass $args    An object of `wp_nav_menu()` arguments.
		 * @param int      $depth   Depth of menu item. Used for padding.
		 */
		$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
		/**
		 * The `.dropdown-menu` container needs to have a labelledby
		 * attribute which points to it's trigger link.
		 *
		 * Form a string for the labelledby attribute from the the latest
		 * link with an id that was added to the $output.
		 */
		$labelledby = '';
		// find all links with an id in the output.
		preg_match_all( '/(<a.*?id=\"|\')(.*?)\"|\'.*?>/im', $output, $matches );
		// with pointer at end of array check if we got an ID match.
		if ( end( $matches[2] ) ) {
			// build a string to use as aria-labelledby.
			$labelledby = 'aria-labelledby="' . end( $matches[2] ) . '"';
		}
		$output .= "{$n}{$indent}<ul $class_names $labelledby role=\"menu\">{$n}";
	}

	/**
	 * Starts the element output.
	 *
	 * @since WP 3.0.0
	 * @since WP 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
	 *
	 * @see Walker_Nav_Menu::start_el()
	 *
	 * @param string   $output Used to append additional content (passed by reference).
	 * @param WP_Post  $item   Menu item data object.
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 * @param int      $id     Current item ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		// Initialize some holder variables to store specially handled item
		// wrappers and icons.
		$linkmod_classes = array();
		$icon_classes    = array();

		/**
		 * Get an updated $classes array without linkmod or icon classes.
		 *
		 * NOTE: linkmod and icon class arrays are passed by reference and
		 * are maybe modified before being used later in this function.
		 */
		$classes = self::seporate_linkmods_and_icons_from_classes( $classes, $linkmod_classes, $icon_classes, $depth );

		// Join any icon classes plucked from $classes into a string.
		$icon_class_string = join( ' ', $icon_classes );

		/**
		 * Filters the arguments for a single nav menu item.
		 *
		 *  WP 4.4.0
		 *
		 * @param stdClass $args  An object of wp_nav_menu() arguments.
		 * @param WP_Post  $item  Menu item data object.
		 * @param int      $depth Depth of menu item. Used for padding.
		 */
		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

		// Add .dropdown or .active classes where they are needed.
		if ( isset( $args->has_children ) && $args->has_children ) {
			$classes[] = 'dropdown';
		}
		if ( in_array( 'current-menu-item', $classes, true ) || in_array( 'current-menu-parent', $classes, true ) ) {
			$classes[] = 'active';
		}

		// Add some additional default classes to the item.
		$classes[] = 'menu-item-' . $item->ID;
		$classes[] = 'nav-item';

		// Allow filtering the classes.
		$classes = apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth );

		// Form a string of classes in format: class="class_names".
		$menu_cstm_type = get_post_meta( $item->ID, '_menu_cstm_type', true );
		// echo $menu_cstm_type;
		if ( $menu_cstm_type === 'section_title' ) {
			$linkmod_classes[] = 'dropdown-header';
		}
		$classes[] = $menu_cstm_type;

		$class_names = join( ' ', $classes );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		/**
		 * Filters the ID applied to a menu item's list item element.
		 *
		 * @since WP 3.0.1
		 * @since WP 4.1.0 The `$depth` parameter was added.
		 *
		 * @param string   $menu_id The ID that is applied to the menu item's `<li>` element.
		 * @param WP_Post  $item    The current menu item.
		 * @param stdClass $args    An object of wp_nav_menu() arguments.
		 * @param int      $depth   Depth of menu item. Used for padding.
		 */
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"' . $id . $class_names . '>';

		// initialize array for holding the $atts for the link item.
		$atts = array();

		// Set title from item to the $atts array - if title is empty then
		// default to item title.
		if ( empty( $item->attr_title ) ) {
			$atts['title'] = ! empty( $item->title ) ? strip_tags( $item->title ) : '';
		} else {
			$atts['title'] = $item->attr_title;
		}

		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		if ( '_blank' === $item->target && empty( $item->xfn ) ) { // Thanks to LukaszJaro, see https://github.com/understrap/understrap/issues/973.
			$atts['rel'] = 'noopener noreferrer';
		} else {
			$atts['rel'] = $item->xfn;
		}


		// If item has_children add atts to <a>.
		if ( isset( $args->has_children ) && $args->has_children && 1 !== $args->depth ) {
			// $atts['href']          = '#';
			// $atts.removeAttr()
			// $atts['data-toggle']   = 'dropdown';
			$atts['aria-haspopup'] = 'true';
			$atts['aria-expanded'] = 'false';
			$atts['class']         = 'dropdown-toggle nav-link';
			$atts['id']            = 'menu-item-dropdown-' . $item->ID;
			// console.log($atts);
		} else {
			$atts['href'] = ! empty( $item->url ) ? $item->url : '#';
			// Items in dropdowns use .dropdown-item instead of .nav-link.
			if ( $depth > 0 ) {
				$atts['class'] = 'dropdown-item';
			} else {
				$atts['class'] = 'nav-link';
			}
		}
		// var_dump($atts['href'] );
		$atts['aria-current'] = $item->current ? 'page' : '';

		// update atts of this item based on any custom linkmod classes.
		$atts = self::update_atts_for_linkmod_type( $atts, $linkmod_classes );
		// Allow filtering of the $atts array before using it.
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		// Build a string of html containing all the atts for the item.
		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		/**
		 * Set a typeflag to easily test if this is a linkmod or not.
		 */
		$linkmod_type = self::get_linkmod_type( $linkmod_classes );

		/**
		 * START appending the internal item contents to the output.
		 */
		$item_output = isset( $args->before ) ? $args->before : '';
		/**
		 * This is the start of the internal nav item. Depending on what
		 * kind of linkmod we have we may need different wrapper elements.
		 */
		if ( '' !== $linkmod_type ) {
			// is linkmod, output the required element opener.
			$item_output .= self::linkmod_element_open( $linkmod_type, $attributes );
		} else {
			// With no link mod type set this must be a standard <a> tag.
			$item_output .= '<a' . $attributes . '>';
		}

		/**
		 * Initiate empty icon var, then if we have a string containing any
		 * icon classes form the icon markup with an <i> element. This is
		 * output inside of the item before the $title (the link text).
		 */
		$icon_html = '';
		if ( ! empty( $icon_class_string ) ) {
			// append an <i> with the icon classes to what is output before links.
			$icon_html = '<i class="' . esc_attr( $icon_class_string ) . '" aria-hidden="true"></i> ';
		}

		/** This filter is documented in wp-includes/post-template.php */
		$title = apply_filters( 'the_title', $item->title, $item->ID );

		/**
		 * Filters a menu item's title.
		 *
		 * @since WP 4.4.0
		 *
		 * @param string   $title The menu item's title.
		 * @param WP_Post  $item  The current menu item.
		 * @param stdClass $args  An object of wp_nav_menu() arguments.
		 * @param int      $depth Depth of menu item. Used for padding.
		 */
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		/**
		 * If the .sr-only class was set apply to the nav items text only.
		 */
		if ( in_array( 'sr-only', $linkmod_classes, true ) ) {
			$title         = self::wrap_for_screen_reader( $title );
			$keys_to_unset = array_keys( $linkmod_classes, 'sr-only', true );
			foreach ( $keys_to_unset as $k ) {
				unset( $linkmod_classes[ $k ] );
			}
		}

		$menu_cstm_before_html = get_post_meta( $item->ID, '_menu_cstm_before_html', true );
		if ( $menu_cstm_before_html ) {
			$title = $menu_cstm_before_html . $title;
		}

		// Put the item contents into $output.
		$item_output .= isset( $args->link_before ) ? $args->link_before . $icon_html . $title . $args->link_after : '';
		/**
		 * This is the end of the internal nav item. We need to close the
		 * correct element depending on the type of link or link mod.
		 */
		if ( '' !== $linkmod_type ) {
			// is linkmod, output the required element opener.
			$item_output .= self::linkmod_element_close( $linkmod_type, $attributes );
		} else {
			// With no link mod type set this must be a standard <a> tag.
			$item_output .= '</a>';
		}

		$item_output .= isset( $args->after ) ? $args->after : '';

		/**
		 * END appending the internal item contents to the output.
		 */
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	}

	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth. It is possible to set the
	 * max depth to include all depths, see walk() method.
	 *
	 * This method should not be called directly, use the walk() method instead.
	 *
	 * @since WP 2.5.0
	 *
	 * @see Walker::start_lvl()
	 *
	 * @param object $element           Data object.
	 * @param array  $children_elements List of elements to continue traversing (passed by reference).
	 * @param int    $max_depth         Max depth to traverse.
	 * @param int    $depth             Depth of current element.
	 * @param array  $args              An array of arguments.
	 * @param string $output            Used to append additional content (passed by reference).
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
		if ( ! $element ) {
			return; }
		$id_field = $this->db_fields['id'];
		// Display this element.
		if ( is_object( $args[0] ) ) {
			$args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] ); }
		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}

	/**
	 * Menu Fallback
	 * =============
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a menu has not been assigned to the theme location in the WordPress
	 * menu manager the function with display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $args passed from the wp_nav_menu function.
	 */
	public static function fallback( $args ) {
		if ( current_user_can( 'edit_theme_options' ) ) {

			/* Get Arguments. */
			$container       = $args['container'];
			$container_id    = $args['container_id'];
			$container_class = $args['container_class'];
			$menu_class      = $args['menu_class'];
			$menu_id         = $args['menu_id'];

			// initialize var to store fallback html.
			$fallback_output = '';

			if ( $container ) {
				$fallback_output .= '<' . esc_attr( $container );
				if ( $container_id ) {
					$fallback_output .= ' id="' . esc_attr( $container_id ) . '"';
				}
				if ( $container_class ) {
					$fallback_output .= ' class="' . esc_attr( $container_class ) . '"';
				}
				$fallback_output .= '>';
			}
			$fallback_output .= '<ul';
			if ( $menu_id ) {
				$fallback_output .= ' id="' . esc_attr( $menu_id ) . '"'; }
			if ( $menu_class ) {
				$fallback_output .= ' class="' . esc_attr( $menu_class ) . '"'; }
			$fallback_output .= '>';
			$fallback_output .= '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" title="' . esc_attr__( 'Add a menu', 'understrap' ) . '">' . esc_html__( 'Add a menu', 'understrap' ) . '</a></li>';
			$fallback_output .= '</ul>';
			if ( $container ) {
				$fallback_output .= '</' . esc_attr( $container ) . '>';
			}

			// if $args has 'echo' key and it's true echo, otherwise return.
			if ( array_key_exists( 'echo', $args ) && $args['echo'] ) {
				echo $fallback_output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			} else {
				return $fallback_output;
			}
		}
	}

	/**
	 * Find any custom linkmod or icon classes and store in their holder
	 * arrays then remove them from the main classes array.
	 *
	 * Supported linkmods: .disabled, .dropdown-header, .dropdown-divider, .sr-only
	 * Supported iconsets: Font Awesome 4/5, Glypicons
	 *
	 * NOTE: This accepts the linkmod and icon arrays by reference.
	 *
	 * @since 4.0.0
	 *
	 * @param array   $classes         an array of classes currently assigned to the item.
	 * @param array   $linkmod_classes an array to hold linkmod classes.
	 * @param array   $icon_classes    an array to hold icon classes.
	 * @param integer $depth           an integer holding current depth level.
	 *
	 * @return array  $classes         a maybe modified array of classnames.
	 */
	private function seporate_linkmods_and_icons_from_classes( $classes, &$linkmod_classes, &$icon_classes, $depth ) {
		// Loop through $classes array to find linkmod or icon classes.
		foreach ( $classes as $key => $class ) {
			// If any special classes are found, store the class in it's
			// holder array and and unset the item from $classes.
			if ( preg_match( '/^disabled|^sr-only/i', $class ) ) {
				// Test for .disabled or .sr-only classes.
				$linkmod_classes[] = $class;
				unset( $classes[ $key ] );
			} elseif ( preg_match( '/^dropdown-header|^dropdown-divider|^dropdown-item-text/i', $class ) && $depth > 0 ) {
				// Test for .dropdown-header or .dropdown-divider and a
				// depth greater than 0 - IE inside a dropdown.
				$linkmod_classes[] = $class;
				unset( $classes[ $key ] );
			} elseif ( preg_match( '/^fa-(\S*)?|^fa(s|r|l|b)?(\s?)?$/i', $class ) ) {
				// Font Awesome.
				$icon_classes[] = $class;
				unset( $classes[ $key ] );
			} elseif ( preg_match( '/^glyphicon-(\S*)?|^glyphicon(\s?)$/i', $class ) ) {
				// Glyphicons.
				$icon_classes[] = $class;
				unset( $classes[ $key ] );
			}
		}

		return $classes;
	}

	/**
	 * Return a string containing a linkmod type and update $atts array
	 * accordingly depending on the decided.
	 *
	 * @since 4.0.0
	 *
	 * @param array $linkmod_classes array of any link modifier classes.
	 *
	 * @return string                empty for default, a linkmod type string otherwise.
	 */
	private function get_linkmod_type( $linkmod_classes = array() ) {
		$linkmod_type = '';
		// Loop through array of linkmod classes to handle their $atts.
		if ( ! empty( $linkmod_classes ) ) {
			foreach ( $linkmod_classes as $link_class ) {
				if ( ! empty( $link_class ) ) {

					// check for special class types and set a flag for them.
					if ( 'dropdown-header' === $link_class ) {
						$linkmod_type = 'dropdown-header';
					} elseif ( 'dropdown-divider' === $link_class ) {
						$linkmod_type = 'dropdown-divider';
					} elseif ( 'dropdown-item-text' === $link_class ) {
						$linkmod_type = 'dropdown-item-text';
					}
				}
			}
		}
		return $linkmod_type;
	}

	/**
	 * Update the attributes of a nav item depending on the limkmod classes.
	 *
	 * @since 4.0.0
	 *
	 * @param array $atts            array of atts for the current link in nav item.
	 * @param array $linkmod_classes an array of classes that modify link or nav item behaviors or displays.
	 *
	 * @return array                 maybe updated array of attributes for item.
	 */
	private function update_atts_for_linkmod_type( $atts = array(), $linkmod_classes = array() ) {
		if ( ! empty( $linkmod_classes ) ) {
			foreach ( $linkmod_classes as $link_class ) {
				if ( ! empty( $link_class ) ) {
					// update $atts with a space and the extra classname...
					// so long as it's not a sr-only class.
					if ( 'sr-only' !== $link_class ) {
						$atts['class'] .= ' ' . esc_attr( $link_class );
					}
					// check for special class types we need additional handling for.
					if ( 'disabled' === $link_class ) {
						// Convert link to '#' and unset open targets.
						$atts['href'] = '#';
						unset( $atts['target'] );
					} elseif ( 'dropdown-header' === $link_class || 'dropdown-divider' === $link_class || 'dropdown-item-text' === $link_class ) {
						// Store a type flag and unset href and target.
						unset( $atts['href'] );
						unset( $atts['target'] );
					}
				}
			}
		}
		return $atts;
	}

	/**
	 * Wraps the passed text in a screen reader only class.
	 *
	 * @since 4.0.0
	 *
	 * @param string $text the string of text to be wrapped in a screen reader class.
	 * @return string      the string wrapped in a span with the class.
	 */
	private function wrap_for_screen_reader( $text = '' ) {
		if ( $text ) {
			$text = '<span class="sr-only">' . $text . '</span>';
		}
		return $text;
	}

	/**
	 * Returns the correct opening element and attributes for a linkmod.
	 *
	 * @since 4.0.0
	 *
	 * @param string $linkmod_type a sting containing a linkmod type flag.
	 * @param string $attributes   a string of attributes to add to the element.
	 *
	 * @return string              a string with the openign tag for the element with attribibutes added.
	 */
	private function linkmod_element_open( $linkmod_type, $attributes = '' ) {
		$output = '';
		if ( 'dropdown-item-text' === $linkmod_type ) {
			$output .= '<span class="dropdown-item-text"' . $attributes . '>';
		} elseif ( 'dropdown-header' === $linkmod_type ) {
			// For a header use a span with the .h6 class instead of a real
			// header tag so that it doesn't confuse screen readers.
			$output .= '<span class="dropdown-header h6"' . $attributes . '>';
		} elseif ( 'dropdown-divider' === $linkmod_type ) {
			// this is a divider.
			$output .= '<div class="dropdown-divider"' . $attributes . '>';
		}
		return $output;
	}

	/**
	 * Return the correct closing tag for the linkmod element.
	 *
	 * @since 4.0.0
	 *
	 * @param string $linkmod_type a string containing a special linkmod type.
	 *
	 * @return string              a string with the closing tag for this linkmod type.
	 */
	private function linkmod_element_close( $linkmod_type ) {
		$output = '';
		if ( 'dropdown-header' === $linkmod_type || 'dropdown-item-text' === $linkmod_type ) {
			// For a header use a span with the .h6 class instead of a real
			// header tag so that it doesn't confuse screen readers.
			$output .= '</span>';
		} elseif ( 'dropdown-divider' === $linkmod_type ) {
			// this is a divider.
			$output .= '</div>';
		}
		return $output;
	}
}

