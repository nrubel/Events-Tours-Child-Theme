<?php
/*
 * Template Name: Air Tickets
 * */

get_header();

?>


<section class="row air-ticket-template">
    <div class="container">
        <div class="row align-items-center justify-content-center att-inner flex-column">
            <img src="<?php echo get_theme_file_uri('/images/air-ticket.svg'); ?>" alt="">
            <h2>Air Tickets</h2>
            <h3>Landing soon</h3>
            <ul class="nav justify-content-center">
                <li><a href="<?php echo esc_url(home_url('/'));?>">Go to Homepage</a></li>
                <li><a href="<?php echo esc_url(home_url('/tours-list'));?>">View Tour Packages</a></li>
                <li><a href="<?php echo esc_url(home_url('/events-list'));?>">View Events</a></li>
            </ul>
        </div>
    </div>
</section>

<?php get_footer(); ?>
