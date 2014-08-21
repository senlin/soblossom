<?php
/**
 * Template Name: Workspace
 *
 * This template is based on the Foundation Workspace template
 * and still needs some serious work
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
						
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'services row' ); ?>>

					<section class="entry-content large-12 columns">
				
						<ul class="workspace-services small-block-grid-2 medium-block-grid-4">

						<?php
							/**
							 * We have adjusted the workspace template a bit and made the thumbs into a blockgrid, which seems better suitable
							 *
							 * this template assumes the CPT service, which you can of course change to anything you like
							 *
							 * @source: //foundation.zurb.com/templates/workspace.html
							 */
							 
							$workspace = new WP_Query( 
								array(
									'post_type' => 'service', // change to post type you would like to show here
									'posts_per_page' => 4,
									'orderby' => 'menu_order'
								)
							);
							
							while ( $workspace->have_posts() ) { $workspace->the_post();
						?>
	
							<li class="service-item">
								<?php
									/**
									 * this is also an excellent place to use the aqua resizer script
									 * more info at inc/classes/aq_resizer.php
									 */
									the_post_thumbnail( array( 250, 250 ) );
								?>
								<div class="panel">
					
									<?php the_title( '<h3 class="workspace-service-title">', '</h3>' ); ?>
							
									<p><?php the_excerpt(); ?></p>
									
									<a class="button small text-center" href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php _e( 'Learn more', 'soblossom' ); ?>">
										<?php _e( 'Learn more', 'soblossom' ); ?>
									</a>
								</div>
							</li> <!-- end .service-item -->
							
						<?php
							} //endwhile; // end of the loop.
							wp_reset_postdata();
						?>

						</ul> <!-- end. workspace-services -->
					
					</section><!-- .entry-content -->
						
				</article>
						 
				<div class="row">
					<div class="large-12 columns">
						<div class="row">
							<div class="large-8 columns">
								<div class="panel radius">
									<div class="row">

									<?php
										/**
										 * Start of a the main loop, for example for the home page,
										 * we use the excerpt as the sub header text and the content
										 * of the page as the content next to the header stuff.
										 */
										 
										 while ( have_posts() ) { the_post();
										   
									?>
														
										<div class="medium-6 small-12 columns">
											<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
											<hr/>
											<h4 class="subheader">
												<?php the_excerpt(); ?>
											</h4>
				
											<div class="show-for-small text-center">
												<a href="#" class="small radius button"><?php _e( 'Call To Action!', 'soblossom' ); ?></a>
											</div>
											
										</div>
										<div class="medium-6 small-12 columns">
				
											<?php the_content(); ?>
											
											<div class="show-for-small text-center">
												<a href="#" class="small radius button"><?php _e( 'Call To Action!', 'soblossom' ); ?></a>
											</div>
				
										</div>
				
									</div>
								</div>
							</div>
				
							<div class="large-4 columns hide-for-small">
				
								<h4><?php _e( 'More Information', 'soblossom' ); ?></h4>
								
								<hr/>
				
								<a class="large button expand" href="#">
									<?php _e( 'Download Brochure', 'soblossom' ); ?>
								</a>
				
								<a class="large button expand" href="#">
									<?php _e( 'Book Event', 'soblossom' ); ?>
								</a>
				
							</div>
				
						</div>
					
					</div>
				
				</div>

				<div class="row">
					<div class="large-12 columns">
						<div class="panel">
							<h4><?php _e( 'Get in touch!', 'soblossom' ); ?></h4>
							<div class="row">
								<div class="large-9 columns">
									<p><?php _e( 'We\'d love to hear from you, you attractive person you.', 'soblossom' ); ?></p>
								</div>
								<div class="large-3 columns">
									<a href="#" class="radius button right"><?php _e( 'Contact Us', 'soblossom' ); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<hr />

			</main><!-- #main.site-main -->
	
		</div> <!-- end #inner-content -->
	
	</div> <!-- end #content.contentarea-wrap -->

<?php get_footer(); ?>
