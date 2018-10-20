<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/***************************************************************************
 * 
 * @package     envornment_mode
 * @category    hooks
 * @access   	public
 * @since  		0.0.1
 * @author      Francisco Abayon <franz.noyaba@gmail.com>
 * @copyright	October 20,2019
 * @see			../config/ENVIRONMENT/autoload.php
 * @see			../config/ENVIRONMENT/config.php
 * @see			../config/mainteance_config.php
 * @see			../xyz_app/views/errors/html/error_maintenance.php
 * @see			../xyz_app/views/errors/cli/error_maintenance.php
 * @url 		https://aftabmuni.wordpress.com/2016/07/06/setup-maintenance-mode-using-hooks-in-codeigniter/
 * @url		 	https://github.com/bcit-ci/CodeIgniter/wiki/I-want-to-take-my-site-offline-for-maintenance---rogierb
 * @url			https://stackoverflow.com/questions/15572568/how-to-build-in-maintenance-mode-in-codeigniter
 * @url			https://gist.github.com/georgioupanayiotis/17bd480829a313402402
 * @url		 	https://stackoverflow.com/questions/10471974/codeigniter-2-and-htaccess-how-to-implement-down-for-maintenance-mode
 * @url			https://bitbucket.org/skunkbad/community-auth-git-version/src/032a2c579cb0089eea44bce3aa6a4b8ce1220fb6/maintenance-mode.php?at=master&fileviewer=file-view-default
 * 					
 * @todo  	    Text should be call on language or multilingual mode
 * 					
 ***************************************************************************/
class Environment {

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
  public function environments() {
    self::__construct();
    // $user_ip  = $this->CI->input->ip_address();
    // $exemption_ip  = $this->CI->config->item('allowed_maintenance_ips');
    $environment  = 'production';

	// echo APPPATH;
	switch(ENVIRONMENT) {
		#https://github.com/vlucas/phpdotenv/
		case 'development' :
		case 'testing' :
			$dotenv = new Dotenv\Dotenv(APPPATH);
			$dotenv->load();		
		break;

		#https://github.com/arrilot/dotenv-php
		case 'production' :
			
			// use APPPATH \Arrilot\DotEnv\DotEnv;
			require_once APPPATH.'third_party'.DIRECTORY_SEPARATOR.'arrilot'.DIRECTORY_SEPARATOR.'dotenv-php'.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'DotEnv.php';
			DotEnv::load(APPPATH . '.env.php');	
		break;
		
		// default switch value is set this kind whether being access at cli or host request
		default :
			die('ENVIRONMENT is not set properly');
		break;
	}		

	//override
	//$dotenv->overload();
	
	//rreq
	//$dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS']);
	//$dotenv->required('DATABASE_DSN');
	
	//$dotenv->required('DATABASE_DSN')->notEmpty();
  }
  

}
/* End of maintenance class*/
