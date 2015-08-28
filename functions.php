<?php //* Don't include this opening PHP tag

/**********************************************************
*
*  Add this following codes in your functions.php file
*
***********************************************************/

//* Adding "widget-wrap"  and "listing-wrap" markup 
add_action( 'eaplw_entry_header', 'eaplw_wap_listings_markup_open', 2, 2 );
add_action( 'eaplw_entry_footer', 'eaplw_wap_listings_markup_close', 20, 2 );
function eaplw_wap_listings_markup_open( $instance, $widget_id ) {
  if( is_front_page() )
    echo '<div class="widget-wrap"><div class="listing-wrap">' . "\n";
} 

function eaplw_wap_listings_markup_close( $instance, $widget_id ) {
  if( is_front_page() )
    echo '</div></div>' . "\n";
}

//* Display listing thumbnail
remove_action( 'eaplw_before_entry_content', 'eaplw_do_listing_image', 7, 2 );
add_action( 'eaplw_before_entry_content', 'eaplw_do_wap_listing_image', 7, 2 );
function eaplw_do_wap_listing_image( $instance, $widget_id ) {
  if( empty( $instance['show_featured_image'] ) )
    return;
    
  $img = genesis_get_image( array( 'size' => $instance['feat_image_size'], 'attr' => array( 'class'=> 'attachment-properties' ) ) );
  //* Getting fallback image
  if( empty( $img ) && ! empty( $instance['fallback_image'] ) ) {
    $img = wp_get_attachment_image( absint($instance['fallback_image']), $instance['feat_image_size'], false, 
                                    array(
                                        'class' => "attachment-{$instance[fallback_image]} fallback-image attachment-properties",
                                        'alt'   => trim(strip_tags( get_post_meta(absint($instance['fallback_image']), '_wp_attachment_image_alt', true) ))
                                  ));
  }
  
  printf( '<a href="%s">%s</a>', get_permalink(), $img );
}

add_action('eaplw_before_entry', 'eaplw_slides_wrap', 10, 2);
function eaplw_slides_wrap( $instance, $widget_id ) {
  global $listings;
  
  if( $listings->current_post % 2 == 0 && is_front_page() )
    echo '<div class="slides">' . "\n";
}

add_action('eaplw_after_entry', 'eaplw_slides_wrap_close', 10, 2);
function eaplw_slides_wrap_close( $instance, $widget_id ) {
  global $listings;
  
  if( $listings->current_post % 2 == 1 && is_front_page() )
    echo '</div>' . "\n";
}
