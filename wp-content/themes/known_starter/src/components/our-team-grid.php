<?php

echo '<div id="team-grid">';
echo '<div class="inner">';

$args = array(
  'post_type' => 'team_member',
  'posts_per_page' => -1,
  'orderby' => 'menu_order',
  'post_status' => 'publish'
);

$team_query = new WP_Query($args);

if( $team_query->have_posts() ) :
  $rowCount = 1;
  $i = 1;
  while( $team_query->have_posts() ) : $team_query->the_post();
    $image = get_field('hero_image');
    $position = get_field('position');
    $name = get_the_title();
    $blurb = get_field('bio_blurb');
    $linkedIn = get_field('linkedin_url');
    $path = get_the_permalink();

    if($i == 1){
      echo '<div class="row">';
    } ?>

    <div class="photo-block <?php if($rowCount % 2 == 0){echo ', right';}?>"><?php
      if($image){
        echo '<div class="image-wrapper">';
        echo wp_get_attachment_image($image, 'full');
        echo '</div>';
      }
    echo '</div><!-- .photo-block -->';

    echo '<div class="content-block">';
      echo '<div class="content-inner">';
        if($position){
          echo '<p class="title">'. $position .'</p>';
        }

        if($name){
          echo '<p class="header">'. $name .'</p>';
        }

        if($blurb){
          echo '<p class="blurb">'. $blurb .'</p>';
        }

        echo '<div class="button-container">';
          if($linkedIn){
            echo '<a class="linkedIn" href="'. $linkedIn .'">';
            echo 'in'; // add svg here
            echo '</a><!-- .linkedIn -->';
          }

          echo '<a class="profile-button" href="'. $path .'">';
          echo '<span>View Profile</span>';
          echo '</a>';
        echo '</div><!-- .button-container-->';

      echo '</div><!-- .content-inner -->';
    echo '</div><!-- .content-block-->';

    $i++;

    if($i == 2){
      echo '</div><!-- .row -->';
      $i = 1;
      $rowCount++;
    }
  endwhile; // team query have posts
  wp_reset_postdata();
endif; // team query have posts

echo '</div><!-- .inner -->';
echo '</div><!-- #team-grid-->';


?>
