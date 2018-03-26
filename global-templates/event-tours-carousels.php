<section class="row latest-events-tours">
    <div class="container">

        <div class="owl-icons"
             data-prev="<?php echo get_theme_file_uri('/img/left.svg');?>"
             data-next="<?php echo get_theme_file_uri('/img/right.svg');?>"
        ></div>

        <!--Tour Carousel-->
        <?php //get_template_part('global-templates/tour', 'carousel'); ?>
        <!--Event Carousel-->
        <?php get_template_part('global-templates/event', 'carousel'); ?>

    </div>
</section>