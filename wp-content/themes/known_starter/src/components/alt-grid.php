<?php

	$orangeLine = get_sub_field('orange_line');

	echo '<div class="alt-grid">';

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

			<div class="img-block <?php if($iteration % 2 !== 0){ echo 'right';} if($numberedGrid){echo ' number';}?>">

			<?php
			if($textBlockCta && ($btnLink || $btnPath)){
				echo '<a href="'. $url .'" class="cover-link"></a>';
			}

			if($numberedGrid){ // numbered svgs
				if($numberIteration == 0){
					echo '<svg class="numbersvg" viewBox="0 0 315 240">
				        <use xlink:href="#number-01">
								
								</use>
				      </svg>';
				} elseif($numberIteration == 1) {
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
					<div class="text-header trigger_fade <?php if($orangeLine){echo 'divider';} if(is_page('case-studies')){echo ' caps-header';}?>">
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
					if($centeredButton){
						echo '<div class="center-wrap">';
					}
					button();
					if($centeredButton){
						echo '</div><!-- .center-wrap-->';
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
