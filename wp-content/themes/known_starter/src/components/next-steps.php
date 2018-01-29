<?php

if(get_post_type() == 'case_study'){
   $heading = get_field('next_step_heading');
   $image = get_field('next_step_image');
   $path = get_sub_field('next_step_page'[0]);
}
if(get_post_type() == 'team_member'){
   $heading = get_field('next_step_heading');
   $image = get_field('next_step_image');
   $path = get_sub_field('next_step_page'[0]);
} else {
   $heading = get_sub_field('next_step_heading');
   $image = get_sub_field('next_step_image');
   $path = get_sub_field('next_step_page'[0]);
}

echo '<div class="next-step-wrapper">';
   echo '<div class="next-step-container">';
   echo '<a class="page-path" href="'. $path .'"></a>';
      echo '<div class="inner">';

         if(get_post_type() == 'case_study'){
           echo '<p id="next-step-label">Next Case Study</p>';
         }
         if(get_post_type() == 'team_member'){
           echo '<p id="next-step-label">Next Team Member</p>';
         }
         else {
           echo '<p id="next-step-label">Next Step</p>';
         }

         // add function, if last of team member of case study, puse this message instead

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
echo '</div> <!-- .next-step-wrapper -->';

?>
