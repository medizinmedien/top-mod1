<?php

/*

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
     $fields['billing']['billing_oak'] = array(
        'label'     => __('&Ouml;&Auml;K Nummer', 'woocommerce'),
		'placeholder'   => _x('&Ouml;&Auml;K Nummer', 'placeholder', 'woocommerce'),
		'required'  => true,
		'class'     => array('form-row-wide'),
		'clear'     => true
     );

     return $fields;
}
*/

/**
 * Process the checkout
 **/
 
 /*
add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');

function my_custom_checkout_field_process() {
    global $woocommerce;

    // Check if valid oak.

	$oakPost = $_POST['billing_oak'];
	$errorVal = true;
	$errorMessage = "Bitte geben Sie eine g&uuml;ltige &Ouml;&Auml;K-Nummer ein.";
	$checkSum1 = 0;
	$checkSum2 = 0;
	$numberCSPart = "";
	$strLenVal = strlen($oakPost);
	
	//only 6 to 8 digits with hyphen and checksum allowed
	if ($strLenVal > 5 && $strLenVal < 9) {
	
		//check if there is a hyphen in correct position in the number eg. 11111-11 or 1111-11
		$checkHyphen  = substr($oakPost, -3, 1); 
		if ($checkHyphen == "-") {
			$oakNumber = explode("-", $oakPost);
			$numberCSPart = $oakNumber[1];

			//validate: strlen of parts, is numreic, not 0
			if (is_numeric($oakNumber[0]) && is_numeric($numberCSPart) && strlen($oakNumber[0]) > 3 && strlen($oakNumber[0]) < 6 && strlen($numberCSPart) == 2 && $oakNumber[0] != "0000" && $oakNumber[0] != "00000" && $oakNumber[0] != 0) {

				$arr1 = str_split($oakNumber[0]);
				if(strlen($oakNumber[0]) == 5){
					$checkSum1 = intval($arr1[0])*7 + intval($arr1[1])*3 + intval($arr1[2])*1 + intval($arr1[3])*7 + intval($arr1[4])*3;
					
					//checksum delete hundret digit
					if (strlen($checkSum1) == 3) {
						$checkSum1  = substr($checkSum1, -2);
					} 

					if ($checkSum1 == $numberCSPart) {
						$errorVal = false;	
						//debug
						//$result['valid'] = false;
						//$result['reason'][$name] = $_POST[$name] = "checkSum1=".$checkSum1." numberCSPart=" . $numberCSPart;		
					}
				}
				else if (strlen($oakNumber[0]) == 4){
					$checkSum2 = intval($arr1[0])*7 + intval($arr1[1])*3 + intval($arr1[2])*1 + intval($arr1[3])*7;
					
					//checksum delete hundret digit
					if (strlen($checkSum2) == 3) {
						$checkSum2  = substr($checkSum2, -2);
					} 
					
					if ($checkSum2 == $numberCSPart) {
						$errorVal = false;
						//debug
						//$result['valid'] = false;
						//$result['reason'][$name] = $_POST[$name] = "checkSum2=".$checkSum2." numberCSPart=" . $numberCSPart;
					}
				}	
				//only 4 or 5 digits in oak number
				else {
					$errorVal = true;
				}		
			}
			else {
				//error no correct strlen or number etc.
				$errorVal = true;
			}
		}
		else {
			//error no hyphen
			$errorVal = true;
			$errorMessage = "Bitte geben Sie Ihre &Ouml;&Auml;K-Nummer vollst&auml;ndig mit Bindestrich '-' ein.";
		}
	}
	
	else {
		//error no correct total strlen 
		$errorVal = true;
	}	
	if($errorVal == true) {
		$woocommerce->add_error($errorMessage);
	}

	
	
    
}
*/
/**
 * Update the order meta with field value
 **/
 
 /*
add_action('woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta');

function my_custom_checkout_field_update_order_meta( $order_id ) {
    if ($_POST['billing_oak']) update_post_meta( $order_id, '&Ouml;&Auml;K Nummer', esc_attr($_POST['billing_oak']));
}
*/
/**
* Display field value on the order edition page
**/

/*
add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );
 
function my_custom_checkout_field_display_admin_order_meta($order){
echo '<p><strong>'.__('&Ouml;&Auml;K Nummer').':</strong> ' . $order->order_custom_fields['billing_oak'][0] . '</p>';
}

*/

add_filter( 'woocommerce_billing_fields', 'wc_npr_filter_phone', 10, 1 );
 
function wc_npr_filter_phone( $address_fields ) {
$address_fields['billing_phone']['required'] = false;
return $address_fields;
}

//shortcode [checkcart]
function get_checkcart($atts, $content = null) {
	global $woocommerce;
	$output = "";
	$ck_sof = sizeof( $woocommerce->cart->cart_contents );
	if ($ck_sof == 0 ) {
			$output = '<a href="/shop/?add-to-cart={{attributes.product_id}}" class="woo-sc-button teal large"><span class="woo-">Wissensabo erwerben</span></a>';
			// The cart is empty
	}
	else {
			$output = '<a href="/cart" class="woo-sc-button teal large"><span class="woo-">zum Warenkorb (' . $ck_sof . ')</span></a>';
			// The cart is empty
	}

	return $output;

}
add_shortcode('checkcart', 'get_checkcart');


function is_emptyCart(){
	global $woocommerce;
	$ck_sof = sizeof( $woocommerce->cart->cart_contents );
	if ($ck_sof == 0 )
		return true;
	else
		return false;
}

//shortcode [woosliderht]
function get_woosliderht($atts, $content = null) {
	$output = "";
	$output = woo_featured_slider_loader();

	return $output;

}
add_shortcode('woosliderht', 'get_woosliderht');


