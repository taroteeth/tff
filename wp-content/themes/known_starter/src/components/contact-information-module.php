<?php

$image = get_sub_field('image');
$address = get_sub_field('address');
$phone = get_sub_field('telephone');
$email = get_sub_field('email');

echo '<div class="contact-information-module">';
  echo '<div class="inner" >';
    if($image){
      echo '<div class="bubble-image-wrapper">';
      echo wp_get_attachment_image($image, 'full');
      echo '</div> <!-- #bubble-image-wrapper -->';
    }

    echo '<div class="text-wrapper">';

      echo '<p class="title">Contact Information</p>';

      if($address){
        echo '<div class="address">'. $address .'</div>';
      }

      if($phone){
        echo '<p class="phone">T: '. $phone .'</p>';
      }

      if($email){
        echo '<a class="email" href="mailto:'. $email .'">'. $email .'</a>';
      }

      echo '<div class="dir-btn-wrapper trigger_fade">';
      echo '<a target="_blank" rel="noopener" href="https://goo.gl/maps/CCFbXr4bMnv">';
      echo '<span>Directions</span>';
      echo '</a>';
      echo '</div><!-- .dir-btn-wrapper-->';

    echo '</div><!-- .text-wrapper -->';
    echo '</div><!-- inner -->';

echo '</div> <!-- #contact-information-module -->';


?>
