<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package soblossom
 */
?>

<div id="supplementary">
	
	<div id="footer-sidebar" class="footer-sidebar widget-area" role="complementary">
		
		<?php //The widgets in the Footer Widegetarea start with an <aside>, just like the sidebar ?>
		<?php dynamic_sidebar( 'footer-widget-area' ); ?>
	
	</div> <!-- end .footer-sidebar.widget-area -->

</div> <!-- end #suplementary -->
