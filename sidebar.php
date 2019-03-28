<?php
/*


This is the template for the sidebar

@package SunsetWp


*/
?>

<?php 

if( !is_active_sidebar('sidebar-1') ) {

return;

}
?>


	<div id="sidebar" class="widgets-area">
		<?php dynamic_sidebar('sidebar-1'); ?>
	</div>
