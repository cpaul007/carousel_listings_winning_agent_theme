<?php //* Don't include this opening PHP tag

//* Add this code in front-page.php file
add_action( 'wp_enqueue_scripts', 'wap_front_page_enqueue_scripts' );
function wap_front_page_enqueue_scripts() {
  global $wp_widget_factory;
  
  if ( is_active_widget( false, false, $wp_widget_factory->widgets[Extended_AgentPress_Featured_Listings_Widget]->id_base, true ) ) {
    wp_enqueue_style( 'bxslider-css', get_bloginfo( 'stylesheet_directory' ) . '/jquery.bxslider.css' );
    wp_enqueue_script( 'bxslider-js', get_bloginfo( 'stylesheet_directory' ) . '/js/jquery.bxslider.min.js', array(), '1.0.0' );
    wp_enqueue_script( 'easing-js', get_bloginfo( 'stylesheet_directory' ) . '/js/jquery.easing.1.3.js', array(), '1.0.0' );
    wp_enqueue_script( 'listings-slider', get_bloginfo( 'stylesheet_directory' ) . '/js/listings-slider.js', array(), '1.0.0' );
  }
}
