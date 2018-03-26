<?php
function tours_taxonomies() {
    $args = [
        'label'        => __( 'Tour Locations', 'tcevents' ),
        'public'       => true,
        'rewrite'      => true,
        'hierarchical' => true,
        'show_in_rest' => true,
    ];

    register_taxonomy( 'tour_location', 'event', $args );
}
add_action( 'init', 'tours_taxonomies', 0 );