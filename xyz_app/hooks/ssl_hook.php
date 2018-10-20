<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/***************************************************************************
 * 
 * @package	    	maintenance_mode
 * @description		Get real visitors ip address with shorthand method also
 *					requires php7 version and up
 * @author			Francisco Abayon
 * @url 			https://aftabmuni.wordpress.com/2016/07/06/setup-maintenance-mode-using-hooks-in-codeigniter/
 * @url			  	https://edoceo.com/creo/php-redirect
 * @source			[custom][mix]
 * @since  		0.0.1
 * @see				../config/ENVIRONMENT/hooks.php
 * 					
 ***************************************************************************/

class Force_ssl {

	public function __construct() {
		$this->CI =& get_instance();
		log_message('debug','Accessing ssl_hook from app/hooks.');
	}


	public function force_ssl(){
		self::__construct();
		$this->CI->load->helper('url');		
		$base_url =  $this->CI->config->config['base_url'];
		$redirect_method =  'refresh';
		$xampp_ssl_port =  443;
		
		$base_url = str_replace('http://', 'https://',$base_url);
		
		if ($_SERVER['SERVER_PORT'] != $xampp_ssl_port) { 
			redirect($CI->uri->uri_string(),$redirect_method);
		}
	$ip = getenv('REMOTE_ADDR', true) ? getenv('REMOTE_ADDR', true) : getenv('REMOTE_ADDR');
	// https://edoceo.com/creo/php-redirect
	}


}
/* End of maintenance class*/
