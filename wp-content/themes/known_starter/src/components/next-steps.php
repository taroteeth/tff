<?php

$heading = get_sub_field('next_step_heading');
$image = get_sub_field('next_step_image');
$path = get_sub_field('next_step_page')[0];
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

if(get_post_type() == 'case_study' || get_post_type() == 'team_member') {
  $image = get_field('next_step_image');
  $type = $post->post_type;
  $posts = new WP_Query(array('post_type' => $type, 'posts_per_page' => -1, 'fields' => 'ids'));
  if($posts) {
    $postIDs = $posts->posts;
    $current = array_search($post->ID, $postIDs);
    $nextPost = $postIDs[$current + 1];
    $path = $nextPost;
    $lastPost = end($postIDs);

    if($nextPost) {
      $heading = get_the_title($nextPost);
    }

    if($lastPost == $post->ID) {
      if($type == 'case_study') {
        $label = 'Next Step';
        $heading = 'Contact Us';
        $path = 447;
      } else {
        $label = 'Next Step';
        $heading = 'Our Consulting Network';
        $path = 370;
      }
    }
  }
}

$permalink = get_permalink($path);
?>

<div class="next-step-wrapper">
  <div class="next-step-container">
    <a href="<?php echo $permalink ?>" class="cover-link"></a>
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
