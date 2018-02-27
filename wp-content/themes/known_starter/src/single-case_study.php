<?php

get_header();

$heroImg = get_field('hero_image');
$title = get_the_title();
$headline = get_field('headline');
$subheader = get_field('subheader');
$role = get_field('role_title');
$testimonial = get_field('testimonial_quote');
$byline = get_field('testimonial_byline');
$nextBtn = get_field('next_step_image');
$imageLeft = true;
?>

<div class="case-study">
  <div class="inner">

    <div class="hero">
      <div class="inner"><?php
      if($heroImg){
        echo '<div class="hero-img-wrapper">';
        echo wp_get_attachment_image($heroImg, 'full');
        echo '<svg class="photo-curve-vert" viewBox="0 0 112 650">
          <use href="#photo-curve-vert"></use>
        </svg>';
        echo '<svg class="photo-curve-horiz" viewBox="0 0 320 54"><use href="#photo-curve-horiz"></use></svg>';
        echo '</div> <!-- .hero-img-wrapper -->';
      }

      echo '<div class="hero-text-wrapper">';
        echo '<p class="hero-title">';
        echo $title;
        echo '</p>';


        if($headline){
          echo '<p class="header">';
          echo $headline;
          echo '</p>';
        }

        if($subheader){
          echo '<p class="subheader">';
          echo $subheader;
          echo '</p>';
        }

      echo '</div><!-- #hero-text-wrapper -->'; ?>
      </div> <!-- .inner -->
    </div> <!-- .hero --> <?php

    echo '<div class="specs-module">';

      if($role){
        echo '<div class="spec-title trigger_fade">';
        echo '<p>ThinkForward served as '. $role .'</p>';
        echo '</div>';
      }

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

            echo '<div class="spec">';
            echo '<p class="spec-name trigger_fade">'. $name .'</p><!-- .spec-name -->';
            echo '<div class="spec-content trigger_fade">'. $content .'</div><!-- .spec-content -->';
            echo '</div> <!-- .spec -->';
            $i++;
            $totalCounter++;

            if($i===3 || $totalCounter===$total){
              echo '</div><!-- row -->';
              $i=0;
            }

          endwhile;
          echo '</div> <!-- #specs-wrapper -->';
      endif; // specs module
    echo '</div> <!-- .specs-module -->';


      //put text module code back in here
      if(have_rows('text_module')):

        echo '<div class="text-wrapper">';

        while(have_rows('text_module')): the_row();

          $greyBg = get_sub_field('grey_background');
          $title = get_sub_field('module_title');
          $bodyContent = get_sub_field('module_body_content');
          $bodyContentVal = get_sub_field_object('module_body_content')['value'];

          echo '<p class="header">'. $title .'</p>';

          preg_match_all('/(class="wp-caption )/', $bodyContentVal, $matches, PREG_OFFSET_CAPTURE);

          $matches = array_filter($matches);
          $found = count($matches[0]);


          if($found){
            $additionalOffset = 0;

            for($i = 0; $i < $found; $i++) {
              if($i % 2 != 0 && $i !== 0) {
                $bodyContentVal = substr_replace($bodyContentVal, 'class="wp-caption align-right ', ($matches[0][$i][1] + $additionalOffset), strlen($matches[0][$i][0]));

                // this needs to add to each additional loop because the new string will be longer with each replace
                $additionalOffset += strlen('class="wp-caption align-right ') - strlen($matches[0][$i][0]);
              }
            }
          }

          echo $bodyContentVal;
          ?>

        <?php
        endwhile;

        echo '</div><!-- .text-wrapper -->';
      endif; // text module


      echo '<div class="testimonial">';

        echo '<div class="inner">';

          if($testimonial){
            echo '<div class="testimonial-quote">'. $testimonial .'</div>';
          }

          if($byline){
            echo '<p class="testimonial-byline">'. $byline .'</p>';
          }

          echo '<div class="orange-circle"></div>';

        echo '</div><!-- .inner -->';
      echo '</div><!-- .testimonial -->';

      if($nextBtn){
        include('components/next-steps.php');
      }

    ?>

  </div> <!-- .inner -->
</div> <!-- #case-study -->

<?php get_footer(); ?>
