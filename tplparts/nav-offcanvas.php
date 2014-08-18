<?php
/**
 * The template part for displaying the Top Navigation that
 * slides out using off canvas functionality of Foundation
 *
 * source: https://github.com/JeremyEnglert/JointsWP/blob/master/partials/nav-offcanvas.php
 *
 * @package soblossom
 */
?>

<div class="small-12 columns show-for-medium-up">
	
	<div class="contain-to-grid"><!-- The "contain-to-grid" class can also be replaced with either "sticky" or "fixed" -->
	
		<nav class="top-bar" data-options="mobile_show_parent_link: true" data-topbar>

			<ul class="title-area">

				<!-- Title Area -->
				<li class="name">
					<h1><a href="<?php echo esc_url( home_url() ); ?>" rel="nofollow"><?php esc_attr( bloginfo( 'name' ) ); ?></a></h1>
				</li>

				<li class="toggle-topbar menu-icon">
					<a href="#"><span><?php _e( 'Menu', 'soblossom' ); ?></span></a>
				</li>

			</ul>		

			<section class="top-bar-section right">
				
				<?php soblossom_top_nav(); ?>
			
			</section>

		</nav> <!-- end .top-bar -->

	</div> <!-- end .contain-to-grid -->

</div> <!-- end .show-for-medium-up -->

<div class="small-12 columns show-for-small-only">

	<div class="contain-to-grid">

		<nav class="tab-bar">

			<section class="middle tab-bar-section">
				<h1 class="title"><?php bloginfo( 'name' );?></h1>
			</section>

			<section class="left-small">
				<a class="left-off-canvas-toggle menu-icon" ><span></span></a>
			</section>

		</nav> <!-- end .tab-bar -->

	</div> <!-- end .contain-to-grid -->

</div> <!-- end .show-for-small-only -->
						
<aside class="left-off-canvas-menu show-for-small-only">

	<ul class="off-canvas-list">
	
		<li>
			<label><?php _e( 'Navigation', 'soblossom' ); ?></label>
		</li>
		
		<?php soblossom_top_nav(); ?>    
	
	</ul>

</aside> <!-- end .left-off-canvas-menu -->

<a class="exit-off-canvas"></a>
		
