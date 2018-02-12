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

$label;

switch(get_post_type()) {
  case 'case_study':
    $label = 'Next Case Study';
    break;
  case 'team_member':
    $label = 'Next Team Member';
    break;
  default:
    $label = 'Next Step';
    break;
}
?>

<div class="next-step-wrapper">
  <div class="next-step-container">
    <div class="content">
      <p id="next-step-label"><?php echo $label ?></p>
      <?php if($heading){ ?>
         <p id="next-step-heading" class="header"><?php echo $heading ?></p>
      <?php } ?>
    </div>
    <div class="image">
      <?php echo wp_get_attachment_image($image, 'full'); ?>
      <svg class="photo-curve-horiz" viewBox="0 0 320 54">
        <use href="#photo-curve-horiz"></use>
      </svg>
      <svg class="photo-curve-vert" viewBox="0 0 112 650">
        <use href="#photo-curve-vert"></use>
      </svg>
    </div>
  </div>
</div>
