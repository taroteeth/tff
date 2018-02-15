<?php

function button($id = null, $text = null, $class = null) {
  $btnLink = get_sub_field('button_link');
  $btnText = get_sub_field('button_text');
  $btnPath = get_sub_field('button_path');
  if($btnPath) $btnPath = $btnPath[0];

  if($id) {
    $btnPath = $id;
  }

  if($text) {
    $btnText = $text;
  }

  $url = $btnPath ? get_permalink($btnPath) : $btnLink;

  echo '<div class="btn-wrap trigger_fade">'; // figure out way to add fade in class and then attach to js
  echo '<a class="btn" href="'. $url .'">';
  echo '<span>' . $btnText . '</span>';
  echo '</a>';
  echo '</div><!-- .btn-wrap -->';
}

?>
