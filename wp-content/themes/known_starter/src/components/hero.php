<?php

$greyBg = get_sub_field('grey_background');
$heroHeader = get_sub_field('hero_header');
$heroContent = get_sub_field('text_content');
$blueText = get_sub_field('blue_text');
$image = get_sub_field('main_image');
$imagePos = get_sub_field('main_image_position');
$orangeCircle = get_sub_field('orange_circle');
$blurbButton = get_sub_field('blurb_button');
$blurbText = get_sub_field('blurb_button_text');

?>


<div class="hero <?php if($blurbButton){echo 'has-blurb';}?>">
  <div class="inner <?php echo $imagePos == "Left" ? "image-left" : "image-right";?>">
    <?php if(!is_page('290')){ // there is no image in the hero for the resources page
      if($image){
        echo '<div class="hero-img-wrapper">';
        echo wp_get_attachment_image($image, 'full');
        echo '<svg class="photo-curve-vert" viewBox="0 0 112 650">
          <use href="#photo-curve-vert"></use>
        </svg>';
        echo '<svg class="photo-curve-horiz" viewBox="0 0 320 54"><use href="#photo-curve-horiz"></use></svg>';
        echo '</div> <!-- .hero-img-wrapper -->';
      }
    }

    echo '<div class="hero-text-wrapper">';

      if(is_front_page()) {
        if($blurbText){
          echo '<div class="logo"><svg id="logo" width="176px" height="39px" viewBox="0 0 176 39"><use href="#color-logo"></use></svg></div>';
        }
      } else {
        echo '<p class="hero-title trigger_line '. ($imagePos == 'Left' ? 'div-left' : 'div-right') .'">'. get_the_title() . '</p>';
      }

      if($heroHeader){
        echo '<p class="header">'. $heroHeader. '</p>';
      }

      if($heroContent){ ?>
        <div class="subheader <?php if($blueText){echo 'blue';}?>"> <?php
        echo $heroContent;
        echo '</div>';
      }

    echo '</div><!-- .hero-text-wrapper -->';
    echo '</div><!-- .inner -->';

    if($orangeCircle){ ?>
      <div class="orange-circle <?php echo $imagePos == "Left" ? "circle-right" : "circle-left";?>"> <?php
      echo '</div> <!-- .orange-circle --> ';
    }

  if($blurbButton){
    echo '<div class="blurb-button">';
    echo $blurbText;
    echo '</div>';
  }

echo '</div> <!-- .hero -->';

?>
