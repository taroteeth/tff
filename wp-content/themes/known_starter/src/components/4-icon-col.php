<?php // our network panel at bottom of home should be similar except that the icons aren't links and there's a button option at the bottom

$greyBg = get_sub_field('grey_background');
$moduleTitle = get_sub_field('module_title');
$hasBtn = get_sub_field('bottom_cta');
$btnText = get_sub_field('bottom_cta_text');
$btnLink = get_sub_field('bottom_cta_link');

?>

<div id="icon-col" class="<?php if($greyBg){ echo "grey-bg"; } ?>">
  <div class="inner">

    <?php
    if($moduleTitle){
      echo '<p id="col-header" class="header">';
      echo $moduleTitle;
      echo '</p> <!-- col-header -->';
    }

    if(have_rows('col_submodule')):

      echo '<div class="cols-inner">';

      while(have_rows('col_submodule')): the_row();

      $submodIcon = get_sub_field('submodule_icon');
      $submodTitle = get_sub_field('submodule_title');
      $submodContent = get_sub_field('submodule_content');
      $isLink = get_sub_field('link_option');
      $linkSrc = get_sub_field('link_source');

      echo '<div class="col-inner">';

        if($submodIcon){
          if($isLink){
            echo '<a href="'. $linkSrc .'">';
            echo wp_get_attachment_image($submodIcon);
          } else {
            echo wp_get_attachment_image($submodIcon);
          }
        }

        if($submodTitle){
          if($isLink){
            echo '<p class="submodule-title">'. $submodTitle .'</p>';
            echo '</a>';
          } else {
            echo $submodTitle;
          }
        }

        if($submodContent){
          echo $submodContent;
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
</div> <!-- icon-col -->
