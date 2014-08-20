<?php
/**
 * The template for displaying Category archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package soblossom
 */

get_header(); ?>

	<div id="content" class="contentarea-wrap">
		
		<div id="inner-content" class="row">
	
			<main id="main" class="site-main small-12 medium-8 large-9 columns clearfix" role="main">

				<?php if ( have_posts() ) { ?>
		
					<header class="page-header">
						<h1 class="page-title">
							<?php single_cat_title(); ?>
						</h1>
						<?php
							// Show an optional term description.
							$term_description = term_description();
							if ( ! empty( $term_description ) ) {
								printf( '<div class="taxonomy-description">%s</div>', $term_description );
							} //endif
						?>
					</header><!-- .page-header -->
					
					<?php
						if ( function_exists( 'yoast_breadcrumb' ) ) {
							yoast_breadcrumb( '<div class="breadcrumbs clearfix">', '</div>' );
						}
					?>
		
					<?php /* Start the Loop */
					while ( have_posts() ) { the_post();
		
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'tplparts/content', 'excerpt' );
		
					} //endwhile
		
					soblossom_paging_nav();
		
				} else {
		
					get_template_part( 'tplparts/content', 'none' );
		
				} //endif ?>

			</main><!-- #main.site-main -->
	
			<?php get_sidebar(); ?>
			
		</div> <!-- end #inner-content -->
	
	</div> <!-- end #content.contentarea-wrap -->

<?php get_footer(); ?>
