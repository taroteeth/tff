<?php

$title = get_sub_field('content_module_title');
$introduction = get_sub_field('content_module_introduction');

?>

<div class="two-col-content">
  <div class="introduction-module">
    <?php
    if($title) echo '<p class="header">'. $title .'</p>';
    if($introduction) echo '<div class="intro">'. $introduction .'</div>';
    ?>
  </div><!-- .introduction-module -->

  <div class="two-col-module">
    <?php

    if(have_rows('column_content_item') ) :
      while(have_rows('column_content_item') ) : the_row();
      $title = get_sub_field('title');
      $content = get_sub_field('content');

      echo '<div class="block">';
      echo '<p class="title">'. $title .'</p>';
      echo '<div class="content">'. $content .'</div>';
      echo '</div>';

      endwhile;
    endif;
    ?>
  </div><!-- two-col-module -->
</div><!-- two-col-content -->
