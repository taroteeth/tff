<?php // TEMPLATE NAME: Resources

get_header();

//hero
$heroTitle = get_field('hero_title');
$heroHeader = get_field('hero_header');
$heroSubheader = get_field('hero_subheader');

echo '<div class="hero resources-hero">';
  echo '<div class="hero-text-wrapper">';
  if($heroTitle){
    echo '<p class="hero-title">'. $heroTitle .'</p>';
  }

  if($heroHeader){
    echo '<p class="header">'. $heroHeader. '</p>';
  }

  if($heroSubheader){
    echo '<div id="subheader">'. $heroSubheader .'</div>';
  }
  echo '</div> <!-- #hero-text-wrapper -->';
echo '</div> <!-- #hero -->';

include('components/featured-resources.php');

include('components/resources-grid.php');

include('components/components.php');

get_footer();

?>
