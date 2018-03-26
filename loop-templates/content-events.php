<?php
$e_post_type = get_post_meta(get_the_ID(), '_tcm_event_post_type', true);

if( $e_post_type == 'event' )
    $e_post_cls = 'loop-type-event';
elseif( $e_post_type == 'tour package' )
    $e_post_cls = 'loop-type-tour';
elseif( $e_post_type == 'movie' )
    $e_post_cls = 'loop-type-movie';
else
    $e_post_cls = '';

$e_hot_deal = get_post_meta(get_the_ID(), '_tcm_hot_deal', true);
$program_for = get_post_meta( get_the_ID(),  '_tcm_day_count', true );
if( $program_for == '1' )
    $tour_duration = '1 Day';
else
    $tour_duration = '' . $program_for . ' Days';

// Tour Price
$tour_price_html = do_shortcode('[event]#_EVENTPRICEMIN[/event]');
$tour_price_array = explode('.', $tour_price_html);
$tour_price = $tour_price_array[0];
if( $tour_price != 0 )
    $tour_price_text = '<p class="epl-date-n-times"><strong>BDT '. $tour_price .'</strong> per person</p>';
else
    $tour_price_text = '<p class="epl-date-n-times">Booking Closed</p>';
?>

<article <?php post_class('card event-post-on-loop '. $e_post_cls);?> >

    <a
        href="<?php the_permalink(); ?>"
        class="card-img-top"
        <?php if( has_post_thumbnail() ): ?>
            style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'e-thumbnail'); ?>);"
        <?php endif; ?>
    >

        <?php if( !has_post_thumbnail() ): ?>
            No Image Found!
        <?php endif; ?>

        <span class="thumbnail-photo-frame">
            <span class="top-border"></span>
            <img src="<?php echo get_theme_file_uri('/images/logo-white.svg');?>" alt="Ticket Chai - Logo white" class="photo-frame-logo">
        </span>

        <?php if( $e_post_type == 'tour package' && $e_hot_deal == 'on' && $tour_price != 0 ): ?>
        <span class="hot-deal">
            <img src="<?php echo get_theme_file_uri('/images/hot-deal.svg'); ?>" alt="">
            <span class="hot-deal-text"><?php echo get_theme_mod('tcevents_hot_deal_text', 'Hot Deal'); ?></span>
            <span class="hot-deal-price"><span>৳</span><?php echo $tour_price; ?></span>
        </span>
        <?php endif; ?>

        <span class="btn btn-primary w-100">View Details</span>
    </a>
    <div class="card-body">
        <a href="<?php the_permalink(); ?>" class="epl-title"><?php the_title(); ?></a>
        <?php if( $e_post_type == 'event' ): ?>
        <p class="epl-location">
            <?php echo do_shortcode('[event]{has_location}#_LOCATIONADDRESS{/has_location}[/event]');?>
            <?php echo do_shortcode('[event]{has_location}, #_LOCATIONSTATE{/has_location}[/event]');?>
        </p>
        <p class="epl-date-n-times">
            <?php echo do_shortcode('[event]#j #M #Y #@_{ \u\n\t\i\l j M Y}[/event]');?>
            <?php echo do_shortcode('[event]{has_time}, #_EVENTTIMES{/has_time}[/event]');?>
        </p>
        <?php endif; ?>
        <?php if( $e_post_type == 'tour package' ): ?>
            <p class="epl-location">Duration <?php echo $tour_duration; ?></p>
            <?php echo $tour_price_text; ?>
        <?php endif; ?>
    </div>
</article>