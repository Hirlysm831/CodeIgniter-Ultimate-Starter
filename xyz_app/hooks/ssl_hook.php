<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/***************************************************************************
 * 
 * @package			http_ssl
 * @category		hooks 
 * @access			public 
 * @author			Francisco Abayon <franz.noyaba@gamail.com>
 * @copyright		Oct 21, 2018
 * @since			0.0.1	
 * @link			../config/ENVIRONMENT/hooks.php
 * @url 			https://matthewdaly.co.uk/blog/2018/06/23/forcing-ssl-in-codeigniter/
 * @url			  	https://edoceo.com/creo/php-redirect
 *
 * @todo			Make this hook to be optiona not always being call					
 * 					
 ***************************************************************************/
class Force_ssl {

  public function __construct() {
    $this->CI =& get_instance();
    log_message('info', ENVIRONMENT_APP_NAME_VERSION . ' is executing ssl_hook file in ' . APPPATH . 'hooks by '
    . gethostbyaddr($_SERVER['REMOTE_ADDR']) . ' with the unit name '.shell_exec("echo %username%").'.' );
  }

  public function force_ssl(){
    $this->CI->load->helper('url');		
    $base_url =  $this->CI->config->config['base_url'];
	
	// methods being used in redirecting based on codeigniter setup values
    $redirect_method =  'refresh';  
    $base_url = str_replace('http://', 'https://',$base_url);
    
    if ($_SERVER['SERVER_PORT'] != SSL_PORT) { 
    	redirect($CI->uri->uri_string(),$redirect_method);
    	log_message('debug', ENVIRONMENT_APP_NAME_VERSION .  gethostbyaddr($_SERVER['REMOTE_ADDR']) . ' with the unit name '
    	.shell_exec("echo %username%").' is now redirecting to SSL Request.' );
    }
    log_message('debug', ENVIRONMENT_APP_NAME_VERSION .  gethostbyaddr($_SERVER['REMOTE_ADDR']) . ' with the unit name '
    .shell_exec("echo %username%").' is accessing with SSL Request.' );
  }

  public function __destruct() {
    log_message('info', ENVIRONMENT_APP_NAME_VERSION . ' ssl_hook file in ' . APPPATH   . 'hook was executed completely.');
  }
}
