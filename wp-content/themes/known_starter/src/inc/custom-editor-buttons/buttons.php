<?php
////////////////// BX SLIDER BLOG GALLERY BUTTON ///////////////////////////////

add_shortcode('gallery-slider', 'customGalSlider');
function customGalSlider( $atts ){
  extract(shortcode_atts(array(
    'sliderimages' => ''
  ), $atts));
  if( !empty($atts['sliderimages'] )){
    $imagesArr = explode(', ', $atts['sliderimages']);
    $imagesArr = array_slice($imagesArr, 0, 5);
    $args = array(
      'post__in'       => $imagesArr,
      'post_type'      => 'attachment',
      'posts_per_page' => 5,
      'post_status'	   => 'inherit'
    );
    $images = new WP_Query( $args );
    if( $images->have_posts()):
      $html = '<div class="blog-bxslider-wrapper load-delay">';
      $html .= '<ul class="blog-bxslider">';
      while($images->have_posts()) : $images->the_post();
      $image = wp_get_attachment_image_src( get_post_thumbnail_id( $images->post->ID ), 'full');
      $caption = get_the_excerpt($images->post->ID);
      $html .= '<li><div><img src="'. $image[0] .'" /></div>';
      if($caption){
        $html .= '<span class="wp-caption-text">'. $caption .'</span>';
      }
      $html .= '</li>';
      endwhile;
      $html .= '</ul><!-- #blog-bxslider-->';
      $html .= '</div><!-- #blog-bxslider-wrapper-->';
    endif;
    wp_reset_query();
    return $html;
  }
}


// add buttons
add_action( 'init', 'customEditorButtons' );
function customEditorButtons() {
  add_filter( 'mce_external_plugins', 'customEditorAddButtons' );
  add_filter( 'mce_buttons', 'customEditorRegister' );
}
function customEditorAddButtons( $plugin_array ) {
  $plugin_array['custom-buttons'] = get_template_directory_uri() . '/inc/custom-editor-buttons/custom-buttons.js';
  return $plugin_array;
}
function customEditorRegister( $buttons ) {
  array_push( $buttons, 'sliderimages' );
  return $buttons;
}

?>
