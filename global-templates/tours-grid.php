<?php
$events_to_show = get_post_meta(get_the_ID(), '_tcm_tour_for_homepage', false);
//print_r( $events_to_show );
$event_args = [
    'post_type' => 'event',
    'posts_per_page' => -1,
    'post__in' => $events_to_show[0],
    'meta_query' => [
        'relation' => 'AND',
        [
            'key' => '_tcm_event_post_type',
            'value' => 'tour package',
        ],
        [
            'key'=> '_tcm_post_hider',
            'value' => 0
        ]
    ],
];

//print_r($event_args);

$event_query = new WP_Query($event_args);
if( $event_query->have_posts() ):
    ?>
    <section class="row tours-grid-block">
        <div class="container">
            <h2 class="carousel-title">
                <img src="<?php echo get_theme_file_uri('/images/tc-con.svg'); ?>" alt="Ticket Chai Icon">&nbsp;&nbsp;Featured Tours
                <a href="<?php echo esc_url(home_url('/tours-list/')); ?>">
                    See All Tours
                    <svg width="8px" height="14px" viewBox="0 0 8 14" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <!-- Generator: Sketch 48.1 (47250) - http://www.bohemiancoding.com/sketch -->
                        <title>Shape</title>
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g id="01.-Homepage" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" transform="translate(-1477.000000, -611.000000)" stroke-linecap="round" stroke-linejoin="round">
                            <polyline id="Shape" stroke="#808A97" stroke-width="2" points="1478 624 1484 618 1478 612"></polyline>
                        </g>
                    </svg>
                </a>
            </h2>

            <div class="tours-grid row">
                <?php
                while ( $event_query->have_posts() ) :
                    $event_query->the_post();

                    $hide_post =  get_post_meta(get_the_ID(), '_tcm_post_hider', true);
                    if( $hide_post != 1 ):

                        echo '<div class="col-lg-4 col-md-6 tours-grid-item">';
                        get_template_part( 'loop-templates/content', 'events' );
                        echo '</div>';
                    endif;

                endwhile; // end of the loop.
                ?>
            </div>
        </div>
    </section>

<?php endif; ?>