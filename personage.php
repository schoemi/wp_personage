<?php

/*
* Plugin Name: PersonAge-Shortcode
* Plugin URI: http://schoemakers.com/wordpress-shortcode-personage
* Author: Dirk Schoemakers
* Author URI: http://schoemakers.com/
* Description: Returns the age of a person in years, based on entered birthday. Use this Shortcode with - [Personage year="1980" month="12" day="31"]
* Version: 0.1
* Min. PHP Version: 5.4
 **/
 
// Add Shortcode
function calc_personage( $atts ) {


	// Attributes
	$atts = shortcode_atts(
		array(
			'day' => '01',
			'month' => '01',
			'year' => '1980',
		),
		$atts
	);
	
	// combines attributes to single variable
	$bday = $atts['year'] ."-" . $atts['month'] . "-" . $atts['day'];
	
	// Variable definition for today and birthday
	$birthday= new DateTime($bday);
	$thisday = new DateTime(date('Y-m-d'));
	
	//calculates difference between birthday and today and return
	$the_age = $birthday->diff($thisday);
	return $the_age->format('%y');

}
add_shortcode( 'PersonAge', 'calc_personage' );

 ?>
 
 