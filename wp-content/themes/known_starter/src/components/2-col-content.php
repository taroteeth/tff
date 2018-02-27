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

      $pattern = '/<p>(Source:[^<br>]*)/'; //regex

      foreach($itemsGroup as $key => $value):  //access array key name as opposed to index
        foreach($itemsGroup[$key] as $key2 => $value2):

          // print_r($itemsGroup[$key][$key2]);
          // preg_match($pattern, $value2['content'], $matches);
          // var_dump($matches[1]);

          $itemsGroup[$key][$key2]['content'] = preg_replace($pattern, '<strong>$1</strong>', $value2['content']);

        endforeach;
        // // print_r($value);
        // // var_dump($matches);

      endforeach;

      // print_r($itemsGroup);

        foreach($itemsGroup as $group):
          echo '<div class="items">';
          echo '<ul>';
            foreach($group as $value):
              echo '<li class="block trigger_fade">';
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
