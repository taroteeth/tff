<?php

get_header();

$heroImg = get_field('hero_image');
$title = get_the_title();
$headline = get_field('headline');
$subheader = get_field('subheader');
$role = get_field('role_title');
$testimonial = get_field('testimonial_quote');
$byline = get_field('testimonial_byline');
$nextBtn = get_field('next_step_heading');

?>

<div id="case-study">
  <div class="inner">

    <div id="hero"> <?php
      if($heroImg){
        echo '<div id="hero-img-wrapper">';
        echo wp_get_attachment_image($heroImg, 'full');
        echo '</div> <!-- #hero-img-wrapper -->';
      }

      echo '<div id="hero-text-wrapper">';
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

    </div> <!-- .hero --> <?php

    echo '<div id="specs-module">';

      if($role){
        echo '<div id="spec-title">';
        echo '<p>ThinkForward served as '. $role .'</p>';
        echo '</div>';
      }

      if(have_rows('specs')):

          echo '<div id="specs-wrapper">';
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
          echo '</div> <!-- #specs-wrapper -->';
      endif; // specs module
    echo '</div> <!-- #specs-module -->';


      //put text module code back in here
      if(have_rows('text_module')):

        echo '<div id="text-wrapper">';

        while(have_rows('text_module')): the_row();
          $greyBg = get_sub_field('grey_background');
          $title = get_sub_field('module_title');
          $bodyContent = get_sub_field('module_body_content'); ?>

          <div id="text-module" class="<?php if($greyBg){echo 'grey-bg';}?>"> <?php
            echo '<div class="inner">';
              echo '<p class="header">'. $title .'</p>';
              echo $bodyContent;
            echo '</div><!-- inner -->';
          echo '</div><!-- #text-module -->';

        endwhile;

        echo '</div><!-- #text-wrapper -->';
      endif; // text module


      echo '<div id="testimonial">';

        echo '<div class="inner">';

          if($testimonial){
            echo '<div id="testimonial-quote">'. $testimonial .'</div>';
          }

          if($byline){
            echo '<p id="testimonial-byline">'. $byline .'</p>';
          }

          echo '<div class="orange-circle"></div>';

        echo '</div><!-- .inner -->';
      echo '</div><!-- #testimonial -->';

      if($nextBtn){
        include('components/next-steps.php');
      }

    ?>

  </div> <!-- .inner -->
</div> <!-- #case-study -->

<?php get_footer(); ?>
