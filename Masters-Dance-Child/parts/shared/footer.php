<?php 
	global $hmd_theme_option;
	$copyright = $hmd_theme_option['copyright'];
	$dev_name = $hmd_theme_option['developer-text'];
	$dev_link = $hmd_theme_option['developer-link'];
	$facebook = $hmd_theme_option['social-facebook'];
	$twitter = $hmd_theme_option['social-twitter'];
	$google = $hmd_theme_option['social-google'];
	$linkedin = $hmd_theme_option['social-linkedin'];
	$pinterest = $hmd_theme_option['social-pinterest'];
	$instagram = $hmd_theme_option['social-instagram'];
	$youtube = $hmd_theme_option['social-youtube'];
	$skype = $hmd_theme_option['social-skype'];
	$yelp = $hmd_theme_option['social-yelp'];
?>
	
<?php if ( $hmd_theme_option['footer-show-up-button'] ) { ?>
	<!-- Back to Top -->
	<a data-scroll href="#totop" class="totop fadeOut"><span class="fas fa-caret-up"></span></a>
<?php } ?>

<!-- Footer Information -->	
<footer id="footer-container">
    <div class="container-fluid">
        <div class="row" id="footer-info">
            <div class="col-lg-12">
            	<div class="has-text"></div>
            <!-- end .col-lg-5 --></div>
        <!-- end .row --></div>
    <!-- end .container-fluid --></div>
<!-- end #footer-container --></footer>