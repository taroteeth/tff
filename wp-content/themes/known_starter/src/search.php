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
			 $image = get_field('cover_photo', $p->ID);
			 $pdf = get_field('pdf', $p->ID);

			 echo '<div class="article-wrapper">';
			 if($image){
								echo wp_get_attachment_image($image, 'full');
							};
			 echo '<div class="text-wrapper">';
			 echo '<h2>'. get_the_title() .'</h2>';

			 echo '<div class="button">';
			 echo '<a href="'. get_permalink() .'">';
				 if($pdf){
					 echo 'Download PDF';
				 } else {
					 echo 'Read Article';
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

			echo '<a class="home-path" href="'. get_permalink('6') .'">Return Home</a>'; // add svg
		}?>

	</div>
	</div><!-- .search-result-content -->


<?php get_footer(); ?>
