<?php

$btnLink = get_sub_field('button_link');
$btnText = get_sub_field('button_text');


echo '<div class="button">';
echo '<a href="'. $btnLink .'">';
echo $btnText;
echo '</a>';
echo '</div> <!-- #col-cta -->';

?>
