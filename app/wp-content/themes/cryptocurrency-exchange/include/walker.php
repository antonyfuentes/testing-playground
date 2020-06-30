<?php
class cryptocurrency_exchange_Walker_Nav_Primary extends Walker_Nav_Menu {
	
	function start_lvl(&$output, $depth = 0, $args = array()) { //ul
		$indent = str_repeat("\t", $depth);
		$submenu = ($depth) ? ' sub-menu' : '';
		$output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
	}
	
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )      {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'cryptocurrency_exchange_nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
		$class_names_li = $class_names ? ' class="' . esc_attr( $class_names ) . ' dropdown"' : '';

		$id = apply_filters( 'cryptocurrency_exchange_nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
		
		$output .= $indent . '<li' . $id . $value . $class_names_li .'>';

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		//$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}
		$item_output = $args->before;
		
		if ( $args->walker->has_children ) {
			$item_output .= '<a class="dropdown-toggle" data-toggle="dropdown"'. $attributes . $class_names .'>';
		} else {
			$item_output .= '<a '. $attributes . $class_names .'>';
		}
		
		//$item_output .= '<a'. $attributes .$class_names.'>';
		$item_output .= $args->link_before . apply_filters( 'cryptocurrency_exchange_the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'cryptocurrency_exchange_walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
add_filter('cryptocurrency_exchange_nav_menu_css_class' , 'cryptocurrency_exchange_nav_class' , 10 , 2);
function cryptocurrency_exchange_nav_class ($classes, $item) {
    if (in_array('current-menu-ancestor', $classes) || in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}