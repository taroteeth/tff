<?php

get_header();

$heroImg = get_field('cover_photo');
$title = get_the_title();
$subtitle = get_field('subtitle');
$author = get_field('author');
$content = get_field('resource_content');

$nextBtn = get_field('next_step_heading'); // all next steps are to contact us

?>

<div class="resource-single">
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
        echo '<p class="date trigger_fade">';
        echo get_the_date('d/m/Y');
        echo '</p>';
        echo '<p class="hero-header trigger_fade">';
        echo $title;
        echo '</p>';


        if($subtitle && $author){
          echo '<p class="hero-subheader trigger_fade">';
          echo $subtitle;
          echo '</p>';
          echo '<p class="author trigger_fade">By ';
          echo $author;
          echo '</p>';
        }
      echo '</div><!-- #hero-text-wrapper -->'; ?>

      </div> <!-- .inner -->
    </div> <!-- .hero -->

    <div class="body-content">
      <div class="inner trigger_fade">
        <?php
        if( have_posts() ) : while( have_posts() ) : the_post();
        echo $content;
          endwhile;
        endif;
        ?>
      </div>
    </div> <!-- .body-content -->

    <?php include('components/resources-grid.php'); ?>

    <?php if($nextBtn){
      include('components/next-steps.php');
    } ?>

  </div> <!-- .inner -->
</div> <!-- .resource-single -->

<?php get_footer(); ?>
