<?php
/**
 * @package soblossom
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix small-12 columns' ); ?>>

	<header class="entry-header">
		<?php
			the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' );

			if ( 'post' == get_post_type() ) {
				
				soblossom_posted_on( '<div class="entry-meta">', '</div>' );
			
			} //endif
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

		<?php if ( 'post' == get_post_type() ) { // Hide category and tag text for pages on Search
			
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'soblossom' ) );
			if ( $categories_list && soblossom_categorized_blog() ) { ?>
				<span class="cat-links">
					<?php printf( __( 'Posted in %1$s', 'soblossom' ), $categories_list ); ?>
				</span>
			<?php } //endif categories

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', __( ', ', 'soblossom' ) );
			if ( $tags_list ) { ?>
				<span class="tags-links">
					<?php printf( __( 'Tagged %1$s', 'soblossom' ), $tags_list ); ?>
				</span>
			<?php } // endif $tags_list
		} // endif 'post' == get_post_type()

		if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) { ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'soblossom' ), __( '1 Comment', 'soblossom' ), __( '% Comments', 'soblossom' ) ); ?></span>
		<?php } //endif

		edit_post_link( __( 'Edit', 'soblossom' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-meta -->

</article><!-- #post-## -->
