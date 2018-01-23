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


echo '<div id="hero">'; ?>
  <div id="inner" class="<?php echo $imagePos == "Left" ? "image-left" : "image-right";?>"> <?php
    if(!is_page('290')){ // there is no image in the hero for the resources page
      if($image){
        echo '<div id="hero-img-wrapper">';
        echo wp_get_attachment_image($image, 'full');
        echo '</div> <!-- #hero-img-wrapper -->';
      }
    }

    echo '<div id="hero-text-wrapper">';

      if(is_page('6')){
        echo '<svg width="17px" height="17px" viewBox="0 0 17 17"><use xlink:href="#color-logo"></use></svg> ';
      } else { ?>
        <p id="hero-title" class="<?php echo $imagePos == "Left" ? "div-left" : "div-right";?>"> <?php echo get_the_title() ?></p> <?php
      }


      if($heroHeader){
        echo '<p class="header">'. $heroHeader. '</p>';
      }

      if($heroContent){ ?>
        <div id="subheader" class="<?php if($blueText){echo 'blue';}?>"> <?php
        echo $heroContent;
        echo '</div>';
      }

    echo '</div><!-- #hero-text-wrapper -->';
    echo '</div><!-- inner -->';

    if($orangeCircle){ ?>
      <div id="orange-circle" class="<?php echo $imagePos == "Left" ? "circle-right" : "circle-left";?>"> <?php
      echo '</div> <!-- #orange-circle --> ';
    }

  if($blurbButton){
    echo '<div id="blurb-button">';
    echo $blurbText;
    echo '</div>';
  }

echo '</div> <!-- .hero -->';

?>
