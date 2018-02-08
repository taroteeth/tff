<?php

$greyBg = get_sub_field('grey_background');
$contentTitle = get_sub_field('content_title');
$bodyContent = get_sub_field('body_content');

?>

<div class="rte <?php if($greyBg){ echo "grey-bg"; } ?>">
  <div class="inner <?php if(is_page('447')){echo "contact"; } ?>">

    <?php

    if($contentTitle){
      echo '<p id="content-title" class="header">';
      echo $contentTitle;
      echo '</p>';
    }

    if($bodyContent){
      echo '<div id="content-inner">';
      echo $bodyContent;
      echo '</div><!-- #content-inner -->';
    }

    ?>

  </div> <!-- .inner -->
</div> <!-- #rte -->
