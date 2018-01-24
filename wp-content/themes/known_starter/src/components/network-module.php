<?php
//style w grey background
$hasBtn = get_sub_field('button_text');

echo '<div id="network-icon-col">';
  echo '<div class="inner">';

    echo '<p id="col-header" class="header">Our Network is Expansive</p> <!-- col-header -->';

    if(have_rows('col_submodule')):

      echo '<div class="cols-inner">';

      while(have_rows('col_submodule')): the_row();

      $submodIcon = get_sub_field('submodule_icon');
      $submodTitle = get_sub_field('submodule_title');

      echo '<div class="col-inner">';

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
      echo '<div id="col-cta">';
      include('button.php');
      echo '</div> <!-- #col-cta -->';
    } ?>

  </div> <!-- .inner -->
</div> <!-- network-icon-col -->
