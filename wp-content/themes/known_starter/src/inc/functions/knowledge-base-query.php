<?php

function knowledge_base_query() {

  $offset = $_GET['offset'];

  $args = array(
    'post_type' => 'resource',
     'orderby' => 'date',
     'order' => 'DESC',
     'posts_per_page' => 6,
     'offset' => $offset,
     //'post__not_in' => $featuredPostIds,
     'post_status' => 'publish'
  );

  $resourcequery = new WP_Query( $args );

  if ( $resourcequery->have_posts() ) :

    $i = 0;

    while( $resourcequery->have_posts() ): $resourcequery->the_post();

      //setup_postdata($resourcequery);
      $image = get_field('cover_photo');
      $title = get_the_title();
      $permalink = get_permalink();
      $pdf = get_field('pdf');
      $totalCounter = 0;
      $total = wp_count_posts('resource')->publish;

      if($i == 0){
        $data .= '<div class="row">';
      }

      $data .= '<div class="article-wrapper">';
      $data .= '<a href="'. $permalink .'">';
      if($image){
        echo wp_get_attachment_image($image);
      };
      $data .= '</a>';
      $data .= '<div class="text-wrapper">';
      $data .= '<p class="header">'. $title .'</p>';

      $data .= '<div class="button">';
      $data .= '<a href="'. $permalink .'">';
        if($pdf){
          $data .= 'Download PDF';
        } else {
          $data .= 'Read Article';
        }
      $data .= '</a>';
      $data .= '</div><!-- .button -->';

      $data .= '</div> <!-- .text-wrapper -->';
      $data .= '</div> <!-- .article-wrapper -->';
      $i++;
      $totalCounter++;

      if($i === 3 || $totalCounter === $total){
        $data .= '</div><!-- .row -->';
        $i = 0;
      }

    endwhile; // resourcequery have posts

  endif;

  print_r($data);

  wp_reset_postdata();

  exit();

}
add_action('wp_ajax_nopriv_knowledge_base_query', 'knowledge_base_query');
add_action('wp_ajax_knowledge_base_query', 'knowledge_base_query');

?>
