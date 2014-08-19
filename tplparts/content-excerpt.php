<?php
/**
 * The template part for displaying the excerpts (search and (category)archives).
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package soblossom
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'row clearfix' ); ?>>

	<header class="entry-header small-12 columns">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header><!-- .entry-header -->
	
	<div class="teaser-img small-3 columns">
		<?php
			echo '<a href="' . esc_url( get_the_permalink() ) . '">';
			
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'thumbnail' );
			} else {
				echo '<img src="' . get_template_directory_uri() . '/images/default-thumb.png" width="150" height="150" alt="article-thumb" />';
			}
			echo '</a>';
		?>
	</div>
	
	<div class="teaser-text small-9 columns">

		<div class="entry-meta">
			<?php soblossom_posted_on(); ?>
		</div><!-- .entry-meta -->
	
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	
		<footer class="entry-meta">
	
		</footer><!-- .entry-meta -->
	</div>

</article><!-- #post-## -->
