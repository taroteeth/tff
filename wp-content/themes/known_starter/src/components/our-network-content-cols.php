<?php

echo '<div id="our-network-content-cols">';

if( have_rows('content_cols_module') ):
  echo '<div class="content-cols-module">';
  while( have_rows('content_cols_module') ) : the_row();
    if(get_row_layout() == 'content_column') :
      $moduleTitle = get_sub_field('module_title');
      $moduleIntro = get_sub_field('module_introduction');

      if($moduleTitle){
        echo '<p class="header">'. $moduleTitle .'</p>';
      }

      if($moduleIntro){
        echo '<div class="module-intro">'. $moduleIntro .'</div>';
      }

      if(have_rows('content_submodule') ) :
          echo '<div class="content-submodule">';
          while(have_rows('content_submodule') ) : the_row();

            $title = get_sub_field('title_button');
            $titleText = get_sub_field('title_text');
            $header = get_sub_field('header');
            $subheader = get_sub_field('subheader');
            $content = get_sub_field('content');
            $i = 1;
            $col1 = "";
            $col2 = "";

            if($title && $titleText) {
              echo '<p class="title">'. $titleText .'</p>';
            } //title- how to get this in the right place?

            else {
              if($i % 2 != 0){
                if($title && $titleText) {
                  $col1 .= '<p class="title">'. $titleText .'</p>';
                } else {
                  $col1 .= '<div class="block">';
                    if($header){
                      $col1 .= '<p class="block-header">'. $header .'</p>';
                    }
                    if($subheader){
                      $col1 .= '<p class="block-subheader">'. $subheader .'</p>';
                    }
                    if($content){
                      $col1 .= '<div class="block-content">'. $content .'</div>';
                    }
                  $col2 .= '</div><!-- .block -->';
                  $i++;
                }
              }
              else {
                $col2 .= '<div class="block">';
                  if($header){
                    $col2 .= '<p class="block-header">'. $header .'</p>';
                  }
                  if($subheader){
                    $col2 .= '<p class="block-subheader">'. $subheader .'</p>';
                  }
                  if($content){
                    $col2 .= '<div class="block-content">'. $content.'</div>';
                  }
                $col2 .= '</div><!-- .block -->';
                $i++;
              }
            }
          endwhile; // have rows content_submodule
          echo '<div class="row">';
          echo '<div class="odd-col">'. $col1 .'</div>';
          echo '<div class="even-col">'. $col2 .'</div>';
          echo '</div><!-- row -->';

          echo '</div><!-- .content-submodule-->';
      endif; // have rows content_submodule

    endif; //if get row layout
  endwhile; // while have rows content_module
  echo '</div><!-- .content-cols-module -->';
endif; // have rows content cols module
wp_reset_query();

echo '</div> <!-- our-network-content-cols -->';

//////////////////////////////clean this up


  //   $title = get_sub_field('title_button');
  //   $titleText = get_sub_field('title_text');
  //   $header = get_sub_field('header');
  //   $subheader = get_sub_field('subheader');
  //   $content = get_sub_field('content');
  //   $i = 1;
  //   $col1 = "";
  //   $col2 = "";
  //
  //   if($title && $titleText) {
  //     echo '<p class="title">'. $submoduleTitle .'</p>';
  //   } //endif
  //   else {
  //
  //     if($i % 2 != 0){
  //       $col1 .= '<div class="block">';
  //         if($blockHeader){
  //           $col1 .= '<p class="block-header">'. $blockHeader .'</p>';
  //         }
  //         if($blockSubheader){
  //           $col1 .= '<p class="block-subheader">'. $blockSubheader .'</p>';
  //         }
  //         if($blockContent){
  //           $col1 .= '<div class="block-content">'. $blockContent .'</div>';
  //         }
  //       $col2 .= '</div><!-- .block -->';
  //       $i++;
  //   }
  //
  //   else {
  //     $col2 .= '<div class="block">';
  //       if($blockHeader){
  //         $col2 .= '<p class="block-header">'. $blockHeader .'</p>';
  //       }
  //       if($blockSubheader){
  //         $col2 .= '<p class="block-subheader">'. $blockSubheader .'</p>';
  //       }
  //       if($blockContent){
  //         $col2 .= '<div class="block-content">'. $blockContent.'</div>';
  //       }
  //     $col2 .= '</div><!-- .block -->';
  //     $i++;
  //     }
  //   }
  //   endwhile; // content_submodule
  //
  //   echo '<div class="row">';
  //   echo '<div class="odd-col">'. $col1 .'</div>';
  //   echo '<div class="even-col">'. $col2 .'</div>';
  //   echo '</div><!-- row -->';
  //
  //
  //
  // echo '</div><!-- .content-submodule-->';
  //
  //
  //


?>
