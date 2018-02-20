<?php
$greyBg = get_sub_field('grey_background');
$header = get_sub_field('header');
$headerDivider = get_sub_field('header_underline');
$image = get_sub_field('main_image');
$imageRound = get_sub_field('image_round');
$imagePos = get_sub_field('image_position');
$textContent = get_sub_field('text_content');
$cta = get_sub_field('cta_option');
?>

<div class="embedded-image-module">
  <div class="alt-grid">
    <div class="row-inner">
      <div class="img-block color">
        <?php echo wp_get_attachment_image($image, 'full'); ?>
      </div>
      <div class="text-block">
        <div class="text-inner">
          <div class="text-header fade_in">
            <p><?php echo $header ?></p>
          </div>
          <div class="text-copy fade_in">
            <p><?php echo $textContent ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
