<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package soblossom
 */

get_header(); ?>

	<div id="content" class="contentarea-wrap">
		
		<div id="inner-content" class="row">
	
			<main id="main" class="site-main small-12 medium-8 large-9 columns clearfix" role="main">

				<?php if ( have_posts() ) { ?>
		
					<header class="page-header">
						<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'soblossom' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					</header><!-- .page-header -->
		
					<?php
						if ( function_exists( 'yoast_breadcrumb' ) ) {
							yoast_breadcrumb( '<div class="breadcrumbs clearfix">', '</div>' );
						}
					?>

					<?php /* Start the Loop */
					while ( have_posts() ) { the_post();
		
						get_template_part( 'tplparts/content', 'excerpt' );
		
					} //endwhile;
		
					soblossom_paging_nav();
		
				} else {
		
					get_template_part( 'tplparts/content', 'none' );
		
				} //endif; ?>

			</main><!-- #main.site-main -->
	
			<?php get_sidebar(); ?>
			
		</div> <!-- end #inner-content -->
	
	</div> <!-- end #content.contentarea-wrap -->

<?php get_footer(); ?>
