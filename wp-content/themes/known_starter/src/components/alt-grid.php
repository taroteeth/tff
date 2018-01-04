<?php

	$orangeLine = get_sub_field('orange_line');

	echo '<div id="alt-grid">';

	 if( have_rows('grid_row') ):
		$iteration = 0;

		while( have_rows('grid_row') ): the_row();

			echo '<div class="row-inner">';

			// vars
			$imgBlockBackground = get_sub_field('img_block_background_image');
			$imgBlockTitle = get_sub_field('img_block_title');
			$imgBlockCaption = get_sub_field('img_block_caption_text');
			$textBlockHeader = get_sub_field('text_block_header');
			$textBlockByline = get_sub_field('text_block_byline');
			$textBlockCopy = get_sub_field('text_block_copy');
			$textBlockCta = get_sub_field('text_block_cta');

			?>

			<div id="img-block" class="<?php if($iteration % 2 !== 0){ echo 'right';}?>"> <?php
			if($textBlockCta){
				echo '<a href="">';
			}

			if($imgBlockBackground){ ?>
				<div class="img-block-inner"></div>
				<img srcset="<?php echo wp_get_attachment_image_srcset($imgBlockBackground, 'full'); ?>" src="<?php echo wp_get_attachment_image_url($imgBlockBackground);?>" />
			<?php }

			if($imgBlockTitle){
				echo '<div id="image-block-title">';
				echo $imgBlockTitle;
				echo '</div><!-- #image-block-title -->';
			}

			if($imgBlockCaption){
				echo '<div id="image-block-caption">';
				echo $imgBlockCaption;
				echo '</div><!-- image-block-caption -->';
			}

			if($textBlockCta){
				echo '</a>'; 
			}

			echo '</div> <!-- .img-block -->';


			echo '<div class="text-block">';
				echo '<div class="text-inner">';
				if($textBlockHeader){ ?>
					<div id="text-header" class="<?php if($orangeLine){echo 'divider';} ?>">
						 <?php echo $textBlockHeader ?>
					 </div> <!-- #text-header -->
				<?php }

				if($textBlockByline){
					echo '<p id="text-byline">'. $textBlockByline .'</p><!-- #text-byline -->';
				}

				if($textBlockCopy){
					echo '<p id="text-copy">'. $textBlockCopy .'</p><!-- #text-copy -->';
				}

				if($textBlockCta){
					echo '<div class="button-wrapper">';
					include('button.php');
					echo '</div>';
				}

				echo '</div> <!-- .text-inner -->';
			echo '</div> <!-- .text-block -->';

			echo '</div> <!-- .row-inner -->';
			$iteration++;

		endwhile;


	endif;

	echo '</div> <!-- #alt-grid -->';

?>
