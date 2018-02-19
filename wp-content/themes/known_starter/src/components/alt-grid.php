<?php

	$orangeLine = get_sub_field('orange_line'); ?>

	<div class="alt-grid <?php if(is_page('case-studies')) {echo ' case-studies';} ?>"> <?php

	 if( have_rows('grid_row') ):

		$iteration = 0;
		$numberIteration = 0;

		while( have_rows('grid_row') ): the_row();

			echo '<div class="row-inner">';

			// vars
			$numberedGrid = get_sub_field('numbered_option');
			$imgBlockBackground = get_sub_field('img_block_background_image');
			$imgBlockTitle = get_sub_field('img_block_title');
			$imgBlockCaption = get_sub_field('img_block_caption_text');
			$textBlockHeader = get_sub_field('text_block_header');
			$textBlockByline = get_sub_field('text_block_byline');
			$textBlockCopy = get_sub_field('text_block_copy');
			$textBlockCta = get_sub_field('text_block_cta');
			$centeredButton = get_sub_field('centered_button');
			$btnLink = get_sub_field('button_link');
			$btnPath = get_sub_field('button_path');
			$url = (!empty($btnPath)) ? get_permalink($btnPath[0]) : $btnLink;
			?>

			<div class="img-block <?php if($iteration % 2 !== 0){ echo 'right';} if($numberedGrid){echo ' number';} if(!$numberedGrid){echo ' grayscale';}?>">

			<?php
			if($textBlockCta && ($btnLink || $btnPath)){
				echo '<a href="'. $url .'" class="cover-link"></a>';
			}

			if($numberedGrid){ // numbered svgs
				if($numberIteration == 0){ ?>
					<svg class="numbersvg" viewBox="0 0 315 240">
					  <g transform="translate(-787.000000, -1548.000000)">
					      <path d="M835.986482,1668.24942 C835.986482,1691.8993 839.3913,1712.07126 847.903344,1725.63516 C854.712979,1736.76452 865.267913,1744.06816 881.270555,1744.06816 C897.61368,1744.06816 907.487651,1736.76452 914.297286,1725.63516 C923.149811,1712.07126 926.554629,1691.8993 926.554629,1668.24942 C926.554629,1644.59953 923.149811,1624.42757 914.297286,1610.86367 C907.487651,1599.73431 897.61368,1592.43067 881.270555,1592.43067 C865.267913,1592.43067 854.712979,1599.73431 847.903344,1610.86367 C839.3913,1624.42757 835.986482,1644.59953 835.986482,1668.24942 Z M789,1668.24942 C789,1639.38265 793.426263,1611.21146 808.40746,1587.90937 C823.048175,1565.65066 846.881898,1550 881.270555,1550 C915.659213,1550 939.492935,1565.65066 953.793169,1587.90937 C968.774366,1611.21146 973.541111,1639.38265 973.541111,1668.24942 C973.541111,1697.11619 968.774366,1725.28737 953.793169,1748.58946 C939.492935,1770.84818 915.659213,1786.49884 881.270555,1786.49884 C846.881898,1786.49884 823.048175,1770.84818 808.40746,1748.58946 C793.426263,1725.28737 789,1697.11619 789,1668.24942 Z M1100.41041,1780.93416 L1100.41041,1555.21689 L1059.89308,1555.21689 C1055.46682,1578.86677 1032.99502,1597.29977 1000.64925,1597.64756 L1000.64925,1629.99225 L1053.76441,1629.99225 L1053.76441,1780.93416 L1100.41041,1780.93416 Z" id="01"></path>
					  </g>
					</svg>
				<?php } elseif($numberIteration == 1) {
					echo '<svg class="numbersvg" viewBox="0 0 382 240">
				        <use xlink:href="#number-02"></use>
				      </svg>';
				} elseif($numberIteration == 2) {
					echo '<svg class="numbersvg" viewBox="0 0 385 240">
				        <use xlink:href="#number-03"></use>
				      </svg>';
				} elseif($numberIteration == 3) {
					echo '<svg class="numbersvg" viewBox="0 0 407 240">
				        <use xlink:href="#number-04"></use>
				      </svg>';
				}
			} else {
				if($imgBlockBackground){ ?>
					<img srcset="<?php echo wp_get_attachment_image_srcset($imgBlockBackground, 'full'); ?>" src="<?php echo wp_get_attachment_image_url($imgBlockBackground);?>" />
				<?php }

				if($imgBlockTitle){
					echo '<div class="image-block-title">';
					echo $imgBlockTitle;
					echo '</div><!-- .image-block-title -->';
				}

				if($imgBlockCaption){
					echo '<div class="image-block-caption">';
					echo $imgBlockCaption;
					echo '</div><!-- image-block-caption -->';
				}
			}

			echo '</div> <!-- .img-block -->';


			echo '<div class="text-block">';
				echo '<div class="text-inner">';
				if($textBlockHeader){ ?>
					<div class="text-header trigger_fade <?php if($orangeLine){echo 'divider';} ?>">
						 <?php echo $textBlockHeader ?>
					 </div> <!-- .text-header -->
				<?php }

				if($textBlockByline){
					echo '<p class="text-byline trigger_fade">'. $textBlockByline .'</p><!-- .text-byline -->';
				}

				if($textBlockCopy){ ?>
					<div class="text-copy trigger_fade <?php if(is_page('case-studies')){ echo ' center'; }?>"><?php echo $textBlockCopy ?></div><!-- .text-copy --> <?php
				}

				if($textBlockCta){
					if(is_page('case-studies')){
						button($id, $text, 'align-center');
					} else {
						button();
					}
				}

				echo '</div> <!-- .text-inner -->';
			echo '</div> <!-- .text-block -->';

			echo '</div> <!-- .row-inner -->';
			$numberIteration++;
			$iteration++;

		endwhile;


	endif;

	echo '</div> <!-- .alt-grid -->';

?>
