<?php	
	/*

	=======================================
		 Theme Custom Functions Section
	=======================================

	*/
?>

<?php

//post loop meta custom function 
function sunsetWp_posts_meta() {

	$posted_on = human_time_diff(get_the_time('U'), current_time('timestamp'));
	echo '<span class="posted-on">Posted '. $posted_on . ' ago';
}

function sunsetWp_posts_footer() {
	return 'This is post footer section';
}

?>