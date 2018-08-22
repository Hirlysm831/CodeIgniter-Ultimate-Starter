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
/***************************************************************************
 *
 * @subpackage 		Maintenance_Mode
 * @description 	Detecting the system if it is on Maintenance mode or not
 *					Also lood on the post controller(before reading the controller)
 * @author			Francisco Abayon
 * @version			0.0.1				
 *
 ***************************************************************************/
 
$hook['post_controller_constructor'][] = array(
  'class' => 'maintenance',
  'function' => 'maintenance_mode',
  'filename' => 'maintenance_hook.php',
  'filepath' => 'hooks',
  'params'   => array('error_maintenance')	//filename from error file
);