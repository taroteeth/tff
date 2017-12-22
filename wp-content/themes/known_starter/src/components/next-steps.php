<?php

// CONFIGURE ACF
$heading = get_sub_field('next_step_heading');
$image = get_sub_field('next_step_image');

echo '<div class="next-step-container">';
   echo '<div class="inner">';

      echo '<p id="next-step-label">Next Step</p>';

      if($heading){
         echo '<p id="next-step-heading" class="header">';
         echo $heading;
         echo '</p> <!-- next_step_heading -->';
      }

   echo '</div> <!-- inner -->';

   if($image){
      echo '<div id="next-step-img">';
      echo wp_get_attachment_image($image);
      echo '</div> <!-- next-step-img -->';
   }
   
echo '</div>';

?>
