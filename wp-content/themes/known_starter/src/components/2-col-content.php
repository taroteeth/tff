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

        foreach($group['content'] as $g) :

          if($contentCounter === 0 || $contentCounter ==round($contentCount / 2)) echo '<div class="col">';

          $title = $g['title'];
          $content = $g['content'];

          echo '<div class="block">';
          echo '<p class="title">'. $title .'</p>';
          echo '<div class="content">'. $content .'</div>'; 
          echo '</div>';

          if($contentCounter == round(($contentCount / 2) -1) || $contentCounter == count($group['content'] -1) echo '</div><!-- .col -->';

          $contentCounter ++;
        endforeach;

        echo '</div><!-- .group -->';

      endforeach; //groups as group

    endif; //not empty groups
    ?>
  </div><!-- .2-col-module -->
</div><!-- 2-col-content -->
