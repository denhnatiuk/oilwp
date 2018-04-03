<?php
function wp_get_nav_menu_items( $menu, $args = array() ) {
    $menu = wp_get_nav_menu_object( $menu );
 
    if ( ! $menu ) {
        return false;
    }
 
    static $fetched = array();
 
    $items = get_objects_in_term( $menu->term_id, 'nav_menu' );
    if ( is_wp_error( $items ) ) {
        return false;
    }
 
    $defaults = array( 'order' => 'ASC', 'orderby' => 'menu_order', 'post_type' => 'nav_menu_item',
        'post_status' => 'publish', 'output' => ARRAY_A, 'output_key' => 'menu_order', 'nopaging' => true );
    $args = wp_parse_args( $args, $defaults );
    $args['include'] = $items;
 
    if ( ! empty( $items ) ) {
        $items = get_posts( $args );
    } else {
        $items = array();
    }
 
    // Get all posts and terms at once to prime the caches
    if ( empty( $fetched[ $menu->term_id ] ) && ! wp_using_ext_object_cache() ) {
        $fetched[$menu->term_id] = true;
        $posts = array();
        $terms = array();
        foreach ( $items as $item ) {
            $object_id = get_post_meta( $item->ID, '_menu_item_object_id', true );
            $object    = get_post_meta( $item->ID, '_menu_item_object',    true );
            $type      = get_post_meta( $item->ID, '_menu_item_type',      true );
 
            if ( 'post_type' == $type )
                $posts[$object][] = $object_id;
            elseif ( 'taxonomy' == $type)
                $terms[$object][] = $object_id;
        }
 
        if ( ! empty( $posts ) ) {
            foreach ( array_keys($posts) as $post_type ) {
                get_posts( array('post__in' => $posts[$post_type], 'post_type' => $post_type, 'nopaging' => true, 'update_post_term_cache' => false) );
            }
        }
        unset($posts);
 
        if ( ! empty( $terms ) ) {
            foreach ( array_keys($terms) as $taxonomy ) {
                get_terms( $taxonomy, array(
                    'include' => $terms[ $taxonomy ],
                    'hierarchical' => false,
                ) );
            }
        }
        unset($terms);
    }
 
    $items = array_map( 'wp_setup_nav_menu_item', $items );
 
    if ( ! is_admin() ) { // Remove invalid items only in front end
        $items = array_filter( $items, '_is_valid_nav_menu_item' );
    }
 
    if ( ARRAY_A == $args['output'] ) {
        $items = wp_list_sort( $items, array(
            $args['output_key'] => 'ASC',
        ) );
        $i = 1;
        foreach ( $items as $k => $item ) {
            $items[$k]->{$args['output_key']} = $i++;
        }
    }
 
    /**
     * Filters the navigation menu items being returned.
     *
     * @since 3.0.0
     *
     * @param array  $items An array of menu item post objects.
     * @param object $menu  The menu object.
     * @param array  $args  An array of arguments used to retrieve menu item objects.
     */
    return apply_filters( 'wp_get_nav_menu_items', $items, $menu, $args );
}
?>