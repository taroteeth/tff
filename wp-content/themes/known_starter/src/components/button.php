<?php

$btnLink = get_sub_field('button_link');
$btnText = get_sub_field('button_text');
$btnPath = get_sub_field('button_path'[0]);


echo '<div class="button">';

if($btnLink){
  echo '<a href="'. $btnLink .'">';
}
else {
  echo '<a href="'. $btnPath .'">';
}
echo $btnText;
echo '</a>';
echo '</div> <!-- #col-cta -->';

?>
