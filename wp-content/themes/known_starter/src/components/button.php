<?php

$btnLink = get_sub_field('button_link');
$btnText = get_sub_field('button_text');
$btnPath = get_sub_field('button_path'[0]);


echo '<div class="button">';
echo $btnPath;

if($btnPath){
  echo '<a class="test" href="'. $btnPath .'">';
}
else {
  echo '<a href="'. $btnLink .'">';
}
echo $btnText;
echo '</a>';
echo '</div> <!-- #col-cta -->';

?>
