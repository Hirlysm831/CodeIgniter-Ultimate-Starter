<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/***************************************************************************
 * 
 * Get real visitors ip address with shorthand method also requires php7 version and up
 *
 * @package	    	maintenance_mode
 * @category		hooks 
 * @access       	public
 * @author  		Francisco Abayon <franz.noyaba@gmail.com>
 * @copyright		Oct 16, 2018
 * @since  			0.0.1
 * @url 			https://aftabmuni.wordpress.com/2016/07/06/setup-maintenance-mode-using-hooks-in-codeigniter/
 * @url			 	https://github.com/bcit-ci/CodeIgniter/wiki/I-want-to-take-my-site-offline-for-maintenance---rogierb
 * @url			 	https://stackoverflow.com/questions/15572568/how-to-build-in-maintenance-mode-in-codeigniter
 * @url			 	https://gist.github.com/georgioupanayiotis/17bd480829a313402402
 * @url			 	https://stackoverflow.com/questions/10471974/codeigniter-2-and-htaccess-how-to-implement-down-for-maintenance-mode
 * @url			 	https://bitbucket.org/skunkbad/community-auth-git-version/src/032a2c579cb0089eea44bce3aa6a4b8ce1220fb6/maintenance-mode.php?at=master&fileviewer=file-view-default
 * @link			../config/ENVIRONMENT/autoload.php
 * @link			../config/ENVIRONMENT/config.php
 * @link			../config/ENVIRONMENT/mainteance_config.php
 * @link			../app/views/errors/html/error_maintenance.php
 * @link			../app/views/errors/cli/error_maintenance.php
 *
 * @todo  		    Text should be call on language or multilingual modea
 * @todo  		    Modify the html in the maintenance mode			
 * @todo  		    Use the constant of Exit(0) in codeigniter as much as possible		
 * 					
 ***************************************************************************/
class Maintenance {
	
  public function __construct() {
		$this->CI =& get_instance();
		log_message('info', ENVIRONMENT_APP_NAME_VERSION . ' is executing maintenance_hook file in ' . APPPATH . 'hooks by '
		. gethostbyaddr($_SERVER['REMOTE_ADDR']) . ' with the unit name '.shell_exec("echo %username%").'.' );
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
	$user_ip  = $this->CI->input->ip_address();
	$exemption_ip  = $this->CI->config->item('allowed_maintenance_ips');
	$environment  = 'production';
	if( ! in_array($user_ip, $exemption_ip  ) &&  ENVIRONMENT !== $environment ) {
	  
		$_error =& load_class('Exceptions', 'core');
		$heading = 'Site Down For Maintenance';
		$message = 'The site is currently down for maintenance, and should be back up shortly. Thank you for your patience.';
		$output = '';

		$output = $_error->show_error($heading, $message, $params[0],503); 
		log_message('info', 'While ' . ENVIRONMENT_APP_NAME_VERSION . ' is in maintenance mode, it was attempted to be access by ' 
		. gethostbyaddr($_SERVER['REMOTE_ADDR']) . ' using the unit name ' . shell_exec("echo %username%") . '.' );
		exit($output);
	}
	else  if (ENVIRONMENT !== $environment)
	{
		log_message('debug', 'While ' . ENVIRONMENT_APP_NAME_VERSION . ' is in maintenance mode, it was successfully  access by ' 
		. gethostbyaddr($_SERVER['REMOTE_ADDR']) . ' using the unit name ' . shell_exec("echo %username%") . '.' );			
	}
  }
  
  public function __destruct() {
    log_message('info', ENVIRONMENT_APP_NAME_VERSION . ' maintenance_hook file in ' . APPPATH   . 'hook was executed completely.');
  }
}
