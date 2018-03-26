<?php
/**
 * The template for displaying all single posts.
 *
 * @package tcevents
 */

get_header();
//$container   = get_theme_mod( 'tcevents_container_type' );
//$sidebar_pos = get_theme_mod( 'tcevents_sidebar_position' );
global $EM_Event;
//echo $EM_Event->output_single();
?>

    <div class="wrapper" id="single-wrapper">

        <div class="container" id="content" tabindex="-1">
            <?php the_breadcrumb(); ?>
            <div class="row">


                <main class="site-main col-12" id="main">

                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php

                        $meta_prefix = '_tcm_';

                        // Event Image
                        $f_image = do_shortcode('[event]{has_image}#_EVENTIMAGE{/has_image}[/event]');
                        // Organizer Name
                        $organizer = get_post_meta( get_the_ID(), $meta_prefix . 'event_organizer', true );
                        // This Overview
                        $overview = do_shortcode('[event]#_EVENTNOTES[/event]');
                        // This Overview
                        $program_type = get_post_meta( get_the_ID(), $meta_prefix . 'event_post_type', true );
                        // Program Schedule
                        $program_for = get_post_meta( get_the_ID(), $meta_prefix . 'day_count', true );
                        $program_schedules = get_post_meta( get_the_ID(), $meta_prefix . 'program_schedule', true );

                        $get_all_meta = get_post_meta(get_the_ID(), '', true);

