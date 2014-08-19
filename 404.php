<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package soblossom
 */

get_header(); ?>

	<div id="content" class="contentarea-wrap">
		
		<div id="inner-content" class="row">
	
			<main id="main" class="site-main small-12 medium-8 large-9 columns clearfix" role="main">

				<article id="404-notfound" class="error-404 not-found clearfix">
				
					<header class="entry-header">
						<h1 class="page-title"><?php _e( 'Nothing Here.', 'soblossom' ); ?></h1>
					</header><!-- .entry-header -->
				
					<section class="entry-content">
						<?php echo '<p>' . __( 'Apologies, there is nothing here. Maybe try a search or one of the links below or in the sidebar?', 'soblossom' ) . '</p>'; ?>
					</section><!-- .entry-content -->

					<section class="search-form">
						<?php get_search_form(); ?>
					</section><!-- .search -->
					
					<section class="suggested-content row">
						
						<div class="pages medium-6 columns">
							<?php
								echo '<h2>' . __( 'Pages', 'soblossom' ) . '</h2><ul>';
								wp_list_pages( 'title_li=' );
								echo '</ul>';
							?>
						</div> <!-- end .pages -->
						
						<div class="posts medium-6 columns">
							<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
						</div> <!-- end .posts -->
						
					</section> <!-- end .suggested-content -->
									
				</article><!-- #404-notfound -->
	
			</main><!-- #main.site-main -->
	
			<?php get_sidebar(); ?>
			
		</div> <!-- end #inner-content -->
	
	</div> <!-- end #content.contentarea-wrap -->

<?php get_footer(); ?>
