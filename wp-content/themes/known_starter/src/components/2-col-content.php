<?php

$title = get_sub_field('content_module_title');
$introduction = get_sub_field('content_module_introduction');

?>

<div class="two-col-content">
  <div class="introduction-module">
    <?php
    if($title) echo '<p class="header trigger_fade">'. $title .'</p>';
    if($introduction) echo '<div class="intro trigger_fade">'. $introduction .'</div>';
    ?>
  </div><!-- .introduction-module -->

  <div class="two-col-module">
    <?php

    $colContent = get_sub_field('column_content_item');
    $itemsCount = count($colContent);
    $itemsHalf = ceil($itemsCount / 2);
    $itemsGroup = array_chunk($colContent, $itemsHalf);

    if($colContent) :

        foreach($itemsGroup as $group):
          echo '<div class="items">';
          echo '<ul>';
            foreach($group as $value):
              echo '<li class="block">';
              echo '<p class="title">'. $value['title'] .'</p>';
              echo '<div class="content">'. $value['content'] .'</div>';
              echo '</li>';
            endforeach;
          echo '</ul>';
          echo '</div>';
        endforeach;

    endif;
    ?>
  </div><!-- two-col-module -->
</div><!-- two-col-content -->
