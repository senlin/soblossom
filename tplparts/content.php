<?php
/**
 * @package soblossom
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>

	<header class="entry-header">
		<?php
			the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' );

			if ( 'post' == get_post_type() ) {
				soblossom_posted_on( '<div class="entry-meta">', '</div>' );
			} //endif

			if ( function_exists( 'yoast_breadcrumb' ) ) {
				yoast_breadcrumb( '<div class="breadcrumbs clearfix">', '</div>' );
			}
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content( __( 'Continue reading <i class="fa fa-long-arrow-right"></i>', 'soblossom' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'soblossom' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">

	</footer><!-- .entry-meta -->

</article><!-- #post-## -->
