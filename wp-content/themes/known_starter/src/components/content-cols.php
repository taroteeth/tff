<?php
$greyBg = get_sub_field('grey_background');
$button = get_sub_field('button_option');
?>



<div class="content-cols <?php if($greyBg){echo 'grey-bg';}?>">
  <div class="inner">

    <?php
    echo '<div class="specs-module">';
      if(have_rows('specs')):

          echo '<div class="specs-wrapper">';
          // add i loop here to wrap rows at 3 specs
          $i = 0;
          $totalCounter = 0;
          $total = count(get_field('specs'));

          while(have_rows('specs')): the_row();

            $name = get_sub_field('spec_name');
            $content = get_sub_field('spec_content');

            if($i === 0){
              echo '<div class="row">';
            }

            echo '<div class="spec trigger_tile">';
            echo '<p class="spec-name">'. $name .'</p><!-- .spec-name -->';
            echo '<div class="spec-content">'. $content .'</div><!-- .spec-content -->';
            echo '</div> <!-- .spec -->';
            $i++;
            $totalCounter++;

            if($i===3 || $totalCounter===$total){
              echo '</div><!-- row -->';
              $i=0;
            }

          endwhile;
          echo '</div> <!-- .specs-wrapper -->';
      endif; // specs module
    echo '</div> <!-- #specs-module -->';

    if($button){
      button($id, $text, 'align-center');
    }

    ?>

  </div> <!-- .inner -->
</div> <!-- #content-cols -->
