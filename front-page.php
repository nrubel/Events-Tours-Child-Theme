<?php
/**
 * Template Name: Home Page Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package tcevents
 */

get_header();

get_template_part('global-templates/tours', 'grid');
get_template_part('global-templates/testimonials');
get_template_part('global-templates/featured', 'on');
get_template_part('global-templates/paralax', 'video');

$check_events_tours = get_posts(['post_type' => 'event']);

if( !empty($check_events_tours) )
    get_template_part('global-templates/event-tours', 'carousels');

get_template_part('global-templates/blog', 'list');
get_template_part('global-templates/shop', 'cats');
get_template_part('global-templates/feature', 'blocks');

get_footer();