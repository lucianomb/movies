<?php
  function load_styles() {
    wp_enqueue_style('theme-css', get_stylesheet_uri());
  }

  add_action('wp_enqueue_scripts', 'load_styles');
?>