//                    echo '<pre>';
//                    print_r($get_all_meta);
//                    echo '</pre>';


                        // Location Data
                        $locPostcode = do_shortcode('[event]#_LOCATIONPOSTCODE[/event]');
                        $locAddress = do_shortcode('[event]#_LOCATIONADDRESS[/event]');
                        $locTown = do_shortcode('[event]#_LOCATIONTOWN[/event]');
                        $locState = do_shortcode('[event]#_LOCATIONSTATE[/event]');
                        $locCountry = do_shortcode('[event]#_LOCATIONCOUNTRY[/event]');

                        $gmapLat = do_shortcode('[event]#_LOCATIONLATITUDE[/event]');
                        $gmapLon = do_shortcode('[event]#_LOCATIONLONGITUDE[/event]');

                        $locAddressFrom = $locAddress;

                        if( $program_type == 'tour package' ){
                            $get_from_id = get_post_meta(get_the_ID(), $meta_prefix . 'tour_location_from', true);

                            $gfl_id = get_post($get_from_id)->ID;

                            $gfl_meta = get_post_meta($gfl_id, '', true);

                            $gfl_address = get_post_meta($gfl_id, '_location_address', true);
                            $gfl_town = get_post_meta($gfl_id, '_location_town', true);
                            $gfl_state = get_post_meta($gfl_id, '_location_state', true);

//                        echo '<code style="display: flex;padding: 5px;margin-bottom: 30px;"><pre style="margin: 0;">';
//                        print_r($gfl_meta);
//                        echo '</pre></code>';

                            $locAddressFrom = $gfl_address . ',+' . $gfl_town . ',+' . $gfl_state;
                        }

                        $searchUrl = 'https://www.google.com/maps/dir/' . $locAddressFrom .'/' . $locAddress .'/@' . $gmapLat . ','. $gmapLon .',15z/data=!3m1!4b1';

                        ?>
                        <article <?php post_class('custom-event-single'); ?> id="post-<?php the_ID(); ?>">

                            <header class="row ml-0 mr-0 flex-column">
                                <?php the_title('<h1 class="single-event-title">', '</h1>');?>
                                <h2 class="organized-by">Organized by <strong><?php echo $organizer;?></strong></h2>
                            </header>

                            <div class="single-event-body row">
                                <div class="col-lg-7 seb-left">
                                    <div class="event-fimage">

                                        <?php echo $f_image;?>
                                        <span class="thumbnail-photo-frame">
                                            <span class="top-border"></span>
                                            <img src="<?php echo get_theme_file_uri('/images/logo-white.svg');?>" alt="Ticket Chai - Logo white" class="photo-frame-logo">
                                        </span>
                                        <?php $e_hot_deal = get_post_meta(get_the_ID(), '_tcm_hot_deal', true); ?>
                                        <?php if( $program_type == 'tour package' && $e_hot_deal == 'on' ): ?>
                                            <span class="hot-deal">
                                            <img src="<?php echo get_theme_file_uri('/images/hot-deal.svg'); ?>" alt="">
                                            <span class="hot-deal-text"><?php echo get_theme_mod('tcevents_hot_deal_text', 'Hot Deal'); ?></span>
                                            <span class="hot-deal-price"><span>৳</span><?php echo do_shortcode('[event]#_EVENTPRICEMIN[/event]')?></span>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                    <?php if(!empty($overview)): ?>
                                        <div class="row ml-0 mr-0 flex-column event-overview">
                                            <h2 class="event-overiew-title">Overview</h2>
                                            <?php echo $overview;?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($program_for > 0): ?>
                                        <div class="row ml-0 mr-0 flex-column event-program-schedule">
                                            <h2 class="event-overiew-title">Program Schedule</h2>
                                            <?php if( $program_for != 1 ): ?>
                                                <ul class="nav nav-tabs" role="tablist" id="pschedule-tabs">
                                                    <?php
                                                    for ( $i=0; $i < $program_for; $i++ ){
                                                        $active_class = '';
                                                        if( $i == 0 ){
                                                            $active_class = 'in active';
                                                        }
                                                        ?>

                                                        <li class="nav-item">
                                                            <a class="nav-link <?php echo $active_class; ?>" href="#day_<?php echo $i+1; ?>" role="tab" data-toggle="tab">Day <?php echo $i+1; ?></a>
                                                        </li>

                                                    <?php } ?>
                                                </ul>
                                            <?php endif; ?>

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <?php
                                                for ( $i=0; $i < $program_for; $i++ ){
                                                    $active_class = '';
                                                    if( $i == 0 ){
                                                        $active_class = 'in active show';
                                                    }
                                                    ?>

                                                    <div role="tabpanel"
                                                         class="tab-pane fade <?php echo $active_class; ?>"
                                                         id="day_<?php echo $i+1; ?>">
                                                        <ul class="event-schedule-list list-unstyled">

                                                            <?php
                                                            foreach ($program_schedules as $program_schedule){
                                                                if($i+1 == $program_schedule['_tcm_program_day_for']){

                                                                    ?>
                                                                    <li class="row no-gutters">
                                                                        <span class="list-point order-1"><span></span></span>
                                                                        <strong class="es-time order-2"><?php echo $program_schedule['_tcm_program_time'];?></strong>
                                                                        <div class="es-desc order-3">
                                                                            <h3><?php echo $program_schedule['_tcm_program_title'];?></h3>
                                                                            <p><?php echo $program_schedule['_tcm_program_desc'];?></p>
                                                                        </div>
                                                                    </li>

                                                                <?php }
                                                            }
                                                            ?>

                                                        </ul>
                                                        <ul class="list-unstyled bottom-tab-trigs">
                                                            <li class="<?php if($i == 0) echo 'd-none'; ?>">
                                                                <a class="btnPrevious prev-day">
                                                                    <img src="<?php echo get_theme_file_uri('/images/chevron-left.svg');?>" alt="" class="prev-day-icon">
                                                                    <span>See Day <?php echo $i+1; ?></span>
                                                                </a>
                                                            </li>
                                                            <li class="<?php if($i+1 == $program_for) echo 'd-none'; ?>">
                                                                <a class="btnNext next-day">
                                                                    <span>See Day <?php echo $i+2; ?></span>
                                                                    <img src="<?php echo get_theme_file_uri('/images/chevron-right.svg');?>" alt="" class="next-day-icon">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-5 seb-right">
                                    <div class="event-buy-ticket-col">
                                        <?php
                                        //echo do_shortcode('[event]{has_bookings}<h3 class="ebt-title">Buy Tickets</h3>{/has_bookings}[/event]');
                                        ?>
                                        <?php
                                        //echo do_shortcode('[event]{no_bookings}<h3 class="ebt-title">Details</h3>{/no_bookings}[/event]');
                                        ?>
                                        <h3 class="ebt-title">Details</h3>
                                        <div class="ebt-inner">
                                            <?php
                                            //echo do_shortcode('[event]{has_bookings}<h4 class="ebt-title2">Details<span></span></h4>{/has_bookings}[/event]');
                                            ?>
                                            <div class="details-block">
                                                <h4><b>Date</b></h4>
                                                <p>
                                                    <?php echo do_shortcode('[event]#j #M #Y #@_{ \u\n\t\i\l j M Y}[/event]');?>
                                                    <br>
                                                    <?php echo do_shortcode('[event]#_EVENTTIMES[/event]');?>
                                                </p>
                                            </div>
                                            <div class="details-block">
                                                <h4><b>Location</b></h4>
                                                <p>
                                                    <?php
                                                    echo $locAddress;
                                                    echo '<br>';
                                                    echo $locTown;
                                                    echo ', ';
                                                    echo $locState;
                                                    if( !empty($locPostcode) ) echo '- ' . $locPostcode;
                                                    echo ', ';
                                                    echo $locCountry;
                                                    ?>
                                                </p>
                                                <p><a href="<?php echo $searchUrl; ?>" target="_blank">view map</a></p>
                                            </div>

                                            <?php echo do_shortcode('[event]{has_bookings}<h4 class="ebt-title2">Buy Tickets<span></span></h4>#_BOOKINGFORM{/has_bookings}[/event]');?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </article>

                        <!-- Modal -->
                        <div class="modal fade login-modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <?php echo do_shortcode('[login-with-ajax]');?>
                                </div>
                            </div>
                        </div>

                    <?php endwhile; // end of the loop. ?>

                </main><!-- #main -->

            </div><!-- #primary -->

        </div><!-- .row -->

    </div><!-- Container end -->

    </div><!-- Wrapper end -->

<?php get_footer(); ?>