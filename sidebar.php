<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package soblossom
 */
?>
	<div id="sidebar" class="widget-area small-12 medium-4 large-3 columns" role="complementary">
		
		<?php if ( is_active_sidebar( 'sidebar-widget-area' ) ) {
			
			dynamic_sidebar( 'sidebar-widget-area' );
		
		} else {
		
			echo '<div class="alert help"><p>' . __( 'Go to Appearance <i class="fa fa-long-arrow-right"></i> Widgets in your Dashboard to add some widgets', 'soblossom' ) . '</p></div>';
			
		} //endif/else sidebar-widget-area ?>
	
	</div><!-- #sidebar -->
