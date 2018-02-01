<?php

get_header();

$heroImg = get_field('hero_image');
$title = get_the_title();
$position = get_field('position');
$experience = get_field('experience');
$careerHighlights = get_field('career_highlights');
$bioBlurb = get_field('bio_blurb');
$nextBtn = get_field('next_step_heading');

?>

<div class="team-member">
  <div class="inner">

    <div class="hero">
    <div class="inner">

    <?php
      if($heroImg){
        echo '<div class="hero-img-wrapper">';
        echo wp_get_attachment_image($heroImg, 'full');
        echo '<svg class="photo-curve-vert" viewBox="0 0 103 650"><use href="#photo-curve-vert"></use></svg>';
        echo '<svg class="photo-curve-horiz" viewBox="0 0 320 54"><use href="#photo-curve-horiz"></use></svg>';
        echo '</div> <!-- #hero-img-wrapper -->';
      }

      echo '<div class="hero-text-wrapper">';
        echo '<p class="hero-header">';
        echo $title;
        echo '</p>';


        if($position){
          echo '<p class="hero-subheader">';
          echo $position;
          echo '</p>';
        }
      echo '</div><!-- #hero-text-wrapper -->'; ?>

      </div> <!-- .inner -->
    </div> <!-- .hero --> <?php

    echo '<div id="specs-module">';

      if($experience){
        echo '<div id="experience-module">';
        echo '<p class="title">Experience</p>';
        echo '<div class="module-content">'. $experience .'</div>';
        echo '</div><!-- #experience-module -->';
      }

      if($careerHighlights){
        echo '<div id="highlights-module">';
        echo '<p class="title">Career Highlights</p>';
        echo '<div class="module-content">'. $careerHighlights .'</div>';
        echo '</div><!-- #highlights-module -->';
      }

    echo '</div> <!-- #specs-module -->';

    if($bioBlurb){
      echo '<div id="bio-blurb-module">';
      echo '<div class="inner">';
      echo '<div class="blurb">'. $bioBlurb .'</div>';
      echo '<div class="blurb-circle"></div>';
      echo '</div><!-- .inner -->'; 
      echo '</div><!-- #bio-blurb-module -->';
    }

    if( have_rows('content_block') ) :
    echo '<div class="content-block-wrapper">';

      while( have_rows('content_block') ) : the_row();

      $title = get_sub_field('block_title');
      $content = get_sub_field('block_content');

      echo '<div class="content-block">';
        if($title){
          echo '<p class="title">'. $title .'</p>';
        }

        if($content){
          echo '<div class="content">';
          echo $content;
          echo '</div>';
        }
      echo '</div><!-- .content-block -->';

      endwhile; // have_rows content block
    echo '</div><!-- .content-block-wrapper -->';
    endif;  // have_rows content block

    if($nextBtn){
      include('components/next-steps.php');
    } ?>

  </div> <!-- .inner -->
</div> <!-- #team-member -->

<?php get_footer(); ?>
