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
  do_action('load_konami_scripts');

  wp_enqueue_script('raptorize', $plugin_path . 'eggs/raptor/jquery.raptorize.1.0.js', 'jquery');

}
add_action('wp_enqueue_scripts', 'tkc_enqueue');

function tkc_engage() {
  ?><script type="text/javascript">
      jQuery(document).ready(function($){
        $('.button').raptorize({
          'enterOn' : 'click',
        });

        $(window).konami(function(){
          alert('Konami Code Activated');
          <?php do_action('easter_egg_activate'); ?>
        });
      });
    </script>

    <a href="#" class="button">RAPTOR</a>
    
    <?php

}
add_action('wp_footer', 'tkc_engage');

require_once('eggs/raptor/raptorize.php');