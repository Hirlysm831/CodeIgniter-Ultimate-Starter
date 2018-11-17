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
}
*/

/***************************************************************************
 *
 * Detecting the system if it is on Maintenance mode or not
 * Also load on the post controller(before reading the controller)
 *
 * @subpackage		maintenance_mode
 * @category		hooks 
 * @author			Francisco Abayon <franz.noyaba@gamail.com>
 * @since			0.0.1	
 * @link			../../hooks/hooks.php
 * @url 			https://www.codeigniter.com/user_guide/general/hooks.html
 * @internal 		 Must post_controller_constructor because:
 *					- 	pre_system  is not applicable . Only the benchmark and hooks class have
 *						been loaded at this point. No routing or other processes have happened.
 *					- 	pre_controller   is not applicable . O All base classes, routing,and
 *						security checks have been done. Also helper is not called as its process.
 *  				-	post_controller_constructor after controller is instantiated,
 *						but prior to any method calls happening
 *
 * @todo			create CLI views return on maintenance view
 * @todo			Optimize the views with customize return data
 * @todo			Optimize the views with customize return data
 *
 ***************************************************************************/
$hook['post_controller_constructor'][] = array(
  'class' 		=> 'maintenance',
  'function' 	=> 'maintenance_mode',
  'filename' 	=> 'maintenance_hook.php',
  'filepath' 	=> 'hooks',
  'params'   	=> array('error_maintenance')	//filename from error file html
);


/***************************************************************************
 *
 * Force SSL the php file and being setup in the application
 *
 * @subpackage			http_ssl
 * @category		hooks 
 * @author			Francisco Abayon <franz.noyaba@gamail.com>
 * @copyright		Oct 20, 2018
 * @since			0.0.1	
 * @link			../../hooks/ssl_hook.php
 * @url 			https://matthewdaly.co.uk/blog/2018/06/23/forcing-ssl-in-codeigniter/
 *
 * @todo			create setup values to define wheter the port numbers are default or not
 * @todo			Autodetect that if its ssl was expired, send an email
 *
 ***************************************************************************/
$hook['post_controller_constructor'][] = array(
  'class' 		=> 'force_ssl',
  'function' 	=> 'force_ssl',
  'filename' 	=> 'ssl_hook.php',
  'filepath' 	=> 'hooks'
);



/***************************************************************************
 *
 * add development debug bar for extending tracing data
 *
 * @package			develbar
 * @category		hooks 
 * @author			Francisco Abayon <franz.noyaba@gamail.com>
 * @author			JC Sama <JC Sama>
 * @copyright		Oct 28, 2018
 * @since			0.0.1	
 * @link			../../hooks/develbar_hook.php
 * @link			../../core/XYZ_Loader.php
 * @link			./config/environment/develbar.php
 * @link			../../controller/utilites/devlbarprofiler.php
 * @link			../../helper/utility_helper.php
 * @link			../../views/utilities/develbar/*.php
 * @link			../../language/~/develbar.php(english,french,german,italian,turkish)
 * @url 			https://github.com/JCSama/CodeIgniter-develbar
 *
 * @todo			create page independent same on the screenshot provided
 * @todo			Move the views in the page
 * @todo			Make 777 the folder of cache to make the profiling work properly
 * @todo			Organized the develprofiler controller to be in the propery utilities folder
 * @todo			Cleanup the Third party folder, must be specify the proper standard of the codeigniter
 * @todo			add another language for the develbar return
 *
 ***************************************************************************/
$hook['display_override'][] = array(
	'class'  	=> 'develbar',
    'function' 	=> 'debug',
    'filename' 	=> 'develbar_hook.php',
    'filepath' 	=> 'hooks'
);
