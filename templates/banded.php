<?php
/**
 * Template Name: Banded
 *
 * This template is based on the Foundation Banded template
 * @source: foundation.zurb.com/templates.html
 *
 * @package soblossom
 */

get_header(); ?>

	<div id="content" class="contentarea-wrap">
		
		<div id="inner-content" class="row">
	
			<main id="main" class="site-main small-12 columns clearfix" role="main">
				
				<!-- You will need to figure out where to pull this image from -->
				<img src="http://placehold.it/1000x150&amp;text=[banner-img]" title="" width="1000" height="150" alt="" />
				
				<hr />
						
				<?php while ( have_posts() ) { the_post(); ?>
	
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'banded-primary row' ); ?>>
	
						<div class="banded-thumb large-4 columns">
							<?php
								/**
								 * this is also an excellent place to use the aqua resizer script
								 * more info at inc/classes/aq_resizer.php
								 */
								the_post_thumbnail( array( 400, 300 ) );
							?>
						</div> <!-- end .banded-thumb -->
					
						<section class="entry-content large-8 columns">
					
							<?php
								/**
								 * Keep the banded template in mind when writing the content on the page you use this template for:
								 * <h3></h3>
								 * <div class="row">
								 * 	<div class="large-6 columns">
								 * 		<p></p>
								 * 	</div>
								 * 	<div class="large-6 columns">
								 * 		<p></p>
								 * 	</div>
								 * </div>
								 *
								 * @source: //foundation.zurb.com/templates/banded.html 
								 */
								the_content();
							?>
					
						</section><!-- .entry-content -->
						
					</article>
					
				<?php
					} //endwhile; // end of the loop.
					
					/**
					 * Start of a 2nd loop, for example for the about page,
					 * we will output the Excerpt of that page
					 * and add a readmore button linking to the page itself
					 */
					 
					 $banded_secondary_page = 'page_id='; // fill in the ID of the page you want to output below
					 
					 $banded = new WP_Query( $banded_secondary_page );
					 
					 while ( $banded->have_posts() ) { $banded->the_post();
					   
				?>
						 
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'banded-secondary row' ); ?>>
						
						<section class="entry-content large-8 columns">
						
							<div class="panel">
					
								<?php the_title( '<h3 class="banded-secondary-title">', '</h3>' ); ?>
						
								<?php the_excerpt(); ?>
								
								<a class="button small right" href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php _e( 'Find out more', 'soblossom' ); ?>">
									<?php _e( 'Find out more', 'soblossom' ); ?>
								</a>
							
							</div> <!-- end .panel -->
					
						</section><!-- .entry-content -->
												
						<div class="banded-secondary-thumb large-4 columns">
							<?php
								/**
								 * this is also an excellent place to use the aqua resizer script
								 * more info at inc/classes/aq_resizer.php
								 */
								the_post_thumbnail( array( 400, 300 ) );
							?>
						</div> <!-- end .banded-secondary-thumb -->
						
					</article>
					
				<?php
					} //endwhile; // end of the loop.
					wp_reset_postdata();
				?>
				
				<hr />

			</main><!-- #main.site-main -->
	
		</div> <!-- end #inner-content -->
	
	</div> <!-- end #content.contentarea-wrap -->

<?php get_footer(); ?>
