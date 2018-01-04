<?php

if(get_post_type() == 'case_study'){
   $heading = get_field('next_step_heading');
   $image = get_field('next_step_image');
} else {
   $heading = get_sub_field('next_step_heading');
   $image = get_sub_field('next_step_image');
}

echo '<div id="next-step-wrapper">';
   echo '<div class="next-step-container">';
      echo '<div class="inner">';

         if(get_post_type() == 'case_study'){
           echo '<p id="next-step-label">Next Case Study</p>';
         } else {
           echo '<p id="next-step-label">Next Step</p>';
         }

         if($heading){
            echo '<p id="next-step-heading" class="header">';
            echo $heading;
            echo '</p> <!-- next_step_heading -->';
         }

      echo '</div> <!-- inner -->';

      if($image){
         echo '<div id="next-step-img">'; ?>
         <img srcset="<?php echo wp_get_attachment_image_srcset($image, 'full'); ?>" src="<?php echo wp_get_attachment_image_url($image);?>" />
         <?php echo '</div> <!-- next-step-img -->';
      }

   echo '</div><!-- next-step-container-->';
echo '</div> <!-- next-step-wrapper -->';

?>
