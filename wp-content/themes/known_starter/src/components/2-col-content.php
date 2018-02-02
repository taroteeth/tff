<?php

$title = get_sub_field('content_module_title');
$introduction = get_sub_field('content_module_introduction');

?>

<div class="2-col-content">
  <div class="introduction-module">
    <?php
    if($title) echo '<p class="header">'. $title .'</p>';
    if($introduction) echo '<div class="intro">'. $introduction .'</div>';
    ?>
  </div><!-- .introduction-module -->

  <div class="2-col-module">
    <?php
    $moduleObj = get_sub_field_object('column_content_item'['value']);
    $groups = [];
    $currentGroup = 0;

    for($i = 0; $i < count($moduleObj); $i++){
      if($moduleObj[$i]['title'] !== '') :
        if($i !== 0) $currentGroup++;
        $groups[] = ['title' => [], 'content' => []];
        $groups[$currentGroup]['title'] = $moduleObj[$i];
      else:
        $groups[$currentGroup]['content'][] = $moduleObj[$i];
      endif;
    }

    if(!empty($groups)) :

      foreach($groups as $group) :
        $contentCount = count($group['content']);
        $contentCounter = 0;

        echo '<div class="group">';

        echo '</div><!-- .group -->';

      endforeach; //groups as group 

    endif; //not empty groups
    ?>
  </div><!-- .2-col-module -->
</div><!-- 2-col-content -->
