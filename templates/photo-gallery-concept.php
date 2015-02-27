<?php
/**
 * Template Name: Photo Gallery Concept
 *
 * @package soblossom
 */

get_header(); ?>

	<div id="content" class="contentarea-wrap">
		
		<div id="inner-content" class="row">
	
			<main id="main" class="site-main small-12 medium-8 columns clearfix" role="main">
		
				<?php while ( have_posts() ) { the_post();
	
					get_template_part( 'tplparts/content', 'page' );
	
				} //endwhile; // end of the loop. ?>
				
				<!-- here we prepare for the output of several galleries -->
				<ul class=" small-block-grid-2 medium-block-grid-3">

				<?php
					$galleries = rwmb_meta( '_soblossom_gallery_shortcode' ); // inc/cmb.php for details
					
					foreach ( $galleries as $gallery ) { ?>
					
 					<li class="text-center">
						<?php echo do_shortcode( $gallery ); ?>
					</li>
				<?php } // endforeach ?>
					
 				</ul>
				
			</main><!-- #main.site-main -->
			
			<?php get_sidebar(); ?>
	
		</div> <!-- end #inner-content -->
	
	</div> <!-- end #content.contentarea-wrap -->
	
	<section id="team" class="custom-content">
		
		<div class="container row">
			
			
		</div> <!-- end. container -->
		
	</section> <!-- end .custom-content -->

<?php get_footer(); ?>
