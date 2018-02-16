<div id="our-network-content-cols">

<?php if( have_rows('content_cols_module') ): ?>

  <div class="content-cols-module">

  <?php

  while( have_rows('content_cols_module') ) : the_row();

    if(get_row_layout() == 'content_column') :

      $moduleTitle = get_sub_field('module_title');
      $moduleIntro = get_sub_field('module_introduction');
      $subModuleObj = get_sub_field_object('content_submodule')['value'];
      $groups = [];
      $currentGroup = 0;

      // This will loop through all the rows, and generate a new multidimensional array for each set of title/items
      for($i = 0; $i < count($subModuleObj); $i++) {
        if($subModuleObj[$i]['title_button'] && $subModuleObj[$i]['title_text'] !== '') :
          if($i !== 0) {
            $currentGroup++;
          }
          $groups[$currentGroup]['title-text'] = $subModuleObj[$i]['title_text'];
          $groups[$currentGroup]['content'] = [];
          $groups[$currentGroup]['totalLength'] = 0;
        else :
          $groups[$currentGroup]['content'][] = [
            'header' => $subModuleObj[$i]['header'],
            'subheader' => $subModuleObj[$i]['subheader'],
            'content' => $subModuleObj[$i]['content'],
            'length' => strlen($subModuleObj[$i]['content'])
          ];
          $groups[$currentGroup]['totalLength'] += strlen($subModuleObj[$i]['content']);
        endif;
      }

      // loop through groups to get split point
      for($i = 0; $i < count($groups); $i++) {
        $c = 0;
        for($x = 0; $x < count($groups[$i]['content']); $x++) {
          $c += $groups[$i]['content'][$x]['length'];
          if($c >= ($groups[$i]['totalLength'] * 0.5)){
            $groups[$i]['splitIndex'] = $x;
            break;
          }
        }
      }

      echo '<div class="module-wrap">';

      if($moduleTitle) echo '<p class="header trigger_fade">'. $moduleTitle .'</p>';
      if($moduleIntro) echo '<div class="module-intro trigger_fade">'. $moduleIntro .'</div>';

      if(!empty($groups)) :

        foreach($groups as $group) :

          $contentCount = count($group['content']);
          $contentCounter = 0;
          ?>

          <div class="group-wrap">
          <div class="group">

          <?php if($group['title-text']) { ?>
            <div class="title trigger_fade"><?php echo $group['title-text'] ?></div>
          <?php } ?>

          <?php

          for($i = 0; $i < count($group['content']); $i++) {

            $g = $group['content'][$i];

            // if zero or half of the count, round rounds up
            if($contentCounter === 0 || $i == $group['splitIndex'] + 1) {
              echo '<div class="col">';
            }

            $header = $g['header'];
            $subheader = $g['subheader'];
            $content = $g['content'];
            ?>

            <div class="block">
              <p class="block-header trigger_fade"><?php echo $header ?></p>
              <p class="block-subheader trigger_fade"><?php echo $subheader ?></p>
              <?php echo '<div class="trigger_fade">'. $content .'</div>';?>
            </div>

            <?php if($i == $group['splitIndex'] || $contentCounter == count($group['content']) - 1) { ?>
              </div><!-- .col -->
            <?php } ?>

            <?php
            $contentCounter++;

          }
          ?>

          </div>
          </div>

        <?php

        endforeach;
      endif;

      echo '</div><!-- .module-wrap -->';


    endif; //if get row layout
  endwhile; // while have rows content_module
  ?>

  </div><!-- .content-cols-module -->

  <?php
  endif; // have rows content cols module
  wp_reset_query();
  ?>

</div> <!-- our-network-content-cols -->
