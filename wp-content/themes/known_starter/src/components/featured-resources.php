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
    $pdfAttachment = get_field('pdf_document', $p->ID);

    echo '<li class="trigger_fade">';
    if($image){
      echo '<div class="image-wrapper">';
      echo '<div class="image-inner-wrapper">';
      echo wp_get_attachment_image($image, 'full');
      echo '</div> <!-- .image-inner-wrapper -->';
      echo '</div> <!-- .image-wrapper -->';
    };
    echo '<div class="text-wrapper">';
    echo '<p class="date">'. $date .'</p>';
    if($pdf){
      echo '<a class="header-link" href="'. wp_get_attachment_url($pdfAttachment) .'"><p class="header">'. $title .'</p></a>';
    } else {
      echo '<a class="header-link" href="'. $permalink .'"><p class="header">'. $title .'</p></a>';
    }
    echo '<p class="subheader">'. $subtitle .'</p>';

    echo '<div class="button">';

    if($pdf){
      echo '<a target="_blank" href="'. wp_get_attachment_url($pdfAttachment) .'">';
      echo '<span>Download PDF</span>';
      echo '</a>';
    } else {
      echo '<a href="'. $permalink .'">';
      echo '<span>Read Article</span>';
      echo '</a>';
    }
    echo '</div><!-- .button -->';

    echo '</div> <!-- .text-wrapper -->';
    echo '</li>';

  endforeach;
  $excludePages = $featuredPostIds;
  echo '</ul>';
};
echo '</div> <!-- #featured-resources -->';

?>
