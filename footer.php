<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package soblossom
 */
?>

					<footer id="colophon" class="site-footer" role="contentinfo">
						
						<?php get_sidebar( 'footer' ); ?>
						
						<div class="site-info row">
							
							<nav class="footer-links small-12 medium-6 medium-push-6 columns">
								<?php soblossom_footer_nav(); ?>
							</nav>
							
							<div class="credits small-12 medium-6 medium-pull-6 columns">
						
							<?php
								printf( __( '&copy %1$s <a href="#page" title="back to top">%2$s</a>; %3$s theme by %4$s.', 'soblossom' ),
									date( 'Y' ),
									esc_attr( get_bloginfo( 'name' ) ),
									'<a href="http://so-wp.com/themes/soblossom/">soblossom</a>',
									'<a href="http://senlinonline.com" rel="designer">Piet Bos</a>'
								);
							?>
							
							</div> <!-- end .credits -->
							
						</div><!-- end .site-info -->
					
					</footer><!-- end #colophon -->

				</div> <!-- end #page .hfeed.site line 59 header.php -->

		</div> <!-- end .inner-wrap line 57 header.php -->
	
	</div> <!-- end .off-canvas-wrap line 55 header.php -->
							
	<?php // all js scripts are loaded in inc/soblossom.php
		wp_footer();
	?>

</body>

</html>