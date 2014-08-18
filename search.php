<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package soblossom
 */

get_header(); ?>

<div class="contentarea-wrap">

	<div id="primary" class="content-area clearfix">

		<main id="main" class="site-main row" role="main">

		<?php if ( have_posts() ) { ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'soblossom' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */
			while ( have_posts() ) { the_post();

				get_template_part( 'tplparts/content', 'search' );

			} //endwhile;

			soblossom_paging_nav();

		} else {

			get_template_part( 'tplparts/content', 'none' );

		} //endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
	get_sidebar();
	get_footer();
?>
