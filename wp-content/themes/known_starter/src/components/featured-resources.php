<?php

$featuredPosts = get_field('featured_posts');
$featuredPostIds = [];

echo '<div class="featured-resources">';
if($featuredPosts){
  echo '<ul>';
  foreach ($featuredPosts as $p):
    $featuredPostIds[] = $p->ID;

    $title = get_the_title($p->ID);
    $subtitle = get_field('subtitle', $p->ID);
    $image = get_field('cover_photo', $p->ID);
    $date = get_the_date("m/d/y", $p->ID);
    $permalink = get_permalink($p->ID);
    $pdf = get_field('pdf', $p->ID);

    echo '<li>';
    if($image){
      echo '<div class="image-wrapper">';
      echo wp_get_attachment_image($image, 'full');
      echo '</div> <!-- .image-wrapper -->';
    };
    echo '<div class="text-wrapper">';
    echo '<p class="date">'. $date .'</p>';
    echo '<a class="header-link" href="'. $permalink .'"><p class="header">'. $title .'</p></a>';
    echo '<p class="subheader">'. $subtitle .'</p>';

    echo '<div class="button">';
    echo '<a href="'. $permalink .'">';
    echo '<span>';

      if($pdf){
        echo 'Download PDF';
      } else {
        echo 'Read Article';
      }
    echo '</span>';
    echo '</a>';
    echo '</div>';

    echo '</div> <!-- .text-wrapper -->';
    echo '</li>';

  endforeach;
  $excludePages = $featuredPostIds;
  echo '</ul>';
};
echo '</div> <!-- #featured-resources -->';

?>
