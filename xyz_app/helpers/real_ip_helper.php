<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/***************************************************************************
 * 
 * @subpackage		Maintenance_Mode
 * @description		Get real visitors ip address with conditional statement
 * @author			Francisco Abayon
 * @url				https://stackoverflow.com/questions/13646690/how-to-get-real-ip-from-visitor
 * @url				https://stackoverflow.com/questions/15699101/get-the-client-ip-address-using-php
 * @since  		0.0.1
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
 * @since  		0.0.1
 * @todo			Fix and find the error of this function
 ***************************************************************************/
if (!function_exists('visitors_ip_short')){
	function  visitors_ip_short(){
		return $_SERVER["HTTP_X_REAL_IP"] ?? $_SERVER["HTTP_X_FORWARDED_FOR"] ?? $_SERVER["HTTP_CLIENT_IP"] ?? $_SERVER["REMOTE_ADDR"] ?? null;
	}
	
}

if (!function_exists('getClientIp')){
	function getClientIp() {

	$result = null;

	$ipSourceList = array(
	'HTTP_CLIENT_IP','HTTP_X_FORWARDED_FOR',
	'HTTP_X_FORWARDE', 'HTTP_FORWARDED_FOR',
	'HTTP_FORWARDED', 'REMOTE_ADDR'
	);

	foreach($ipSourceList as $ipSource){

	if ( isset($_SERVER[$ipSource]) ){
	$result = $_SERVER[$ipSource];
			echo $result ."\t".$ipSource." \n";
	break;
	}
	}
	return $result;
	}
	
}

if (!function_exists('getrealip')){
	function getrealip(){
		if (isset($_SERVER)){
			if(isset($_SERVER["	"])){
				$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
					if(strpos($ip,",")){
					$exp_ip = explode(",",$ip);
						$ip = $exp_ip[0];
					}
			}else if(isset($_SERVER["HTTP_CLIENT_IP"])){
				$ip = $_SERVER["HTTP_CLIENT_IP"];
			}else{
				$ip = $_SERVER["REMOTE_ADDR"];
			}
			
		}else{
			if(getenv("HTTP_X_FORWARDED_FOR")){
				$ip = getenv("HTTP_X_FORWARDED_FOR");
					if(strpos($ip,",")){
					$exp_ip=explode(",",$ip);
					$ip = $exp_ip[0];
					}
			}else if(getenv("HTTP_CLIENT_IP")){
				$ip = getenv("HTTP_CLIENT_IP");
			}else {
				$ip = getenv("REMOTE_ADDR");
			}
		}
	return $ip;
	}
}


if (!function_exists('get_real_IP')){
function get_real_IP($void=null) {

$headers = array(
"HTTP_VIA",
"HTTP_X_FORWARDED_FOR",
"HTTP_FORWARDED_FOR",
"HTTP_X_FORWARDED",
"HTTP_FORWARDED",
"HTTP_CLIENT_IP",
"HTTP_HTTP_CLIENT_IP",
"HTTP_FORWARDED_FOR_IP",
"VIA",
"X_FORWARDED_FOR",
"FORWARDED_FOR",
"X_FORWARDED",
"FORWARDED",
"CLIENT_IP",
"FORWARDED_FOR_IP",
"HTTP_XPROXY_CONNECTION",
"HTTP_PROXY_CONNECTION",
"HTTP_X_REAL_IP",
"HTTP_X_PROXY_ID",
"HTTP_USERAGENT_VIA",
"HTTP_HTTP_PC_REMOTE_ADDR",
"HTTP_X_CLUSTER_CLIENT_IP"
);

foreach ($headers as $header) if (isset($_SERVER[$header]) && !empty($_SERVER[$header])) return $_SERVER[$header];

if (trim($_SERVER["SERVER_ADDR"])==trim($_SERVER["REMOTE_ADDR"])) return $_SERVER["SERVER_ADDR"];

return $_SERVER["REMOTE_ADDR"];
}
}