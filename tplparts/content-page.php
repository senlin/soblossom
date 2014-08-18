<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package soblossom
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> itemscope itemtype="http://schema.org/WebPage">

	<?php the_title( '<header class="entry-header"><h1 class="page-title">', '</h1></header><!-- .entry-header -->' ); ?>

	<section class="entry-content" itemprop="articleBody">

		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'soblossom' ),
				'after'  => '</div>',
			) );
		?>

	</section><!-- .entry-content -->
	
	<?php edit_post_link( __( 'Edit', 'soblossom' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>

</article><!-- #post-## -->
