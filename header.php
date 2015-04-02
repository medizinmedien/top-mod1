<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Header Template
 *
 * Here we setup all logic and XHTML that is required for the header section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
 
 global $woo_options, $woocommerce;

 $settings = array(
	'header_content' => ''
 );
	
 $settings = woo_get_dynamic_values( $settings );
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php woo_title(); ?></title>
<?php woo_meta(); ?>
<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>" />
<?php
wp_head();
woo_head();
?>

<?php
if (  is_front_page() ) {
?>  
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery("div#content").hide();
});
</script>

<?php
}
?>  

<script> var _prum = [['id', '550b2788abe53d0f18c6c9d2'], ['mark', 'firstbyte', (new Date()).getTime()]]; (function() { var s = document.getElementsByTagName('script')[0] , p = document.createElement('script'); p.async = 'async'; p.src = '//rum-static.pingdom.net/prum.min.js'; s.parentNode.insertBefore(p, s); })(); </script>
</head>
<body <?php body_class(); ?>>
<?php woo_top(); ?>
<div id="wrapper">
    
    <?php woo_header_before(); ?>

	<header id="header">
		
		<div class="col-full">
			<div class="headleft">
				<div class="headleftrow1 clearfix">
					<div class="headlefti1">
						<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/stethoskop.png" alt="stethoskop" />
			  	</div>
			  	<div class="headlefti2">
			  		<?php woo_header_inside(); ?>
			    	
				    <div id="hgroup">
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
							<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						</div>
					
						<?php if ( $settings['header_content'] != '' ) { ?>
							<p><?php echo do_shortcode( stripslashes( $settings['header_content'] ) ); ?></p>
						<?php } ?>
					
						<?php if ( is_woocommerce_activated() && isset( $woo_options['woocommerce_header_cart_link'] ) && 'true' == $woo_options['woocommerce_header_cart_link'] ) { ?>
				    	<ul class="nav cart fr">
				    		<li>
				    			<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo $woocommerce->cart->get_cart_total(); ?> <span class="count"><?php echo sprintf( _n('%d item', '%d items', $woocommerce->cart->get_cart_contents_count(), 'woothemes' ), $woocommerce->cart->get_cart_contents_count() );?></span></a>
								</li>
				   		</ul>
			    	<?php } ?>
			  	</div> 
			  </div>	
			  <?php
				if (  is_front_page() ) {
				?>  
			
			</div>	  
	  	<div class="headright">    
  			<div class="headrightinner">   
	  			<div class="headrightinner1">
	  				<a href="#getabo"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/abo4.png" alt="Wissensabo" /></a>
	  			</div>
	  			<div class="headrightinner2">
	  				<p class="actionpoints">
	  				1 Jahres-Abo<br />
	  				60 Fälle<br />
	  				15 Fachgebiete<br />
	  				10 DFP-Punkte<br />
	  				<s>statt CHF 295,-</s><br />
	  				nur EUR 115,-<br /><br />
	  				</p>
<?php
  
  $show_demo = true;
  if ( is_user_logged_in() ) {
		$bright_key=bright_get_authentication_code_for_user(wp_get_current_user());
		$registration = bright_get_registration_data($bright_key,"hippokratestda620b28-1a65-49f4-8a71-7f93b56548f0");
		if ($registration) {
	  	$json_data = json_decode($registration);
	  	if ($json_data[0] && ! $json_data[0]->deleted) {
				$show_demo = false;
      }
		}
  } 
  if ($show_demo) {
?>
		<a href="#testabo" class="demobutton">zur Demo </a><br /><br />
			
<?php
  }
?>
	  			
			<?php if ( !is_user_logged_in() ) { ?> 
					<br /><br /><a href="<?php echo wp_login_url(); ?>" class="demobutton">Login</a>
			<?php } ?> 
				
			<?php if ( is_user_logged_in() ) { ?> 
						<br /><br /><a href="<?php echo wp_logout_url(); ?>" class="demobutton">Logout</a>
					<?php } ?> 
					
					
		  		</div>
	  		</div>
	  	</div>
	  	
  	  <div class="headleftrow2 clearfix">
		  	<div class="headleftrow2inner clearfix" >
			   	<div class="headleftrow2h1">
			  		<h2>Wissens-Check</h2>
			  		<p>Im Zuge eines Multiple-Choice-Tests &uuml;berpr&uuml;fen Sie Ihr  Wissen anhand von 60 Fragestellungen und F&auml;llen in 15 Fachgebieten. Ausgew&auml;hlt  von Experten, von der &Ouml;GAM gepr&uuml;ft und speziell f&uuml;r AllgemeinmedizinerInnen  erstellt. Wird j&auml;hrlich aktualisiert.</p>
			  	</div>
			  	<div class="headleftrow2h2">
			  		<h2>Wissensprofil</h2>
			  	<p>Ihr pers&ouml;nlicher Wissensstand wird anhand der Richtigkeit  der beantworteten Fragen und der Selbsteinsch&auml;tzung ermittelt. Alle Daten  werden anonymisiert und stehen nur Ihnen zur Verf&uuml;gung.</p>
			  	</div>
			  	<div class="headleftrow2h3">
			  		<h2>Weiterbildung</h2>
			  		<p>Auf Grundlage Ihres Wissensprofils und des meinDFP-Kalenders  wird Ihr pers&ouml;nliches Weiterbildungsangebot unmittelbar nach Abschluss der  Hippokratests angezeigt. So k&ouml;nnen alle Wissensl&uuml;cken schnell geschlossen  werden. Sie erhalten automatisch 10 DFP-Punkte gutgeschrieben.</p>
			  	</div>
			  </div>
		  </div>
  		<?php 
			} else {
			?>	
			</div>	
				<div class="headright sub">    
	  			<div class="headrightinner">   
		  		</div>
		  	</div>
			<?php
			}
			?>	

		</div>
	
	</header><!-- /#header -->
	<?php
		if (  is_front_page() ) {
	?> 
		<div class="headright2">    
			<div class="headright2inner">   
					<a href="http://www.arztakademie.at/" target="_blank"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/arztakademie.png" alt="arztakademie" /></a><br />
					<a href="http://www.oegam.at/" target="_blank"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/oegam.png" alt="oegam" /></a><br />
					<a href="http://www.novartis.at/" target="_blank"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/novartis.png" alt="novartis" /></a>
			</div>
		</div>
	<?php
		}
	?> 
	
	
	<?php if (  is_front_page() && is_active_sidebar('homepage') && !is_home()) { ?>  
	<div id="content2" class="home-widgets">
	
	<?php dynamic_sidebar('homepage'); ?>
	</div>
	<?php } ?>  
	<?php woo_content_before(); ?>
