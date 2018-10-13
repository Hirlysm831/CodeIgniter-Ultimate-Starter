<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/***************************************************************************
 * 
 * Save static database information for those who are having the allowed maintenance excemptions
 * 
 * @package	    maintenance_mode
 * @category	instantation 
 * @author  	Francisco Abayon <franz.noyaba@gmail.com>
 * @copyright	August 25, 2018
 * @version  	0.3.0
 * @link		../environments.php
 * @url			https://stackoverflow.com/questions/9149483/get-folder-up-one-level/9149495
 * @example		define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? 
 *				$_SERVER['CI_ENV'] : 'development');
 * 					
 ***************************************************************************/	
/***************************************************************************
 * 
 * @subpackage		maintenance_mode
 * @description 	
 *					
 * @author			Francisco Abayon
 * @version			0.0.1
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
