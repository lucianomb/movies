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

  }

  /**
   * CPT Movies
   */
  function cpt_movies() {
  }
   

}
 
// Initialize the plugin
$movies_for_moxie_plugin = new Movies_For_Moxie_Plugin();