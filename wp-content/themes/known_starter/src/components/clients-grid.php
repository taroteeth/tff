<div class="clients-grid">
  <div class="inner">

    <?php

    if( have_rows('client_industry_module' ) ) :

      while( have_rows('client_industry_module' ) ) : the_row();

          $moduleTitle = get_sub_field('module_title');
          $categories = get_sub_field_object('industry_category_submodule')['value'];
          $categoriesArray = [];
          foreach($categories as $cat){
            $categoriesArray[] = $cat['category_title'];
          }
          ?>

          <div class="industry-module">

          <p class="header trigger_fade"><?php echo $moduleTitle ?></p>
          <svg class="triangle" width="14px" height="7px" viewBox="0 0 14 7"><use href="#triangle-up"></use></svg>

          <div class="categories-list">
          <?php
          $catItemCounter = 0;

          foreach($categoriesArray as $catItem){ ?>
              <a class="cat-title trigger_fade" data-id="<?php echo 'id-'.$catItemCounter; ?>"><?php echo $catItem ?></a>
          <?php $catItemCounter++;
        } ?>
          </div><!-- categories-list -->

          <?php

          if(have_rows('industry_category_submodule')) :

            $catSubmodCounter = 0;
            while(have_rows('industry_category_submodule')) : the_row();

              $categoryTitle = get_sub_field('category_title');
              ?>

              <div class="category-submodule">
                <p class="title" data-id="<?php echo 'id-'.$catSubmodCounter; ?>"><?php echo $categoryTitle ?></p>

                <?php

                  $totalPosts = count(get_sub_field_object('category_exhibit')['value']);

                if( have_rows('category_exhibit') ) :

                  $iteration = 0;
                  $totalCount = 0;

                  while( have_rows('category_exhibit') ) : the_row();

                    $investment = get_sub_field('investment_number');
                    $name = get_sub_field('client_name');
                    $location = get_sub_field('client_location');
                    $description = get_sub_field('client_description');
                    ?>

                    <?php if($iteration == 0) { ?>
                      <div class="row">
                    <?php } ?>

                    <div class="category-exhibit trigger_fade">
                      <?php if($investment) { ?>
                        <p class="investment"><?php echo $investment ?></p>
                      <?php } ?>
                      <?php if($name) { ?>
                        <p class="name"><?php echo $name ?></p>
                      <?php } ?>
                      <?php if($location) { ?>
                        <p class="location"><?php echo $location ?></p>
                      <?php } ?>
                      <?php if($description) { ?>
                        <div class="description"><?php echo $description ?></div>
                      <?php } ?>
                    </div><!-- .category-exhibit-->

                    <?php
                    if($iteration == 2 || $totalCount == ($totalPosts - 1)) {
                      $iteration = 0;
                      ?>
                      </div><!-- .row -->
                    <?php
                    } else {
                      $iteration++;
                    }

                    $totalCount++;


                  endwhile;
                endif; // category exhibit
                ?>

              </div><!-- .category-submodule-->

            <?php
            $catSubmodCounter++;
            endwhile;
          endif; //category submodule
          ?>

          </div><!-- .industry-module-->

    <?php

    endwhile; // have rows client industry module
    endif; // have rows client industry module ?>

  </div><!-- .inner -->
</div><!-- .clients-grid-->
