<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/***************************************************************************
 * 
 * @subpackage		Maintenance_Mode
 * @description 	Save static database information for those who are having 
 *					the allowed maintenance excemptions
 * @author			Francisco Abayon
 * @since			0.0.1
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
