<?php
/**
 * The Template for displaying all single posts.
 *
 * @package soblossom
 */

get_header(); ?>

	<div id="content" class="contentarea-wrap">

		<div id="inner-content" class="row">
	
			<main id="main" class="site-main small-12 medium-8 large-9 columns clearfix" role="main">

				<?php while ( have_posts() ) { the_post();
		
					get_template_part( 'tplparts/content', 'single' );
		
					soblossom_post_nav(); // defined in inc/soblossom.php
		
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) {
						comments_template();
					} //endif
		
				} //endwhile end of the loop. ?>

			</main><!-- #main.site-main -->
	
			<?php get_sidebar(); ?>
			
		</div> <!-- end #inner-content -->
	
	</div> <!-- end #content.contentarea-wrap -->

<?php get_footer(); ?>
