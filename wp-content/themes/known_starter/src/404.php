<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<div class="404-wrapper">

			<!-- article -->
			<article id="post-404">

				<p class="header"><?php _e( 'Page not found', 'html5blank' ); ?></p>
				<a class="home-link" href="<?php echo home_url(); ?>"><?php _e( '< Return home', 'html5blank' ); ?></a>

			</article>
			<!-- /article -->

		</div>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
