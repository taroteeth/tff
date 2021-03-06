<?php

$greyBg = get_sub_field('grey_background');
$contentTitle = get_sub_field('content_title');
$bodyContent = get_sub_field('body_content');

?>

<div class="rte <?php if($greyBg){ echo "grey-bg"; } ?>">
  <div class="inner <?php if(is_page('447')){echo "contact"; } ?>">

    <?php

    if($contentTitle){
      echo '<h2 id="content-title" class="header trigger_fade">';
      echo $contentTitle;
      echo '</h2>';
    }

    if($bodyContent){
      echo '<div id="content-inner" class="trigger_fade">';
      echo $bodyContent;
      echo '</div><!-- #content-inner -->';
    }

    ?>

  </div> <!-- .inner -->
</div> <!-- #rte -->
