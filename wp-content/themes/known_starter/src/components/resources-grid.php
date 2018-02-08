<?php

if(get_post_type() == 'resource'){

  // R E S O U R C E   P O S T   T Y P E

  $args = array(
    'post_type' => 'resource',
    'posts_per_page' => 3,
    'post_status' => 'publish'
  );

  $resourcequery = new WP_Query( $args );

  if ( $resourcequery->have_posts() ) :

    echo '<div id="article-grid">';

      echo '<div id="articles-header"><p>Articles</p></div>';
      echo '<div id="grid-inner">';
      echo '<div class="row">';

      while( $resourcequery->have_posts() ) : $resourcequery->the_post();

      $image = get_field('cover_photo');
      $title = get_the_title();
      $permalink = get_permalink();
      $pdf = get_field('pdf');

       echo '<div class="article-wrapper">';

       if($image) echo wp_get_attachment_image($image, 'full');

       echo '<div class="text-wrapper">';
        if($title) echo '<p class="header">'. $title .'</p>';

        echo '<div class="button">';
        echo '<a href="'. $permalink .'">';
          if($pdf){ echo 'Download PDF';
          } else { echo 'Read Article'; }
        echo '</a>';
        echo '</div><!-- .button -->';
      echo '</div> <!-- .text-wrapper -->';

       echo '</div> <!-- .article-wrapper -->';

     endwhile; // while resourcequery have posts
     wp_reset_postdata();
      echo '</div><!-- .row -->';

  endif; // if resourcequery have posts

} else {

  // K N O W L E D G E   B A S E    P A G E

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

  $totalPosts = ceil($resourcequery->found_posts / 6);

  if ( $resourcequery->have_posts() ) :

    echo '<div id="article-grid" data-total="'. $resourcequery->found_posts .'">';
    echo '<div id="articles-header"><p>Articles</p></div>';
    echo '<div id="grid-inner">';
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
        echo '<div class="row">';
      }

      echo '<div class="article-wrapper">';
      echo '<a href="'. $permalink .'">';
      if($image){
        echo wp_get_attachment_image($image);
      };
      echo '</a>';
      echo '<div class="text-wrapper">';
      echo '<p class="header">'. $title .'</p>';

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
      $i++;
      $totalCounter++;

      if($i === 3 || $totalCounter === $total){
        echo '</div><!-- .row -->';
        $i = 0;
      }

    endwhile; // resourcequery have posts
    wp_reset_postdata(); ?>

    </div>

    <div id="page-counter">
      <button id="prev" class="disable">
        <svg viewbox="0 0 7 14" width="7px" height="14px">
          <use xlink:href="#triangle-left"></use>
        </svg>
      </button>
      <?php for($i = 0; $i < $totalPosts.length; $i++) { ?>
        <button data-page="<?php echo $i ?>" class="page-num">
          <?php echo $i + 1 ?>
        </button>
      <?php } ?>
      <button id="next">
        <svg viewbox="0 0 7 14" width="7px" height="14px">
          <use href="#triangle-right"></use>
        </svg>
      </button>
    </div>

  </div>

  <?php endif; // resourcequery have posts

}

?>
