<?php get_header(); ?>

	<div class="search-result-content">
	<div class="inner">

		<?php if(have_posts()){
			$foundPosts = $wp_query->found_posts;
			$plural = '';

			if($foundPosts !== '1'){
				$plural = 's';
			}

			echo '<h1>'. sprintf( __( '%s Result'. $plural .' for \'', 'html5blank' ), $wp_query->found_posts ); echo get_search_query() .'\'</h1>';

			echo '<div id="grid-wrapper">';

			//while loop
			 while ( have_posts() ) : the_post();
			 $image = get_field('cover_photo', $p->ID);

			 echo '<div class="article-wrapper">';
			 if($image){
								echo wp_get_attachment_image($image);
							};
			 echo '<div class="text-wrapper">';
			 echo '<h2>'. get_the_title() .'</h2>';
			 //btn
			 echo '<a href="'. get_permalink() .'"></a>';
			 //end btn
			 echo '</div> <!-- .text-wrapper -->';
			 echo '</div> <!-- .article-wrapper -->';
			 endwhile;
		echo '</div> <!-- .grid-wrapper -->';
		}
		else {
			echo '<h2>No results for \'<span class="query-term">'.get_search_query() .'</span>\'</h2>';
		}?>

	</div>
	</div><!-- .search-result-content -->


<?php get_footer(); ?>
