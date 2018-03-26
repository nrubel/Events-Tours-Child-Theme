<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package tcevents
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'tcevents_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>

<footer class="tce-footer row">
    <div class="container">
        <div class="row foot-conts mx-0 flex-column">
            <div class="row justify-content-between flex-column flex-lg-row">
                <div class="foot-div order-1 d-lg-none">
                    <a href="#wrapper-navbar" class="go-top"><img src="<?php echo get_theme_file_uri('/images/arrow-up.svg'); ?>" alt="">Go to top</a>
                </div>
                <?php
                // usage
                wp_nav_menu( array(
                    'theme_location' => 'footer', // we've registered a theme location in functions.php
                    'container' => false, // this is usually a div outside the menu ul, we don't need it
                    'items_wrap' => '<nav id="%1$s" class="%2$s">%3$s</nav>', // replacing the ul with nav
                    //'echo' => false, // don't display it just yet, instead we're storing it in the variable $cleanermenu
                    'walker' => new Description_Walker,
                    'menu_class' => "foot-div foot-menu Menu order-2"
                ));

                ?>
                <div class="foot-div order-4 order-lg-3 copyright-texts">
                    <span class="d-flex d-md-inline-flex">Copyright &copy; <?php echo get_theme_mod('tcevents_copyrights', '2015 - 2018'); ?>,&nbsp;<a href="<?php echo esc_url(home_url('/'))?>"><?php bloginfo('name');?></a></span><span class="d-none d-lg-inline-flex">&nbsp;&nbsp;|&nbsp;&nbsp;</span><span class="d-flex d-md-inline-flex">All Rights Reserved.</span>
                </div>
                <div class="foot-div social-links-menu order-3 order-lg-5">
                    Follow us
                    <div>
                        <?php get_template_part('/global-templates/social'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108261146-4"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-108261146-4');
</script>

</body>

</html>

