<?php

if(have_rows('5050_module')) :
  while(have_rows('5050_module')) :
    the_row();

    switch(get_row_layout()){
      case 'embedded_image_module':
      include('embedded-image-module.php');
      break;

      case 'bubble_image_module':
      include('bubble-image-module.php');
      break;
    }
  endwhile;
endif;

 ?>
