<?php

$greyBg = get_sub_field('grey_background');
$header = get_sub_field('header');
$headerDivider = get_sub_field('header_underline');
$image = get_sub_field('main_image');
$imageRound = get_sub_field('image_round');
$imagePos = get_sub_field('image_position');
$textContent = get_sub_field('text_content');
$cta = get_sub_field('cta_option');

echo '<div id="embed-image-module">';
  echo '<div id="inner" >';
    if($image){ ?>
      <div id="embed-image-wrapper" class="<?php if($imagePos === 'Left'){echo 'left';} if($imageRound){echo ', round';}?>"> <?php
      echo wp_get_attachment_image($image);
      echo '</div> <!-- #embed-image-wrapper -->';
    } ?>

    <div id="text-wrapper" class="<?php if($imagePos === 'Left'){echo 'right';}?>"> <?php

      if($header){ ?>
        <p class="header <?php if($headerDivider){echo ', divider';}?>"> <?php
        echo $header;
        echo '</p>';
      }

      if($textContent){
        echo '<div id="body-content">'. $textContent .'</div>';
      }

      if($cta){
        include('button.php');
      }

    echo '</div><!-- #text-wrapper -->';
    echo '</div><!-- inner -->';

echo '</div> <!-- #embed-image-module -->';

?>
