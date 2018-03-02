<?php

$greyBg = get_sub_field('grey_background');
$header = get_sub_field('section_header');

?>

<div id="section-header" class="<?php if($greyBg){ echo "grey-bg"; } ?>">
  <div class="inner">

    <?php

    if($header){
      echo '<h2 class="header">';
      echo $header;
      echo '</h2>';
    }

    ?>

  </div> <!-- .inner -->
</div> <!-- #section-header -->
