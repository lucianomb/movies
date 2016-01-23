<?php
/**
 * Plugin Name: Movies for Moxie
 * Plugin URI: http://www.lucianomb.com.br/moxie
 * Description: The coolest movie catalog
 * Version: 1.0.0
 * Author: Luciano M. Baldicerotti
 * Author URI: http://www.lucianomb.com.nr
 * License: Commercial
 */

class Movies_For_Moxie_Plugin {
 
  /**
   * Initializes the plugin.
   */
  public function __construct() {
    // Register the CPT Movies
    add_action('init', array($this, 'cpt_movies' ));
    // Add movies meta box
    add_action('add_meta_boxes', array($this, 'add_movies_meta_box'));
  }

  /**
   * Register the CPT Movies
   */
  function cpt_movies() {
    register_post_type( 'movies',
      array(
        'labels' => array(
          'name' => __( 'Movies' ),
          'singular_name' => __( 'Movie' )
        ),
        'menu_icon' => 'dashicons-editor-video',
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'movies')
      )
    );
  }

  /**
   * Add a meta box called 'Movie Details'
   */
  function add_movies_meta_box() {
    add_meta_box('movie_details', 'Movie Details', array($this, 'show_movie_details_meta_box'), 'movies', 'normal', 'high');
  }

  /**
   * Show the 'Movie Details' meta box
   */
  function show_movie_details_meta_box() {
    global $post;

    // get values for each field
    $poster_url = get_post_meta($post->ID, 'poster_url', true);
    $rating = get_post_meta($post->ID, 'rating', true);
    $year = get_post_meta($post->ID, 'year', true);
    $description = get_post_meta($post->ID, 'description', true);

    // Nonce for verification  
    echo '<input type="hidden" name="movie_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';  

    // add a table to structure the form
    echo '<table class="form-table">';   
    
    // Movie poster URL      
    echo '<tr>
    <th><label for="poster_url">Poster URL</label></th>
    <td><input type="url" name="poster_url" id="poster_url" value="' . $poster_url . '"/>
    <span class="description">Recommended size: <strong>410x607px</strong></span></td>
    </tr>';
    
    // Rating      
    echo '<tr>
    <th><label for="rating">Rating</label></th>
    <td><input type="number" name="rating" id="rating" min="0" max="100" value="' . $rating . '"/>
    <span class="description">A number between <strong>0</strong> and <strong>100</strong></span></td>
    </tr>';
    
    // Year of release      
    echo '<tr>
    <th><label for="year">Year of Release</label></th>
    <td><input type="number" name="year" id="year" max="9999" value="' . $year . '"/></td>
    </tr>';
    
    // Short description
    echo '<tr>
    <th><label for="description">Short Description</label></th>
    <td>';
    
    wp_editor($description, 'description', array('media_buttons' => false, 'teeny' => true, 'textarea_rows' => 4, 'quicktags' => false));

    echo '</td></tr>';
    
    // close the table  
    echo '</table>';
  }

   

}
 
// Initialize the plugin
$movies_for_moxie_plugin = new Movies_For_Moxie_Plugin();