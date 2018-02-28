<?php

echo '<div id="team-grid">';
echo '<div class="inner">';

$args = array(
  'post_type' => 'team_member',
  'posts_per_page' => -1,
  'orderby' => 'menu_order',
  'post_status' => 'publish'
);

$team_query = new WP_Query($args);

if( $team_query->have_posts() ) :
  $rowCount = 1;
  $i = 1;
  while( $team_query->have_posts() ) : $team_query->the_post();
    $image = get_field('hero_image');
    $position = get_field('position');
    $name = get_the_title();
    $blurb = get_field('bio_blurb');
    $linkedIn = get_field('linkedin_url');
    $path = get_the_permalink();

    if($i == 1){
      echo '<div class="row">';
    } ?>

    <div class="photo-block grayscale <?php if($rowCount % 2 == 0){echo 'right';}?>"><?php
      if($image){
        echo '<div class="image-wrapper">';
        echo '<a href="'. $path .'">';
        echo wp_get_attachment_image($image, 'full');
        echo '</a>';
        echo '</div>';
      }
    echo '</div><!-- .photo-block -->';

    echo '<div class="content-block">';
      echo '<div class="content-inner">';
        if($position){
          echo '<p class="title trigger_fade">'. $position .'</p>';
        }

        if($name){
          echo '<p class="header trigger_fade">'. $name .'</p>';
        }

        if($blurb){
          echo '<div class="blurb trigger_fade">'. $blurb .'</div>';
        }
        ?>

        <div class="btns-wrap trigger_fade">

          <?php if($linkedIn) { ?>
          <a class="linkedIn" target="_blank" rel="noopener" href="<?php echo $linkedIn ?>">
            <svg width="23px" height="23px" viewBox="0 0 23 23"><use xlink:href="#linkedin"></use></svg>
          </a>
          <?php } ?>

          <a class="btn <?php if($linkedIn) echo 'plural' ?>" href="<?php echo $path ?>">
            <span>View Profile</span>
          </a>

        </div>

        <?php
        echo '</div><!-- .content-inner -->';
    echo '</div><!-- .content-block-->';

    $i++;

    if($i == 2){
      echo '</div><!-- .row -->';
      $i = 1;
      $rowCount++;
    }
  endwhile; // team query have posts
  wp_reset_postdata();
endif; // team query have posts

echo '</div><!-- .inner -->';
echo '</div><!-- #team-grid-->';


?>
