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
    // Save movies custom fields
    add_action('save_post', array($this, 'save_movie_meta'));
    // Add movies endpoint
    add_action('init', array($this, 'add_movies_endpoint'));
    // Add movies endpoint data
    add_action('template_redirect', array($this, 'add_movies_endpoint_data'));
    // Delete catalog cache
    add_action('save_post', array($this, 'remove_catalog_cache'));
    // Enqueue catalog scripts and styles
    add_action('wp_enqueue_scripts', array($this, 'enqueue_catalog_scripts'));

    // Add shortcode for showing the catalog
    add_shortcode('list-movies', array($this, 'render_catalog_html') );
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
        'rewrite' => array('slug' => 'movies'),
        'supports' => array('title')
      )
    );
  }

  /**
   * Add a meta box called 'Movie Details'
   */
  function add_movies_meta_box() {
    add_meta_box('movie_details', __('Movie Details'), array($this, 'show_movie_details_meta_box'), 'movies', 'normal', 'high');
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
    <th><label for="poster_url">' . __('Poster URL') . '</label></th>
    <td><input type="url" name="poster_url" id="poster_url" value="' . $poster_url . '"/>
    <span class="description">' . __('Recommended size:') . '<strong>410x607px</strong></span></td>
    </tr>';
    
    // Rating      
    echo '<tr>
    <th><label for="rating">' . __('Rating') . '</label></th>
    <td><input type="number" name="rating" id="rating" min="0" max="10" step=".1" value="' . $rating . '"/>
    <span class="description">' . __('A number between <strong>0</strong> and <strong>10</strong>') . '</span></td>
    </tr>';
    
    // Year of release      
    echo '<tr>
    <th><label for="year">' . __('Year of Release') . '</label></th>
    <td><input type="number" name="year" id="year" max="9999" value="' . $year . '"/></td>
    </tr>';
    
    // Short description
    echo '<tr>
    <th><label for="description">' . __('Short Description') . '</label></th>
    <td>';
    
    wp_editor($description, 'description', array('media_buttons' => false, 'teeny' => true, 'textarea_rows' => 4, 'quicktags' => false));

    echo '</td></tr>';
    
    // close the table  
    echo '</table>';
  }

  /**
   * Save the movie details
   */
  function save_movie_meta($post_id) {   
    
    // verify nonce
    if (!wp_verify_nonce($_POST['movie_meta_box_nonce'], basename(__FILE__))) {
      return $post_id;
    }

    // check if this is an autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
      return $post_id;
    }

    // check permissions
    if ('movies' == $_POST['post_type']) {
      if (!current_user_can('edit_page', $post_id)) {
        return $post_id;
      }
    } elseif (!current_user_can('edit_post', $post_id)) {
      return $post_id;
    }  

    // get the old values
    $old_poster_url = get_post_meta($post_id, "poster_url", true);
    $old_rating = get_post_meta($post_id, "rating", true);
    $old_year = get_post_meta($post_id, "year", true);
    $old_description = get_post_meta($post_id, "description", true);

    // get the new values
    $poster_url = $_POST['poster_url'];
    $rating = $_POST['rating'];
    $year = $_POST['year'];
    $description = $_POST['description'];

    // update the poster url
    if ($poster_url && $poster_url != $old_poster_url) {
      // if the value existed and was changed, update the meta
      update_post_meta($post_id, "poster_url", $poster_url);
    } elseif ($poster_url == '' && $old_poster_url) {
      // if the value is empty and there's an old value, delete the meta from db
      delete_post_meta($post_id, "poster_url", $old_poster_url);
    }

    // update the rating
    if ($rating && $rating != $old_rating) {
      // if the value existed and was changed, update the meta
      update_post_meta($post_id, "rating", $rating);
    } elseif ($rating == '' && $old_rating) {
      // if the value is empty and there's an old value, delete the meta from db
      delete_post_meta($post_id, "rating", $old_rating);
    }

    // update the year
    if ($year && $year != $old_year) {
      // if the value existed and was changed, update the meta
      update_post_meta($post_id, "year", $year);
    } elseif ($year == '' && $old_year) {
      // if the value is empty and there's an old value, delete the meta from db
      delete_post_meta($post_id, "year", $old_year);
    }

    // update the description
    if ($description && $description != $old_description) {
      // if the value existed and was changed, update the meta
      update_post_meta($post_id, "description", $description);
    } elseif ($description == '' && $old_description) {
      // if the value is empty and there's an old value, delete the meta from db
      delete_post_meta($post_id, "description", $old_description);
    }

  }
   
  /**
   * Movies API endpoint
   */
  function add_movies_endpoint() {
    add_rewrite_rule( 'movies.json', 'index.php?movies=1', 'top' );
  }

  /**
   * Movies API endpoint data
   */
  function add_movies_endpoint_data() {
    global $wp_query;

    $movies = $wp_query->get('movies');

    if (!$movies) {
      return;
    }

    // verify if there's a cached version of the catalog
    $movies_data = get_transient('catalog_movies');

    // if there's no cached version, query the results
    if (!$movies_data) {
      
      $movies_data = array(
        'data' => array()
      );

      // query the movies
      $args = array(
        'post_type' => 'movies',
        'posts_per_page' => 100
      );
      $movies_query = new WP_Query($args);

      // get data for each movie
      if ($movies_query->have_posts()) : while ($movies_query->have_posts()) : $movies_query->the_post();

        $movies_data['data'][] = array(
          'id' => $movies_query->post->ID,
          'title' => get_the_title(),
          'poster_url' => get_post_meta($movies_query->post->ID, 'poster_url', true),
          'rating' => get_post_meta($movies_query->post->ID, 'rating', true),
          'year' => get_post_meta($movies_query->post->ID, 'year', true),
          'short_description' => get_post_meta($movies_query->post->ID, 'description', true)
        );

      endwhile; wp_reset_postdata(); endif;

      // cache results
      set_transient('catalog_movies', $movies_data);

    }

    // generate json
    status_header( 200 );
    wp_send_json($movies_data);
    die();

  }

  /**
   * Delete the catalog cache
   */
  function remove_catalog_cache() {
    delete_transient('catalog_movies');
  }

  /**
   * Render catalog HTML
   */
  function render_catalog_html() {
    return '<div ng-controller="MoviesCtrl">
      <div class="dynamic-bg" ng-style="{\'background-image\': \'url(\' + bg.currentMovie + \')\'}" ng-hide="bg.bgHidden"></div>
      <h2 ng-if="catalog.length <= 0">No movies were found! Please come back later! ;)</h2>
      <ul class="catalog" ng-if="catalog.length > 0">
        <li ng-repeat="movie in catalog">
          <a href="#" class="movie-thumb" ng-mouseenter="bg.currentMovie = movie.poster_url; bg.bgHidden = false" ng-mouseleave="bg.bgHidden = true">
            <div class="bg">
              <img ng-src="{{movie.poster_url}}" alt="{{movie.title}}">
              <div class="extra">
                <span>{{movie.year}} - Rating: {{movie.rating}}</span>
                <p class="title">{{movie.title}}</p>
              </div>
              <div class="description"><p ng-bind-html="getHtml(movie.short_description)"></p></div>
            </div>
          </a>
        </li>
      </ul>
    </div>';
  }

  /**
   * Enqueue styles and scripts
   */
  function enqueue_catalog_scripts() {
    wp_enqueue_style('catalog-css', plugins_url( 'css/catalog.css', __FILE__ ));
    wp_enqueue_script('angular', plugins_url( 'js/angular.min.js', __FILE__ ), array(), false, true);
    wp_enqueue_script('catalog-js', plugins_url( 'js/catalog.js', __FILE__ ), array(), false, true);
  }

}
 
// Initialize the plugin
$movies_for_moxie_plugin = new Movies_For_Moxie_Plugin();