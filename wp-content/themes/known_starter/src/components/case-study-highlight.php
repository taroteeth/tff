<?php

$greyBg = get_sub_field('grey_background');
$imagePos = get_sub_field('image_position');
$image = get_sub_field('main_image');
$studyTitle = get_sub_field('case_study_title');
$blockQuote = get_sub_field('block_quote');
$byline = get_sub_field('quote_byline');

?>



<div class="case-study-highlight-module <?php if($imagePos === 'Left'){echo 'left';}?>"> <?php
  echo '<div class="inner" >';
  echo '<div class="columns">';
    if($image){
      echo '<div class="bubble-image-wrapper trigger_bubble_grow">';
      echo wp_get_attachment_image($image, 'full');
      echo '</div> <!-- .bubble-image-wrapper -->';
    }

    echo '<div class="text-wrapper">';

      if($studyTitle){ ?>
        <p class="title trigger_fade"> <?php
        echo $studyTitle;
        echo '</p>';
      }

      if($blockQuote){
        echo '<div class="block-quote trigger_fade">'. $blockQuote .'</div>';
      }

      if($byline){
        echo '<p class="byline trigger_fade">'. $byline .'</p>';
      }

      button();

    echo '</div><!-- .text-wrapper -->';
    echo '</div><!-- .columns -->';
    echo '</div><!-- inner -->';

echo '</div> <!-- .case-study-highlight-module -->';

?>
