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
?>

<div class="next-step-wrapper">
  <div class="next-step-container">
    <div class="content">
      <?php
      if(get_post_type() == 'case_study'){
        echo '<p id="next-step-label">Next Case Study</p>';
      }
      if(get_post_type() == 'team_member'){
        echo '<p id="next-step-label">Next Team Member</p>';
      }
      else {
        echo '<p id="next-step-label">Next Step</p>';
      }

      if($heading){
         echo '<p id="next-step-heading" class="header">';
         echo $heading;
         echo '</p> <!-- next_step_heading -->';
      }
      ?>
    </div>
    <div class="image">
      <img srcset="<?php echo wp_get_attachment_image_srcset($image, 'full'); ?>" src="<?php echo wp_get_attachment_image_url($image);?>" />
      <svg class="photo-curve-horiz" viewBox="0 0 320 54"><use href="#photo-curve-horiz"></use></svg>
      <svg class="photo-curve-vert" viewBox="0 0 103 650"><use href="#photo-curve-vert"></use></svg>
    </div>
  </div>
</div>
