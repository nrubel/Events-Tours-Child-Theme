<section class="row feature-blocks d-none d-lg-block">
    <div class="container">
        <div class="row sectitle">
            <h2 class="tc-h1-st">Do You Organize Events or Tours?</h2>
            <h4 class="tc-h2-st">Start selling your products in minutes with ticketchai</h4>
        </div>
        <div class="row fblocks justify-content-center">
            <div class="col-xl-9">
                <div class="row">
                    <div class="col-md-4 fblock">
                        <div class="fb-icon-block"><img src="<?php echo get_theme_file_uri('/img/like.png');?>" alt="Event Promotions"></div>
                        <p>Product Promotions</p>
                    </div>
                    <div class="col-md-4 fblock">
                        <div class="fb-icon-block"><img src="<?php echo get_theme_file_uri('/img/computer.png');?>" alt="Custom Registration Forms"></div>
                        <p>Reach New Audiences</p>
                    </div>
                    <div class="col-md-4 fblock">
                        <div class="fb-icon-block"><img src="<?php echo get_theme_file_uri('/img/taka.png');?>" alt="Fastest Money Clearance"></div>
                        <p>Fastest Money Clearance</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php
            $cpage_id = get_theme_mod('tcevents_contact_page');
            $cpage_url = get_page_link($cpage_id);
            ?>
            <a href="<?php echo esc_url($cpage_url);?>" class="btn btn-primary"><span><strong>Contact us</strong> to sell your products</span></a>
        </div>
    </div>
</section>