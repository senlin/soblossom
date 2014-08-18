<?php
/**
 * The Single Post template
 * 
 * @package soblossom
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
	
	<header class="entry-header">
		<?php
			the_title( '<h1 class="entry-title single-title" itemprop="headline">', '</h1>' );

			soblossom_posted_on( '<div class="entry-meta">', '</div>' ); // defined in inc/soblossom.php
		?>
	</header><!-- .entry-header -->

	<section class="entry-content clearfix" itemprop="articleBody">
		<?php
			if ( has_post_thumbnail() ) {
				soblossom_featured_image(); // defined in inc/soblossom.php
			}

			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'soblossom' ),
				'after'  => '</div>',
			) );

		?>
	</section><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			soblossom_posted_in(); // defined in inc/soblossom.php
			
			edit_post_link( __( 'Edit', 'soblossom' ), '<span class="edit-link">', '</span>' );
		?>
	</footer><!-- .entry-meta -->

</article><!-- #post-## -->
