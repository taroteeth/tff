<?php
echo '<div class="network-exhibit">';
  echo '<div class="inner">';

    if( have_rows('network_exhibit_block') ) :
      echo '<div id="exhibit">';
      $i = 1;
      while( have_rows('network_exhibit_block') ) : the_row();

        $title = get_sub_field('exhibit_block_title');

        echo '<div class="exhibit-col trigger_tile">';

          echo '<div class="number">';
          echo  $i;
          echo '</div><!-- .number -->';

        if($title){
          echo '<p class="title">'. $title .'</p>';
        }

        if($i == 1 || $i == 2){ ?>
          <svg viewBox="0 0 90 450" class="shadow">
            <path d="M0,450H13.87c25.52-56,41.56-135.69,41.56-224.82C55.43,135.86,39.31,55,13.69,0H.17Z"/>
          </svg>
        <?php }

        $i++;

      echo '</div><!-- .exhibit-col-->';

      endwhile;
      echo '</div><!-- #exhibit-->';
    endif;

  echo '</div><!-- .inner -->';
echo '</div><!-- #network-exhibit-->';

?>
