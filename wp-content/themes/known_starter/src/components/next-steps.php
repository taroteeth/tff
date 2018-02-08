<?php
if(get_post_type() == 'case_study' || get_post_type() == 'team_member'){
   $heading = get_field('next_step_heading');
   $image = get_field('next_step_image');
   $path = get_sub_field('next_step_page'[0]);
}  else {
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
      else if(get_post_type() == 'team_member'){
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
      <?php echo wp_get_attachment_image($image, 'full'); ?>
      <svg class="photo-curve-horiz" viewBox="0 0 320 54"><use href="#photo-curve-horiz"></use></svg>
      <svg class="photo-curve-vert" viewBox="0 0 103 650">
        <path d="M0.243078268,0 L112,0 L112,650 L1.01853134,650 C66.5022043,558.395501 105,446.431527 105,325.541033 C105,204.174121 66.1981734,91.8042236 0.243078268,-2.84217094e-14 Z"></path>
      </svg>
    </div>
  </div>
</div>
