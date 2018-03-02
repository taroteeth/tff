<?php
//style w grey background
$hasBtn = get_sub_field('button_text');

echo '<div class="network-icon-col">';
  echo '<div class="inner">';

    echo '<h2 id="col-header" class="header">Our Network is Expansive</h2> <!-- col-header -->';

    if(have_rows('col_submodule')):

      echo '<div class="cols-inner">';

      while(have_rows('col_submodule')): the_row();

      $submodIcon = get_sub_field('submodule_icon');
      $submodTitle = get_sub_field('submodule_title');

      echo '<div class="col-inner trigger_tile">';

        if($submodIcon){
            echo '<div id="sub-icon-wrapper">';
            echo wp_get_attachment_image($submodIcon);
            echo '</div><!-- #sub-icon-wrapper -->';
        }

        if($submodTitle){
          echo '<p id="submodule-title">'. $submodTitle .'</p>';
        }

      echo '</div> <!-- col-inner -->';
      endwhile;
      echo '</div> <!-- cols-inner -->';
    endif; // end repeater loop

    if($hasBtn){
      button();
    } ?>

  </div> <!-- .inner -->
</div> <!-- .network-icon-col -->
