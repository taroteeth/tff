<?php get_header(); ?>

	<div class="search-result-content">
	<div class="inner">

		<?php if(have_posts()){
			$foundPosts = $wp_query->found_posts;
			$plural = '';

			if($foundPosts !== '1'){
				$plural = 's';
			}

			//if s is blank, output "no results found"

			//
			echo '<h1>'. sprintf( __( '%s Result'. $plural .' for \'', 'html5blank' ), $wp_query->found_posts ); echo '<span>'. get_search_query() .'</span>' .'\'</h1>';

			echo '<div id="grid-wrapper">';

			//while loop
			 while ( have_posts() ) : the_post();
			 $image = get_field_object('components')['value'][0]['main_image'];
			 if(!$image) $image = get_field('cover_photo', $post->ID);
			 if(!$image) $image = get_field('hero_image', $post->ID);
			 $pdf = get_field('pdf', $post->ID);

			 echo '<div class="article-wrapper">';

			 if($image){
								echo wp_get_attachment_image($image, 'full');
							};
							
			 echo '<div class="text-wrapper">';
			 echo '<p class="header">'. get_the_title() .'</p>';

			 echo '<div class="button">';
			 echo '<a href="'. get_permalink() .'">';
				 if($pdf){
					 echo '<span>Download PDF</span>';
				 } else {
					 echo '<span>Read Article</span>';
				 }
			 echo '</a>';
			 echo '</div><!-- .button -->';

			 echo '</div> <!-- .text-wrapper -->';
			 echo '</div> <!-- .article-wrapper -->';
			 endwhile;
		echo '</div> <!-- .grid-wrapper -->';
		}
		else {
			echo '<h2 class="results">No results for \'<span class="query-term">'. get_search_query() .'</span>\'</h2>';

			echo '<div class="home-wrapper"><a class="home-path" href="'. get_permalink('6') .'">Return Home</a></div>';
		}?>

	</div>
	</div><!-- .search-result-content -->


<?php get_footer(); ?>
