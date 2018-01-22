<?php

$btnLink = get_sub_field('button_link');
$btnText = get_sub_field('button_text');
$btnPath = get_sub_field('button_path');


echo '<div class="button">';

if($btnPath){
  echo '<a class="test" href="'. get_permalink($btnPath[0]) .'">';
}
else {
  echo '<a href="'. $btnLink .'">';
}
echo $btnText;
echo '</a>';
echo '</div> <!-- .button -->';

?>
