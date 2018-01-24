<?php
echo '<div id="network-exhibit">';
  echo '<div class="inner">';

    if( have_rows('network_exhibit_block') ) :
      echo '<div id="exhibit">';
      $i = 1;
      while( have_rows('network_exhibit_block') ) : the_row();

        $title = get_sub_field('exhibit_block_title');

        echo '<div class="exhibit-col">';

          echo '<div class="number">';
          echo  $i;
          echo '</div><!-- .number -->';

        if($title){
          echo '<p class="title">'. $title .'</p>';
        }
        $i++;

      echo '</div><!-- .exhibit-col-->';

      endwhile;
      echo '</div><!-- #exhibit-->';
    endif;

  echo '</div><!-- .inner -->';
echo '</div><!-- #network-exhibit-->';

?>
