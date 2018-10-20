<?php
/***************************************************************************
* 
* Display site under maintenance via CLI
* 
* @subpackage	environment_mode
* @category 	views
* @author      	Francisco Abayon <franz.noyaba@gmail.com>
* @since  		0.0.1
* @copyright	October 20,2019
* @url			https://forum.codeigniter.com/archive/index.php?thread-64142.html
* 	
* @todo 		modify the CLI request of the views with the customization command request line
* @todo 		modify the CLI request with color displays
* @todo 		compatible to all servers (E.G. IIS, NGINX, Apache)
*
***************************************************************************/

echo "\nERROR: ",
	$heading,
	"\n\n",
	$message,
	"\n\n";
	