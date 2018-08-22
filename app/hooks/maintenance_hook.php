<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/***************************************************************************
 * 
 * @package	    	Maintenance_Mode
 * @description		Get real visitors ip address with shorthand method also
 *					requires php7 version and up
 * @author			Francisco Abayon
 * @url 			https://aftabmuni.wordpress.com/2016/07/06/setup-maintenance-mode-using-hooks-in-codeigniter/
 * @url			 	https://github.com/bcit-ci/CodeIgniter/wiki/I-want-to-take-my-site-offline-for-maintenance---rogierb
 * @url			 	https://stackoverflow.com/questions/15572568/how-to-build-in-maintenance-mode-in-codeigniter
 * @url			 	https://gist.github.com/georgioupanayiotis/17bd480829a313402402
 * @url			 	https://stackoverflow.com/questions/10471974/codeigniter-2-and-htaccess-how-to-implement-down-for-maintenance-mode
 * @url			 	https://bitbucket.org/skunkbad/community-auth-git-version/src/032a2c579cb0089eea44bce3aa6a4b8ce1220fb6/maintenance-mode.php?at=master&fileviewer=file-view-default
 * @source			[custom][mix]
 * @version  		0.0.1
 * @see				../config/ENVIRONMENT/autoload.php
 * @see				../config/mainteance_config.php
 * @see				../app/helper/real_ip_helper.php
 * @see				../app/views/errors/html/error_maintenance.php
 * @see				../app/views/errors/cli/error_maintenance.php
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

  public function __construct() {
    $this->CI =& get_instance();
    log_message('debug','Accessing maintenance_hook from application/hooks.');
  }

	/*//////////
	 *
	 *	$params[0] = config file name
	 *	$params[1] = config variable
	 *	$params[2] = controller name
	 *
	//////////*/
  public function maintenance_mode($params) {
    self::__construct();
    $user_ip = visitors_ip();

    if( ! in_array($user_ip, $this->CI->config->item('allowed_maintenance_ips')) && 
     ENVIRONMENT !== 'production') {
      
		  $_error =& load_class('Exceptions', 'core');
		  $heading = 'Site Down For Maintenance';
		  $message = 'The site is currently down for maintenance, and should be back up shortly. Thank you for your patience.';
		  $output = '';

          $output = $_error->show_error($heading, $message, $params[0],503); 
         exit($output);
    }
  }

}
/* End of maintenance class*/
