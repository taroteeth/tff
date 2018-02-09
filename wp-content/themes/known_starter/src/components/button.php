<?php

$btnLink = get_sub_field('button_link');
$btnText = get_sub_field('button_text');
$btnPath = get_sub_field('button_path');

$url = $btnPath ? get_permalink($btnPath[0]) : $btnLink;

echo '<div class="btn-wrap">';
echo '<a class="btn" href="'. $url .'">';
echo '<span>' . $btnText . '</span>';
echo '</a>';
echo '</div><!-- .btn-wrap -->';

?>
