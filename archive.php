<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package soblossom
 */

get_header(); ?>

<div class="contentarea-wrap">

	<div id="primary" class="content-area clearfix">

		<main id="main" class="site-main row" role="main">

		<?php if ( have_posts() ) { ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						if ( is_category() ) {
							single_cat_title();

						} elseif ( is_tag() ) {
							single_tag_title();

						} elseif ( is_author() ) {
							printf( __( 'Author: %s', 'soblossom' ), '<span class="vcard">' . get_the_author() . '</span>' );

						} elseif ( is_day() ) {
							printf( __( 'Day: %s', 'soblossom' ), '<span>' . get_the_date() . '</span>' );

						} elseif ( is_month() ) {
							printf( __( 'Month: %s', 'soblossom' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'soblossom' ) ) . '</span>' );

						} elseif ( is_year() ) {
							printf( __( 'Year: %s', 'soblossom' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'soblossom' ) ) . '</span>' );

						} else {
							_e( 'Archives', 'soblossom' );

						} //endif
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) {
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					} //endif
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */
			while ( have_posts() ) { the_post();

				/* Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'tplparts/content', get_post_format() );

			} //endwhile

			soblossom_paging_nav();

		} else {

			get_template_part( 'tplparts/content', 'none' );

		} //endif ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
