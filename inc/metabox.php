<?php
add_action( 'cmb2_admin_init', 'tc_child_metabox' );

/**
 * Define the metabox and field configurations.
 */
function tc_child_metabox() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_tcm_';

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'tour_priority_set',
        'title'         => __( 'Priority Set', 'tcevents' ),
        'object_types'  => array( 'event', ), // Post type
        'context'       => 'side',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'cmb_styles' => false, // false to disable the CMB stylesheet
        //'closed'     => true, // Keep the metabox closed by default
    ) );

    // Select Post type whether its an event or tour or movie
    $cmb->add_field( [
        'desc'             => __('Check if this goes on top!', 'tcevents'),
        'id'               => $prefix . 'priority_pack',
        'type'             => 'checkbox',
    ] );

}