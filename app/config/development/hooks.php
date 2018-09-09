<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/

///http://roopampoddar.com/2016/01/26/integrating-phpdotenv-env-files-in-codeigniter-3-0-using-hooks/

$hook['pre_system'] = function() {
    $dotenv = new Dotenv\Dotenv(APPPATH);
    $dotenv->load();
	//override
	//$dotenv->overload();
	
	//rreq
	//$dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS']);
	//$dotenv->required('DATABASE_DSN');
	
	//$dotenv->required('DATABASE_DSN')->notEmpty();
};


/***************************************************************************
 *
 * @subpackage 		Maintenance_Mode
 * @description 	Detecting the system if it is on Maintenance mode or not
 *					Also lood on the post controller(before reading the controller)
 * @author			Francisco Abayon
 * @url 			https://www.codeigniter.com/user_guide/general/hooks.html
 * @version			0.0.1	
 * @internal 		 Must post_controller_constructor because:
 *					- 	pre_system  is not applicable . Only the benchmark and hooks class have
 *						been loaded at this point. No routing or other processes have happened.
 *					- 	pre_controller   is not applicable . O All base classes, routing,and
 *						security checks have been done. Also helper is not called as its process.
 *  				-	post_controller_constructor after controller is instantiated,
 *						but prior to any method calls happening
 
 *						if(getenv('APP_ENV') === 'development') {
						$dotenv = new Dotenv\Dotenv();
						$dotenv->load(__DIR__);
}
 ***************************************************************************/


$hook['post_controller_constructor'][] = array(
  'class' => 'maintenance',
  'function' => 'maintenance_mode',
  'filename' => 'maintenance_hook.php',
  'filepath' => 'hooks',
  'params'   => array('error_maintenance')	//filename from error file
);

//force SSL
//https://matthewdaly.co.uk/blog/2018/06/23/forcing-ssl-in-codeigniter/
$hook['post_controller_constructor'][] = array(
								'class' => 'force_ssl',
                                'function' => 'force_ssl',
                                'filename' => 'ssl_hook.php',
                                'filepath' => 'hooks'
                                );

/* End of file hooks.php */
/* Location: ./application/config/developement/hooks.php */