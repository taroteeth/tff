<?php

if(have_rows('components')) :
  while(have_rows('components')) :
    the_row();

    switch(get_row_layout()){
      case 'hero':
      include('hero.php');
      break;

      case 'icon_col':
      include('4-icon-col.php');
      break;

      case 'next_step_button':
      include('next-steps.php');
      break;
    }
  endwhile;
endif;

 ?>
