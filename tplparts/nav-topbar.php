<div class="small-12 columns">

	<div class="contain-to-grid"><!-- The "contain-to-grid" class can also be replaced with "fixed"; if you do so and the adminbar is visible, then you need to give .fixed a z-index of 999999 to make it show on top of the adminbar. -->
	
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
			
			<?php
				global $soblossom_detect;
				
				// only give the class 'right' to tablets and computers
				if ( ! $soblossom_detect->isMobile() || $soblossom_detect->isTablet() ) {
					$class= 'top-bar-section right';
				} else {
					$class= 'top-bar-section';
				}
				
			?>
			
			<section class="<?php echo $class; ?>">
				<?php soblossom_top_nav(); // see functions.php ?>
			</section>
		</nav>
	
	</div> <!-- end .contain-to-grid -->

</div>
