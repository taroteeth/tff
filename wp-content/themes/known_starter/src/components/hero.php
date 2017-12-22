<?php

//still need to bring in orange bar as after pseudoelement

$greyBg = get_sub_field('grey_background');
$heroHeader = get_sub_field('hero_header');
$heroContent = get_sub_field('text_content');
$image = get_sub_field('main_image');
$imagePos = get_sub_field('main_image_position');
$orangeCircle = get_sub_field('orange_circle');
$blurbButton = get_sub_field('blurb_button');
$blurbText = get_sub_field('blurb_button_text');

?>

<div id="hero" class="<?php if($greyBg){ echo "grey-bg"; } ?>">
  <div class="inner">

    <?php

    if($image){ ?>
      <div id="hero-photo" class="<?php echo $imagePos == "Left" ? "image-left" : "image-right";?>">
        <img srcset="<?php echo wp_get_attachment_image_srcset($image, 'full'); ?>" src="<?php echo wp_get_attachment_image_url($image);?>" /> <?php
      echo '</div> <!-- #hero-photo -->';
    }

    echo '<div class="text-inner">';

      if(is_page('6')){
        echo '<svg width="17px" height="17px" viewBox="0 0 17 17"><use xlink:href="#color-logo"></use></svg> ';
       } else {
        echo '<p class="hero-title">' . get_the_title() . '</p>';
      }

      if($heroHeader){
        echo '<p class="header">' . $heroHeader . '</h1>';
      }

      if($heroContent){
        echo '<p>'. $heroContent .'</p>';
      }

    echo '</div> <!-- .text-inner -->';

    if($orangeCircle){ ?>
      <div id="orange-circle" class="<?php if($imageLeft){ echo "circle-right"; } if($imageRight){ echo "circle-left"; }?>"> <?php
        echo $orangeCircle;
      echo '</div> <!-- #orange-circle --> ';
    }

  echo '</div>';

  if($blurbButton){
    echo '<div id="blurb-button">';
    echo $blurbText;
    echo '</div>';
  }

echo '</div> <!-- #hero -->';
?>
