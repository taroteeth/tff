<?php

$greyBg = get_sub_field('grey_background');
$moduleTitle = get_sub_field('module_title');
$hasBtn = get_sub_field('has_button');

?>

<div class="stat-module <?php if($greyBg){ echo ", grey-bg"; } ?>">
  <div class="inner">

    <?php
    if($moduleTitle){
      echo '<h2 id="module-header" class="header trigger_fade">';
      echo $moduleTitle;
      echo '</h2> <!-- module-header -->';
    }

    if(have_rows('stat_submodule')):

      echo '<div class="stat-inner">';

      while(have_rows('stat_submodule')): the_row();

      $integer = get_sub_field('integer');
      $plus = get_sub_field('plus_sign');
      $descriptor = get_sub_field('integer_descriptor');

      echo '<div class="col-inner trigger_tile">';

        if($integer){ ?>
          <div id="integer" class="<?php if($plus){echo 'plus';}?>"><?php echo $integer ?></div> <?php
        }

        if($descriptor){
          echo '<div id="descriptor">'. $descriptor .'</div>';
        }

      echo '</div> <!-- col-inner -->';
      endwhile;
      echo '</div> <!-- stat-inner -->';
    endif; // end repeater loop

    if($hasBtn)
    echo '<div class="button-container">';
    button();
    echo '</div>'; ?>

  </div> <!-- .inner -->
</div> <!-- stat-module -->
