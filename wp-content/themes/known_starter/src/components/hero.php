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


<div class="hero <?php if($blurbButton){echo 'has-blurb';} if($greyBg){echo ' grey-bg';}?>">
  <div class="inner <?php echo $imagePos == "Left" ? "image-left" : "image-right";?>">
    <?php if(!is_page('290')){ // there is no image in the hero for the resources page
      if($image){
        ?>
        <div class="hero-img-wrapper">
          <?php echo wp_get_attachment_image($image, 'full'); ?>
          <svg class="photo-curve-vert" viewBox="0 0 112 650">
            <path d="M7,325A553.11,553.11,0,0,1,112,.08V0H0V650H112v-.08A553.11,553.11,0,0,1,7,325Z"/>
          </svg>
          <svg class="photo-curve-horiz" viewBox="0 0 320 54">
            <use xlink:href="#photo-curve-horiz"></use>
          </svg>
        </div> <!-- .hero-img-wrapper -->
      <?php }
    }
    ?>

    <div class="hero-text-wrapper">

      <?php if(is_front_page()) {
        if($blurbText){
          echo '<div class="logo" id="home-logo"><svg id="logo" width="176px" height="39px" viewBox="0 0 176 39"><use xlink:href="#color-logo"></use></svg></div>';
        }
      } else {
        echo '<p class="hero-title '. ($imagePos == 'Left' ? 'div-left' : 'div-right') .'">'. get_the_title() . '</p>';
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
      <div class="orange-circle trigger_circle_grow <?php echo $imagePos == "Left" ? "circle-right" : "circle-left";?>">
      </div> <!-- .orange-circle -->
    <?php }

  if($blurbButton){
    echo '<div class="blurb-button">';
    echo $blurbText;
    echo '</div>';
  }

echo '</div> <!-- .hero -->';

?>
