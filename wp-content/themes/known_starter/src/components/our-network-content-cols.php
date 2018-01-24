<?php

echo '<div id="our-network-content-cols">';

if( have_rows('content_cols_module') ):

  echo '<div class="content-cols-module">';

  while( have_rows('content_cols_module') ) : the_row();

    if(get_row_layout() == 'content_column') :

      $moduleTitle = get_sub_field('module_title');
      $moduleIntro = get_sub_field('module_introduction');
      $subModuleObj = get_sub_field_object('content_submodule')['value']; // value array, array of all repeater fields
      $groups = []; //we want to store each set of title and content and clump together
      $currentGroup = -1;

      // This will loop through all the rows, and generate a new multidimensional array for each set of title/items
      for($i = 0; $i < count($subModuleObj); $i++) {
        if($subModuleObj[$i]['title_button'] && $subModuleObj[$i]['title_text'] !== '') :
          $currentGroup++; //increase current group to 0 index
          $groups[] = ['title' => [], 'content' => []];
          $groups[$currentGroup]['title'] = $subModuleObj[$i];
        else :
          $groups[$currentGroup]['content'][] = $subModuleObj[$i]; // third bracket allows you to add new stuff without overwriting 
        endif;
      }

      if($moduleTitle) echo '<p class="header">'. $moduleTitle .'</p>';
      if($moduleIntro) echo '<div class="module-intro">'. $moduleIntro .'</div>';

      if(!empty($groups)) :

        foreach($groups as $group) :

          $contentCount = count($group['content']);
          $contentCounter = 0;

          echo '<div class="group">';

          // add if title here
          echo '<div class="title">';
          echo $group['title']['title_text'];
          echo '</div>';

          foreach($group['content'] as $g) :

            // if zero or half of the count, round rounds up
            if($contentCounter === 0 || $contentCounter == round($contentCount / 2)) echo '<div class="col">';

            $header = $g['header'];
            $subheader = $g['subheader'];
            $content = $g['content'];

            echo '<div class="block">';
            echo $header;
            echo $subheader;
            echo $content;
            echo '</div>';

            if($contentCounter == round(($contentCount / 2) - 1) || $contentCounter == count($group['content']) - 1) echo '</div><!-- .col -->';

            $contentCounter++;

          endforeach;

          echo '</div>';

        endforeach;

      endif;

    endif; //if get row layout
  endwhile; // while have rows content_module
  echo '</div><!-- .content-cols-module -->';
endif; // have rows content cols module
wp_reset_query();

echo '</div> <!-- our-network-content-cols -->';

?>
