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

      case 'network_module':
      include('network-module.php');
      break;

      case 'section_header':
      include('section-header.php');
      break;

      case 'rte':
      include('rte.php');
      break;

      case '5050_image_module':
      include('5050-module.php');
      break;

      case 'case_study_highlight_module':
      include('case-study-highlight.php');
      break;

      case 'our_network_content_columns':
      include('our-network-content-cols.php');
      break;

      case 'alt_grid':
      include('alt-grid.php');
      break;

      case 'content_columns':
      include('content-cols.php');
      break;

      case 'stat_module':
      include('stat-module.php');
      break;

      case 'contact_form_module':
      include('contact-form-module.php');
      break;

      case 'next_step_button':
      include('next-steps.php');
      break;

    }
  endwhile;
endif;

 ?>
