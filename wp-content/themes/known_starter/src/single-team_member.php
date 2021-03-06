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
        echo '<svg class="photo-curve-vert" viewBox="0 0 112 650"><use href="#photo-curve-vert"></use></svg>';
        echo '<svg class="photo-curve-horiz" viewBox="0 0 320 54"><use href="#photo-curve-horiz"></use></svg>';
        echo '</div> <!-- #hero-img-wrapper -->';
      }

      echo '<div class="hero-text-wrapper">';
        echo '<h1 class="hero-header trigger_fade">';
        echo $title;
        echo '</h1>';


        if($position){
          echo '<p class="hero-subheader trigger_fade">';
          echo $position;
          echo '</p>';
        }
      echo '</div><!-- #hero-text-wrapper -->'; ?>

      </div> <!-- .inner -->
    </div> <!-- .hero --> <?php

    echo '<div id="specs-module">';
    echo '<div class="specs-inner">';

      if($experience){
        echo '<div id="experience-module" class="trigger_fade">';
        echo '<p class="title">Experience</p>';
        echo '<div class="module-content">'. $experience .'</div>';
        echo '</div><!-- #experience-module -->';
      }

      if($careerHighlights){
        echo '<div id="highlights-module" class="trigger_fade">';
        echo '<p class="title">Career Highlights</p>';
        echo '<div class="module-content">'. $careerHighlights .'</div>';
        echo '</div><!-- #highlights-module -->';
      }

    echo '</div><!-- .specs-inner -->';
    echo '</div> <!-- #specs-module -->';

    if($bioBlurb){
      echo '<div id="bio-blurb-module">';
      echo '<div class="inner">';
      echo '<div class="blurb trigger_fade">'. $bioBlurb .'</div>';
      echo '<div class="blurb-circle trigger_circle_grow"></div>';
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
          echo '<h2 class="title trigger_fade">'. $title .'</h2>';
        }

        if($content){
          echo '<div class="content trigger_fade">';
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
