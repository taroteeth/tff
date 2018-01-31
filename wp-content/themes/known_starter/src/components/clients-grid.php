<?php

echo '<div class="clients-grid">';
echo '<div class="inner">';

if( have_rows('client_industry_module' ) ) :
  while( have_rows('client_industry_module' ) ) : the_row();

    if( get_row_layout() == 'client_industry_module') :

      $moduleTitle = get_sub_field('module_title');

      echo '<div class="industry-module">';

      echo '<p class="header">'. $moduleTitle .'</p>';
      //for each var , var empty array, get value number and push to array then echo array, not array push
      $categories = get_sub_field_object('industry_category_submodule')['value'];
      $categoriesArray = [];

      foreach($categories as $cat){
        $categoriesArray[] = $cat['category_title'];
      }

      echo '<div class="categories-list">';
        foreach($categoriesArray as $catItem){
          echo '<span>'. $catItem .'</span>';
        }
      echo '</div><!-- categories-list -->';


      if(have_rows('industry_category_submodule')) :
        while(have_rows('industry_category_submodule')) : the_row();
          $categoryTitle = get_sub_field('category_title');

          echo '<div class="category-submodule">';
            echo '<p class="title">'. $categoryTitle .'</p>';
            if( have_rows('category_exhibit') ) :
              $iteration = 0;
              $totalCount = 0;
              $totalPosts = count(get_sub_field('category_exhibit'));

              while( have_rows('category_exhibit') ) : the_row();
              $investment = get_sub_field('investment_number');
              $name = get_sub_field('client_name');
              $location = get_sub_field('client_location');
              $description = get_sub_field('client_description');

              if($iteration == 0) echo '<div class="row">';

              echo '<div class="category-exhibit">';
                if($investment) echo '<p class="investment">'. $investment .'</p>';
                if($name) echo '<p class="name">'. $name .'</p>';
                if($location) echo '<p class="location">'. $location .'</p>';
                if($description) echo '<div class="description">'. $description .'</div>';
              echo '</div><!-- .category-exhibit-->';
              $iteration++;

              if($iteration == 3 || $totalCount == $totalPosts){
                echo '</div><!-- .row -->';
                $iteration = 0;
              }

              endwhile;
            endif; // category exhibit

          echo '</div><!-- .category-submodule-->';
        endwhile; // category submodule
      endif; //category submodule

      echo '</div><!-- .industry-module-->';

    endif; //get row layout

endwhile; // have rows client industry module
endif; // have rows client industry module

echo '</div><!-- .inner -->';
echo '</div><!-- .clients-grid-->';

?>
