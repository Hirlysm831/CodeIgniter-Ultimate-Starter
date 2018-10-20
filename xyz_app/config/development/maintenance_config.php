<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/***************************************************************************
 * 
 * Save static database information for those who are having the allowed maintenance excemptions
 * 
 * @subpackage  environment_mode
 * @subpackage  maintenance_mode
 * @category	configuration 
 * @author  	Francisco Abayon <franz.noyaba@gmail.com>
 * @copyright	Oct 13, 2018
 * @since  		0.0.1
 * @var 		array()
 * @see			../../hooks/hooks.php
 *
 * @todo		Configurable that can be access the ip setups on database connectivity				
 * 					
 ***************************************************************************/	
$config['allowed_maintenance_ips'] = array(
		'192.168.195.69',	// Francisco Abayon Laptop Workstation  based on internet connectivity
		'169.254.95.228',	// Francisco Abayon Laptop Workstation  based on internet connectivity
		'203.177.158.155',	// Francisco Abayon Laptop Workstation on whats my ip
		'49.145.99.156',	// Francisco Abayon Laptop Workstation on whats my ip
		'::1',				// Localhost in XAMPP
		'127.0.0.1'			// Localhost in XAMPP or HOME IP
	);
