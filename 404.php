<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package outlet
 */

get_header(); ?>

	<div class="grid grid-pad">
		<div id="primary" class="content-area col-1-1">
			<main id="main" class="site-main" role="main">

				<section class="error-404 not-found" style="padding: 60px 0 100px;">
					<header class="page-header">
						<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'outlet' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'outlet' ); ?></p>

						<?php get_search_form(); ?>

						<?php if ( outlet_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
			
						<?php endif; ?>

					</div><!-- .page-content -->
				</section><!-- .error-404 -->

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- grid --> 

<?php get_footer(); ?>
