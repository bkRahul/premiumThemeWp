<?php 
/*


This is the template for the footer

@package SunsetWp


*/

?>
<footer class="footer-container">

<div class="footer-nav-container">
<nav class="navbar navbar-expand-lg navbar-light">

<?php wp_nav_menu(array(
'theme_location'=>'secondary',
'container'=>false,
'menu_class'=>'navbar-nav mr-auto',
'menu_item'=>'nav-item',
'walker'=> new sunsetWp_Walker_Nav_Primary()	
)); ?>


</nav>

</div><!-- .header-nav -->	
</footer>

<?php wp_footer(); ?>

</body>

</html>