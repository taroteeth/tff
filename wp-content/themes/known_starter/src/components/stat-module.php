<?php

$greyBg = get_sub_field('grey_background');
$moduleTitle = get_sub_field('module_title');

?>

<div id="stat-module" class="<?php if($greyBg){ echo "grey-bg"; } ?>">
  <div class="inner">

    <?php
    if($moduleTitle){
      echo '<p id="module-header" class="header">';
      echo $moduleTitle;
      echo '</p> <!-- module-header -->';
    }

    if(have_rows('stat_submodule')):

      echo '<div class="stat-inner">';

      while(have_rows('stat_submodule')): the_row();

      $integer = get_sub_field('integer');
      $plus = get_sub_field('plus_sign');
      $descriptor = get_sub_field('integer_descriptor');

      echo '<div class="col-inner">';

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

    if($hasBtn){
      echo '<div id="col-cta">';
      include('button.php');
      echo '</div> <!-- #col-cta -->';
    } ?>

  </div> <!-- .inner -->
</div> <!-- stat-module -->
