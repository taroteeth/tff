<?php
$greyBg = get_sub_field('grey_background');
$divider = get_sub_field('image_divider');
$moduleTitle = get_sub_field('module_title');
$hasBtn = get_sub_field('bottom_cta');
$btnText = get_sub_field('bottom_cta_text');
$btnLink = get_sub_field('bottom_cta_link');
?>

<div class="icon-col <?php if($greyBg){ echo 'grey-bg'; } ?> <?php if($divider){ echo 'has-divider'; } ?>">
  <div class="inner">

    <?php
    if($moduleTitle){
      echo '<h2 class="col-header header trigger_fade">';
      echo $moduleTitle;
      echo '</h2> <!-- .col-header -->';
    }

    $rowCount = count(get_sub_field('col_submodule'));

    if(have_rows('col_submodule')): ?>

      <div class="cols-inner col-<?php echo $rowCount ?>"><?php
      $iteration = 1;

      while(have_rows('col_submodule')): the_row();

      $submodIcon = get_sub_field('submodule_icon');
      $iconFiletype = wp_check_filetype($submodIcon);
      $submodTitle = get_sub_field('submodule_title');
      $boldTitle = get_sub_field('bold_title_option');
      $submodContent = get_sub_field('submodule_content');
      $isLink = get_sub_field('link_option');
      $linkSrc = get_sub_field('link_source'); ?>

      <div class="col-inner trigger_tile <?php echo $iteration ?>">

      <?php

        if($submodIcon){
          if($isLink){
            echo '<a href="'. get_permalink($linkSrc[0]) .'">'; ?>
            <div class="sub-icon-wrapper <?php if($divider){echo 'divider';}?><?php if($iconFiletype = "svg"){echo 'svg';} ?>"> <?php
            echo wp_get_attachment_image($submodIcon);
            echo '</div><!-- #sub-icon-wrapper -->';
          } else { ?>
            <div class="sub-icon-wrapper <?php if($divider){echo 'divider';}?>"> <?php
            echo wp_get_attachment_image($submodIcon);
            echo '</div><!-- #sub-icon-wrapper -->';
          }
        }

        if($divider) {
          echo '<div class="divider"></div>';
        }

        if($submodTitle){
          if($isLink){ ?>
            <p class="submodule-title <?php if($boldTitle){echo 'bold';} ?>"> <?php echo $submodTitle ?> </p>
            </a> <?php
          } else { ?>
            <p class="submodule-title <?php if($boldTitle){echo 'bold';} ?>"> <?php echo $submodTitle;?> </p> <?php
          }
        }

        if($submodContent){
          echo $submodContent;
        }

      echo '</div> <!-- col-inner -->';
      $iteration++;
      endwhile;
      echo '</div> <!-- cols-inner -->';
    endif; // end repeater loop

    if($hasBtn){
      button();
    } ?>

  </div> <!-- .inner -->
</div> <!-- .icon-col -->
