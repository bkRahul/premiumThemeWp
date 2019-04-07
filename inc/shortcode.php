<?php 
/*


This is the template for the shortcode

@package SunsetWp


*/

//Bootstrap tooltip 
function sunsetWp_tooltip( $atts, $content = null ){

	//get the attributes
	$atts = shortcode_atts(
		array(
			'placement' =>'top',
			'title'=>''),
		$atts,'tooltip'
	);

	$title = ( $atts['title'] == '' ? $content : $atts['title'] );
	//return HTML
	return '<span class="sunsetWp-tooltip" data-toggle="tooltip" data-placement="'. $atts['placement'] .'" title="'. $title .'">' .$content. '</span>';
}

add_shortcode('tooltip', 'sunsetWp_tooltip');

/*[tooltip placement="top" title="This is the title"]This is the content[/tooltip]*/



//Bootstrap button popover
function sunsetWp_popover($atts, $content = null, $data = null ){

	//get the attributes
	$atts = shortcode_atts(
		array(
			'title'=>'',
			'data'=> ''),
		$atts, 'popover'
	);

	return '<button type="button" class="btn btn-info" data-toggle="popover" title="'. $atts['title'] .'" data-content="'. $atts['data'] .'">' .$content. '</button>';

} 


add_shortcode('popover', 'sunsetWp_popover');

/*[popover title="top" data-content="Some content inside the popover"]This is the content[/popover]*/



//Contact Form Shortcode 
function sunsetWp_contact_form( $atts, $content = null ){

	//get the attributes
	$atts = shortcode_atts(
		array(),
		$atts,'contact_form'
	);

	//return HTML
	ob_start();
	include 'contact-form.php';
	return ob_get_clean();

} 

add_shortcode('contact_form', 'sunsetWp_contact_form');

/*[contact_form]This is the content[/contact_form]*/

?>