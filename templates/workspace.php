<?php
/**
 * Template Name: Workspace
 *
 * This template is based on the Foundation Workspace template
 *
 * @source: foundation.zurb.com/templates/workspace.html
 * @package soblossom
 */

get_header(); ?>

	<div id="content" class="contentarea-wrap">
		
		<div id="inner-content" class="row">
	
			<main id="main" class="site-main small-12 columns clearfix" role="main">
				
				<!-- You will need to figure out where to pull this image from -->
				<img src="http://placehold.it/1000x150&amp;text=[banner-img]" title="" width="1000" height="150" alt="" />
				
				<hr />
						
				<article class="services row">

					<section class="large-12 columns">
					
						<ul class="workspace-services small-block-grid-2 medium-block-grid-4">

							<?php
								/**
								 * We have adjusted the workspace template a bit and made the thumbs into a blockgrid, which seems better suitable
								 *
								 * this template assumes the CPT service, which you can of course change to anything you like
								 */
								 
								$workspace = new WP_Query( 
									array(
										'post_type' => 'service', // change to post type you would like to show here
										'posts_per_page' => 4,
										'orderby' => 'menu_order'
									)
								);
								
								if ( $workspace->have_posts() ) { while ( $workspace->have_posts() ) { $workspace->the_post(); ?>
		
									<li class="service-item">
										<?php
											/**
											 * this is also an excellent place to use the aqua resizer script
											 * more info at inc/classes/aq_resizer.php
											 */
											the_post_thumbnail( array( 250, 200 ) );
										?>
		
										<div class="panel">
							
											<?php the_title( '<h3 class="workspace-service-title">', '</h3>' ); ?>
									
											<p><?php the_excerpt(); ?></p>
											
											<a class="button small text-center" href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php _e( 'Learn more', 'soblossom' ); ?>">
												<?php _e( 'Learn more', 'soblossom' ); ?>
											</a>
										</div>
									</li> <!-- end .service-item -->
								
								<?php } // endwhile
	
								} else {
									echo '<li><img src="http://placehold.it/250x200&amp;text=[thumb]" title="" width="250" height="200" alt="" />' . __( 'as long as there is no services CPT, nothing will really happen here', 'soblossom' ) . '</li>';
									echo '<li><img src="http://placehold.it/250x200&amp;text=[thumb]" title="" width="250" height="200" alt="" />' . __( 'as long as there is no services CPT, nothing will really happen here', 'soblossom' ) . '</li>';
									echo '<li><img src="http://placehold.it/250x200&amp;text=[thumb]" title="" width="250" height="200" alt="" />' . __( 'as long as there is no services CPT, nothing will really happen here', 'soblossom' ) . '</li>';
									echo '<li><img src="http://placehold.it/250x200&amp;text=[thumb]" title="" width="250" height="200" alt="" />' . __( 'as long as there is no services CPT, nothing will really happen here', 'soblossom' ) . '</li>';
								
								} // endif (end of the loop)
								wp_reset_postdata();
							?>
							
						</ul> <!-- end .workspace-services -->

					</section><!-- .large-12 -->
				
				</article> <!-- end article -->

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'row' ); ?>>
					<div class="large-12 columns">
						<div class="row">
							<div class="large-8 columns">
								<div class="panel radius">
									
									<div class="entry-content row">
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
												<?php
													remove_filter( 'the_excerpt', 'wpautop' );
													the_excerpt();
												?>
											</h4>
				
											<div class="show-for-small text-center">
												<a href="#" class="small radius button"><?php _e( 'Call To Action!', 'soblossom' ); ?></a>
											</div>
											
											<div class="show-for-small text-center">
												<a href="#" class="small radius button"><?php _e( 'Call To Action!', 'soblossom' ); ?></a>
											</div>
				
										</div> <!-- end .medium-6 -->
										
										<div class="medium-6 small-12 columns">
				
											<?php the_content(); ?>
											
										</div> <!-- end .medium-6 -->
										
									<?php } //endwhile ?>
									
									</div> <!-- end .entry-content -->
								
								</div> <!-- end .panel.radius -->
							</div> <!-- end .large-8 -->

							<div class="large-4 columns hide-for-small">
				
								<h4><?php _e( 'More Information', 'soblossom' ); ?></h4>
								
								<hr/>
				
								<a class="large button expand" href="#">
									<?php _e( 'Download Brochure', 'soblossom' ); ?>
								</a>
				
								<a class="large button expand" href="#">
									<?php _e( 'Book Event', 'soblossom' ); ?>
								</a>
				
							</div> <!-- end .large-4 -->

						</div> <!-- end .row -->
					</div> <!-- end .large-12 -->
				</article> <!-- end .row --> 

				<article class="row">
					<div class="large-12 columns">
						<div class="panel">
							<h4><?php _e( 'Get in touch!', 'soblossom' ); ?></h4>
							<div class="row">
								<div class="large-9 columns">
									<p><?php _e( 'We\'d love to hear from you, you attractive person you.', 'soblossom' ); ?></p>
								</div> <!-- end .large-9 -->

								<div class="large-3 columns">
									<a href="#" class="radius button right"><?php _e( 'Contact Us', 'soblossom' ); ?></a>
								</div> <!-- end .large-3 -->
							</div> <!-- end .row -->
						</div> <!-- end .panel -->
					</div> <!-- end .large-12 -->
				</article> <!-- end .row -->
				
				<hr />
				
			</main> <!-- end .site-main -->
			
		</div> <!-- end #inner-content -->
		
	</div> <!-- end .contentarea-wrap -->

<?php get_footer(); ?>
