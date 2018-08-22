<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/***************************************************************************
 * 
 * @subpackage		Maintenance_Mode
 * @description		Get real visitors ip address with conditional statement
 * @author			Francisco Abayon
 * @url				https://stackoverflow.com/questions/13646690/how-to-get-real-ip-from-visitor
 * @url				https://stackoverflow.com/questions/15699101/get-the-client-ip-address-using-php
 * @version  		0.0.1
 * 
 ***************************************************************************/
if (!function_exists('visitors_ip')){
	function  visitors_ip(){
		$client_ip  	= @$_SERVER['HTTP_CLIENT_IP'];
		$forwarded_ip 	= @$_SERVER['HTTP_X_FORWARDED_FOR'];
		$remote_ip  	= $_SERVER['REMOTE_ADDR'];

		if(filter_var($client_ip, FILTER_VALIDATE_IP)){
			$ip_address = $client_ip;
		}
		elseif(filter_var($forwarded_ip, FILTER_VALIDATE_IP)){
			$ip_address = $forwarded_ip;
		}
		else{
			$ip_address = $remote_ip;
		}

	return $ip_address;
	}
}

/***************************************************************************
 * 
 * @subpackage		Maintenance_Mode
 * @description		Get real visitors ip address with shorthand method also
 *					requires php7 version and up
 * @author			Francisco Abayon
 * @url				https://stackoverflow.com/questions/37921803/how-to-get-my-site-visitors-ip-address-in-php
 * @version  		0.0.1
 * @todo			Fix and find the error of this function
 ***************************************************************************/
if (!function_exists('visitors_ip_short')){
	function  visitors_ip_short(){
		//return $_SERVER["HTTP_X_REAL_IP"] ?? $_SERVER["HTTP_X_FORWARDED_FOR"] ?? $_SERVER["HTTP_CLIENT_IP"] ?? $_SERVER["REMOTE_ADDR"] ?? null:''; 
	}
	
}

