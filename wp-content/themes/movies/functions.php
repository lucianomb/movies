<?php
/**
 * Enqueue styles and scripts
 */
function theme_deps() {
  wp_enqueue_style('theme-css', get_template_directory_uri() . '/css/theme.css');
  wp_enqueue_script('angular', get_template_directory_uri() . '/js/angular.min.js', array(), false, true);
  wp_enqueue_script('theme-js', get_template_directory_uri() . '/js/theme.js', array(), false, true);
}

add_action('wp_enqueue_scripts', 'theme_deps');