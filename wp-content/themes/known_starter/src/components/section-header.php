<?php

$greyBg = get_sub_field('grey_background');
$header = get_sub_field('section_header');

?>

<div id="section-header" class="<?php if($greyBg){ echo "grey-bg"; } ?>">
  <div class="inner">

    <?php

    if($header){
      echo '<p class="header">';
      echo $header;
      echo '</p>';
    }

    ?>

  </div> <!-- .inner -->
</div> <!-- #section-header -->
