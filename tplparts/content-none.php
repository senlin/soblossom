<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package soblossom
 */
?>

<section class="no-results not-found clearfix">

	<header class="entry-header">
		<h1 class="entry-title"><?php _e( 'Nothing Found', 'soblossom' ); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php 
			if ( is_home() && current_user_can( 'publish_posts' ) ) {

				printf( '<p>' . __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'soblossom' ) . '</p>', esc_url( admin_url( 'post-new.php' ) ) );

			} elseif ( is_search() ) {
				
				echo '<p>' . __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'soblossom' ) . '</p>';
				get_search_form();
			
			} else {

				echo '<p>' . __( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'soblossom' ) . '</p>';
				get_search_form();

			} //endif
		?>
	</div><!-- .entry-content -->

</section><!-- .no-results -->
