<?php

if(get_post_type() == 'resource'){
  $args = array(
    'post_type' => 'resource',
    'posts_per_page' => 3,
    'post_status' => 'publish'
  );
// } else {
//   // $offset = $_GET['offset'];
//   //
//   // $args = array(
//   //   'post_type' => 'resource',
//   //    'orderby' => 'date',
//   //    'order' => 'DESC',
//   //    'posts_per_page' => 6,
//   //    'offset' => $offset,
//   //    //'post__not_in' => $featuredPostIds,
//   //    'post_status' => 'publish'
//   // );

//TODO Fix ajax
//
// }

$resourcequery = new WP_Query( $args );

  if ( $resourcequery->have_posts() ) {

    echo '<div id="article-grid">';

      echo '<div id="articles-header"><p>Articles</p></div>';
      echo '<div id="grid-inner">';

      if(get_post_type() == 'resource'){

        echo '<div class="row">';

        while( $resourcequery->have_posts() ) {
          $resourcequery->the_post();

          $image = get_field('cover_photo');
          $title = get_the_title();
          $permalink = get_permalink();
          $pdf = get_field('pdf');

          echo '<div class="article-wrapper">';
            if($image){
              echo wp_get_attachment_image($image, 'full');
            };

            echo '<div class="text-wrapper">';
              if($title){
                echo '<p class="header">'. $title .'</p>';
              }

              echo '<div class="button">';
              echo '<a href="'. $permalink .'">';
                if($pdf){
                  echo 'Download PDF';
                } else {
                  echo 'Read Article';
                }
              echo '</a>';
              echo '</div><!-- .button -->';
            echo '</div> <!-- .text-wrapper -->';

          echo '</div> <!-- .article-wrapper -->';

        } //endwhile
        wp_reset_postdata();
        echo '</div><!-- .row -->';

      } else {
        // code for ajax and grid here
      }

          // $i = 0;
          //
          // while ( $resourcequery->have_posts() ) {
          //     $resourcequery->the_post();
          //     // setup_postdata($resourcequery);
          //     $image = get_field('cover_photo');
          //     $title = get_the_title();
          //     $permalink = get_permalink();
          //     $pdf = get_field('pdf');
          //     $totalCounter = 0;
          //     $total = wp_count_posts('resource')->publish;

              // if($i == 0){
              //   echo '<div class="row">';
              // }
              //
              // echo '<div class="article-wrapper">';
              // echo '<a href="'. $permalink .'">';
              // if($image){
              //   echo wp_get_attachment_image($image);
              // };
              // echo '</a>';
              // echo '<div class="text-wrapper">';
              // echo '<p class="header">'. $title .'</p>';

          //     echo '<div class="button">';
          //     echo '<a href="'. $permalink .'">';
          //       if($pdf){
          //         echo 'Download PDF';
          //       } else {
          //         echo 'Read Article';
          //       }
          //     echo '</a>';
          //     echo '</div><!-- .button -->';
          //
          //     echo '</div> <!-- .text-wrapper -->';
          //     echo '</div> <!-- .article-wrapper -->';
          //     $i++;
          //     $totalCounter++;
          //
          //     if($i === 3 || $totalCounter === $total){
          //       echo '</div><!-- .row -->';
          //       $i = 0;
          //     }
          }; //endwhile
          wp_reset_postdata();

        echo '</div> <!-- #grid-inner -->';

        // echo '<div id="page-counter">';
        // echo '<button id="prev"> < </button><!-- #prev-btn -->';
        // echo '<button id="next"> > </button><!-- #next-btn -->';
        // echo '</div><!-- #page-counter -->';

      echo '</div> <!-- #article-grid -->';
  }; // endif

?>
