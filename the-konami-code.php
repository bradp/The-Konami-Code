<?php
/*
 Plugin Name: The Konami Code
 Plugin URI: 
 Description: Easily add easter eggs to your site, with class
 Author: AaronHolbrook and BradParbs
 Version: 1.0
 Author URI: 
 */

// Derive the current path
$plugin_path = plugin_dir_url(__FILE__);


function tkc_enqueue() {
  global $plugin_path;
  wp_enqueue_script('jquery');
  wp_enqueue_script('konami', $plugin_path . 'js/konami.js', 'jquery');
}
add_action('wp_enqueue_scripts', 'tkc_enqueue');

function tkc_engage() {
  ?><script type="text/javascript">
      jQuery(document).ready(function($){
        $(window).konami(function(){
          alert('Konami Code Activated');
        });
      });
    </script><?php 
}
add_action('wp_footer', 'tkc_engage');
