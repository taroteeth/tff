<?php

	$orangeLine = get_sub_field('orange_line');

	echo '<div class="alt-grid">';

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
			$btnLink = get_sub_field('button_link');
			$btnPath = get_sub_field('button_path');
			$url = (!empty($btnPath)) ? get_permalink($btnPath[0]) : $btnLink;
			?>

			<div class="img-block <?php if($iteration % 2 !== 0){ echo 'right';}?>">

			<?php
			if($textBlockCta && ($btnLink || $btnPath)){
				echo '<a href="'. $url .'" class="cover-link"></a>';
			}

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

			echo '</div> <!-- .img-block -->';


			echo '<div class="text-block">';
				echo '<div class="text-inner">';
				if($textBlockHeader){ ?>
					<div class="text-header <?php if($orangeLine){echo 'divider';} ?>">
						 <?php echo $textBlockHeader ?>
					 </div> <!-- .text-header -->
				<?php }

				if($textBlockByline){
					echo '<p class="text-byline">'. $textBlockByline .'</p><!-- .text-byline -->';
				}

				if($textBlockCopy){
					echo '<p class="text-copy">'. $textBlockCopy .'</p><!-- .text-copy -->';
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

	echo '</div> <!-- .alt-grid -->';

?>
