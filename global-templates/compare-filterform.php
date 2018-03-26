<!--Filter-->
<?php
    // Get Current page url
    global $wp;
    $current_page = home_url( $wp->request );
?>
<h2 class="tour-compare-title text-center">Compare Tours</h2>
<form action="<?php echo esc_url($current_page); ?>" class="compare-filters input-group align-items-center mb-5" method="GET">
    <input type='text'
           placeholder='Type, select and press filter ...'
           class='flexdatalist form-control form-control-lg rounded-0'
           data-search-in='name'
           data-visible-properties='["name","description"]'
           data-value-property='id'
           data-text-property='{name}'
           data-min-length='1'
           data-selection-required='true'
           data-data="<?php echo home_url('/wp-json/wp/v2/tour_location'); ?>"
           value=''
           name='tour_locs'>
    <div class="input-group-append">
        <input type="submit" value="Filter" class="btn btn-primary rounded-0 text-white btn-lg px-5">
    </div>
</form>