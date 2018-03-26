<?php
/**
 * Template Name: Compare
 **/
get_header();
?>

<section class="row mx-0 py-5 compare-tour-section align-items-center">
    <div class="container">



        <?php
        $tour_term = '';
        if( isset($_GET['tour_locs']) ){
            $tour_term = $_GET['tour_locs'];

        $term_name = '';
        if( isset($_GET['flexdatalist-tour_locs']) )
            $term_name = $_GET['flexdatalist-tour_locs'];

        if( !empty($tour_term) ) {

            echo get_template_part('global-templates/compare', 'filterform');
            $term_data = get_term($tour_term);

            $prefix = '_tcm_';
            $args = [
                'post_type' => 'event',
                'posts_per_page' => -1,
//                'meta_query' => [
//                    'relation' => 'OR',
//                    [
//                        'key' => $prefix . 'event_post_type',
//                        'value' => 'tour package'
//                    ],
//                    [
//                        'key' => $prefix . 'priority_pack',
//                        'value' => 'on'
//                    ]
//                ],
                'tax_query' => [
                    [
                        'taxonomy' => 'tour_location',
                        'field'    => 'term_id',
                        'terms'    =>  $tour_term,
                    ]
                ]
            ];

            $tours = new WP_Query($args);

//            print_r($tours);

            $tours_array = [];

            if ($tours->have_posts()) {
                while ($tours->have_posts()) {
                    $tours->the_post();

                    $tour_price_html = do_shortcode('[event]#_EVENTPRICEMIN[/event]');
                    $tour_price_array = explode('.', $tour_price_html);
                    $tour_price = str_replace(',', '', $tour_price_array[0]);
                    if ($tour_price == 0)
                        continue;

                    $tours_array[get_the_ID()] = $tour_price;
                }

                $result_count = count($tours_array);

                if( $result_count == 0 ){
                    echo '<h3 class="text-secondary text-center">Sorry no result for&nbsp;<strong>'. $term_name .'</strong></h3>';
                }else {
                    echo '<h3 class="text-secondary">'. $result_count .'&nbsp;Result for&nbsp;<strong>'. $term_name .'</strong></h3>';

                    asort($tours_array);

                    foreach ($tours_array as $key => $value) {
                        $post = get_post($key);

                        $e_hot_deal = get_post_meta(get_the_ID(), '_tcm_hot_deal', true);
                        $program_for = get_post_meta(get_the_ID(), '_tcm_day_count', true);
                        $organizer = get_post_meta(get_the_ID(), $prefix . 'event_organizer', true);
                        if ($program_for == '1')
                            $tour_duration = '1 Day';
                        else
                            $tour_duration = '' . $program_for . ' Days';

                        // Tour Price
                        $tour_price_html = do_shortcode('[event]#_EVENTPRICEMIN[/event]');
                        $tour_price_array = explode('.', $tour_price_html);
                        $tour_price = $tour_price_array[0];
                        if ($tour_price != 0)
                            $tour_price_text = '<p class="epl-date-n-times"><strong>BDT ' . $tour_price . '</strong> per person</p>';
                        else
                            $tour_price_text = '<p class="epl-date-n-times">Booking Closed</p>';
                        ?>

                        <article <?php post_class('media compare-tour'); ?> >

                            <a
                                    href="<?php the_permalink(); ?>"
                                    class="card-img-top"
                                <?php if (has_post_thumbnail()): ?>
                                    style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'e-thumbnail'); ?>);"
                                <?php endif; ?>
                            >

                                <?php if (!has_post_thumbnail()): ?>
                                    No Image Found!
                                <?php endif; ?>

                                <span class="thumbnail-photo-frame">
                            <span class="top-border"></span>
                            <img src="<?php echo get_theme_file_uri('/images/logo-white.svg'); ?>"
                                 alt="Ticket Chai - Logo white" class="photo-frame-logo">
                        </span>

                                <?php if ($e_hot_deal == 'on' && $tour_price != 0): ?>
                                    <span class="hot-deal">
                            <img src="<?php echo get_theme_file_uri('/images/hot-deal.svg'); ?>" alt="">
                            <span class="hot-deal-text"><?php echo get_theme_mod('tcevents_hot_deal_text', 'Hot Deal'); ?></span>
                            <span class="hot-deal-price"><span>৳</span><?php echo $tour_price; ?></span>
                        </span>
                                <?php endif; ?>

                                <span class="btn btn-primary w-100">View Details</span>
                            </a>
                            <div class="media-body">
                                <a href="<?php the_permalink(); ?>" class="epl-title"><?php the_title(); ?></a>
                                <p>Organized By: <strong><?php echo $organizer; ?></strong></p>
                                <p class="epl-location">Duration <?php echo $tour_duration; ?></p>
                                <p>
                                    <strong>DATE:</strong><br>
                                    <?php echo do_shortcode('[event]#j #M #Y #@_{ \u\n\t\i\l j M Y}[/event]'); ?>
                                    <br>
                                    <?php echo do_shortcode('[event]#_EVENTTIMES[/event]'); ?>
                                </p>
                                <br>
                                <h2>BDT <?php echo $tour_price; ?></h2>
                            </div>
                        </article>
                        <?php
                    }
                }
            }
        } else{ ?>

            <div class="row no-term-select-4-compare mx-0 flex-column">
                <?php echo get_template_part('global-templates/compare', 'filterform');?>
                <h4 class="text-center">You haven't select any location from the list</h4>
            </div>

        <?php } } else{ ?>
            <?php echo get_template_part('global-templates/compare', 'filterform'); ?>
        <?php } ?>
    </div>
</section>

<div class="row mt-auto"></div>
<?php get_footer(); ?>