<?php

add_action( 'wp_enqueue_scripts', 'eventv2_scripts' );
function eventv2_scripts() {
    wp_enqueue_style('parent-theme-style', get_parent_theme_file_uri('/css/theme.min.css') );
    wp_enqueue_style('parent-style', get_parent_theme_file_uri('/style.css') );
    wp_enqueue_style('flexdatalist', get_theme_file_uri('/css/jquery.flexdatalist.min.css'), [], 2.2, all );
    wp_enqueue_style('styles', get_theme_file_uri('/style.css'), [], filemtime(get_theme_file_path('/style.css')), 'all');

    wp_enqueue_script('jquery-3', 'https://code.jquery.com/jquery-3.3.1.min.js', [], 3, true);
    wp_enqueue_script('imagesloaded', 'https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js', ['jquery-3'], 4, true);
    wp_enqueue_script('flexdatalist', get_theme_file_uri('/js/jquery.flexdatalist.min.js'), ['jquery-3'], 4, true);
    wp_enqueue_script('child-js', get_theme_file_uri('/theme.js'), ['jquery-3'], filemtime(get_theme_file_path('/theme.js')), true);
}