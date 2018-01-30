<?php

$greyBg = get_sub_field('grey_background');
$image = get_sub_field('main_image');
$studyTitle = get_sub_field('case_study_title');
$blockQuote = get_sub_field('block_quote');
$byline = get_sub_field('quote_byline');



echo '<div class="case-study-highlight-module">';
  echo '<div class="inner" >';
  echo '<div class="columns">';
    if($image){
      echo '<div class="bubble-image-wrapper">';
      echo wp_get_attachment_image($image, 'full');
      echo '</div> <!-- .bubble-image-wrapper -->';
    }

    echo '<div class="text-wrapper">';

      if($studyTitle){ ?>
        <p class="title"> <?php
        echo $studyTitle;
        echo '</p>';
      }

      if($blockQuote){
        echo '<div class="block-quote">'. $blockQuote .'</div>';
      }

      if($byline){
        echo '<p class="byline">'. $byline .'</p>';
      }

      include('button.php');

    echo '</div><!-- .text-wrapper -->';
    echo '</div><!-- .columns -->';
    echo '</div><!-- inner -->';

echo '</div> <!-- .case-study-highlight-module -->';

?>
