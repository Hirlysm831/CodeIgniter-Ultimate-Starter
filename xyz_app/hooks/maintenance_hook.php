<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/***************************************************************************
 * 
 * Get real visitors ip address with shorthand method also requires php7 version and up
 *
 * @package	    	maintenance_mode
 * @category		hooks 
 * @author  		Francisco Abayon <franz.noyaba@gmail.com>
 * @copyright		Oct 16, 2018
 * @version  		0.3.0
 * @url 			https://aftabmuni.wordpress.com/2016/07/06/setup-maintenance-mode-using-hooks-in-codeigniter/
 * @url			 	https://github.com/bcit-ci/CodeIgniter/wiki/I-want-to-take-my-site-offline-for-maintenance---rogierb
 * @url			 	https://stackoverflow.com/questions/15572568/how-to-build-in-maintenance-mode-in-codeigniter
 * @url			 	https://gist.github.com/georgioupanayiotis/17bd480829a313402402
 * @url			 	https://stackoverflow.com/questions/10471974/codeigniter-2-and-htaccess-how-to-implement-down-for-maintenance-mode
 * @url			 	https://bitbucket.org/skunkbad/community-auth-git-version/src/032a2c579cb0089eea44bce3aa6a4b8ce1220fb6/maintenance-mode.php?at=master&fileviewer=file-view-default
 * @link			../config/ENVIRONMENT/autoload.php
 * @link			../config/ENVIRONMENT/config.php
 * @link			../config/mainteance_config.php
 * @link			../app/helper/real_ip_helper.php
 * @link			../app/views/errors/html/error_maintenance.php
 * @link			../app/views/errors/cli/error_maintenance.php
 * @todo  		    Text should be call on language or multilingual modea
 * @todo  		    Modify the html in the maintenance mode			
 * 					
 ***************************************************************************/

/***************************************************************************
 *
 * @access       	public
 * @description		Get real visitors ip address with shorthand method also
 *					requires php7 version and up
 * @author			Francisco Abayon
 * 
 ***************************************************************************/
class Maintenance {

  private $UniqueId; //https://www.w3schools.com/php/php_exception.asp	
	
  public function __construct() {
	try {
		$this->CI =& get_instance();
		log_message('info', APP_NAME . ' is executing maintenance_hook file in ' . APPPATH . 'hooks by '
		. gethostbyaddr($_SERVER['REMOTE_ADDR']) . ' with the gadget name '.shell_exec("echo %username%")'.' );
	}

	catch(Exception $e) {
		log_message('error', APP_NAME .  ' is attempting to execute maintenance_hook file in ' . APPPATH . 'hooks by '
		. gethostbyaddr($_SERVER['REMOTE_ADDR']) . ' with the gadget name '.shell_exec("echo %username%") 
		. ' having an error in ' .$e->getMessage());
	}
  }

	/************************************************
	 *
	 *	Values that will be pass or given in the method functionaliy
	 *
	 *	@var		array()
	 *	$params[0] = config file name
	 *	$params[1] = config variable
	 *	$params[2] = controller name
	 *
	 ************************************************/
  public function maintenance_mode($params) {
	try {
		$user_ip  = $this->CI->input->ip_address();
		$exemption_ip  = $this->CI->config->item('allowed_maintenance_ips');
		$environment  = 'production';

		if( ! in_array($user_ip,$exemption_ip  ) &&  ENVIRONMENT !== $environment ) {
		  
			  $_error =& load_class('Exceptions', 'core');
			  $heading = 'Site Down For Maintenance';
			  $message = 'The site is currently down for maintenance, and should be back up shortly. Thank you for your patience.';
			  $output = '';

			  $output = $_error->show_error($heading, $message, $params[0],503); 
			 exit($output);
		}
	}

	catch(Exception $e) {
		log_message('error', APP_NAME . ' is attempting to execute maintenance_hook file in ' . APPPATH   . 'hooks with an error of ' .$e->getMessage());
	}

  }
  
  public function __destruct() {
    log_message('info', APP_NAME . ' maintenance_hook file in ' . APPPATH   . 'hook was executed successfully.');
  }
}
