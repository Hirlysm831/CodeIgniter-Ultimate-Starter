<?php
/***************************************************************************
 * 
 * @project			Custom Codeigniter V3
 * @description		Standard Framework in PHP with codeigniter framework
 * @author			Francisco Abayon
 * @url				[N/A]
 * @version			0.0.1
 *
 * @credentials		[N/A]
 * @legend			[N/A] 		=> Not available as for now, but added data in the future
 * @legend	 		[external] 	=> under category at sources/url of the code
 * @legend	 		[internal] 	=> personal modifications
 * @legend	 		[mix] 		=> combination of a lot codes, custom and resources
 * 
 * @todo			still in progress
 * @todo			add comment and SOP of inflector_helper.php, controller
 * @tod				usage of inflector in codeigniter
 * @todo			session of multilingual
 * @todo			adding unit test using pharunit.phar https://github.com/kenjis/ci-phpunit-test
 * @todo			still beta testing for possible CLI and needs to modify about @ExtendUntiTest package
 * @todo			custom site under maintenance
 * @todo			custom 404
 * @todo			E-commerce setup
 * @todo			PAYPAL payment
 * @todo			geolocation
 * @todo			sync github,twitter,fb,gmail,linked-in,pinterest,stack-overflow,instagram, amazon
 * @todo			sync chat functionality support, forums,wikis, blogs,news,
 * @todo			cron jobs
 * @todo			search engine, google, yandex,yahoo,bing
 * @todo			refactore code
 * @todo			the hooks
 * @todo			codegniter epic helpers, libraries, unit testing, cookies,templating,profiling, debubgging
 * @todo			modify the check controller
 * @todo			fix doctrine https://github.com/kenjis/codeigniter-doctrine
 * @todo			fix tools class
 * @todo			fix comment and unccoment from 2 profiler
 * @todo			https://gist.github.com/csasbach/2421513
 * @todo			read https://github.com/philsturgeon/phptherightway-book
 * @todo			add dynamic multiple theme like Wordpress and call multiple themes at the same time
 *
 * @title 			 Environment_pac
 *
 * @todo 			at Maintenance_Mode, need to revise the maintainance page and use dynamic query of the Ip Address
 * @todo 			at Maintenance_Mode, use dynamic query of the Ip Address
 * @todo 			at Maintenance_Mode, need to Fix and find the error of this function
 * @todo 			at Maintenance_Mode, need to Fix the ip is not working here in RMF
 * @todo 			at Maintenance_Mode, need to study the log_message function
 * @todo 			at Maintenance_Mode, need to enhance the views both in html and cli access of the maintenance mode
 
 
 STUDY
 http://phpswitch.com/
 switch(true)
{
    case (strlen($foo) > 30):
        $error = "The value provided is too long.";
	$valid = false;
	break;

    case (!preg_match('/^[A-Z0-9]+$/i', $foo)):
        $error = "The value must be alphanumeric.";
	$valid = false;
	break;

    default:
	$valid = true;
	break;
}
<?php 
$browserName = 'mozilla'; 
switch ($browserName) { 
  case 'opera': 
    echo 'opera'; 
  break; 
  case (preg_match("/Mozilla( Firebird)?|phoenix/i", $browserName)?$browserName:!$browserName): 
    echo "Mozilla or Mozilla Firebird"; 
  break; 
  case 'konqueror': 
    echo 'Konqueror'; 
  break; 
  default: 
    echo 'Default'; 
  break; 
} 
?> 

or you could just use a regular expression for everything: 

<?php 
$uri = 'http://www.example.com'; 
switch (true) { 
  case preg_match("/$http(s)?/i", $uri, $matches): 
    echo $uri . ' is an http/https uri...'; 
  break; 
  case preg_match("/$ftp(s)?/i", $uri, $matches): 
    echo $uri . ' is an ftp/ftps uri...'; 
  break; 
  default: 
    echo 'default'; 
  break; 
} 

	Have error reporting turned on local and development environments but turned off on production
	Have logging turned on local and development environments but turned off on production
	Have different config settings for each of local, development and production environments
	Have different database settings for each of local, development and production environments
	Have different email settings for each of local, development and production environments
	Now each of your config.php, database.php and email.php can have differnt settings. CodeIgniter will automatically choose right files to use based on your current environment. For example in application/config/local/config.php and application/config/development/config.php files, you can enable error reporting and logging using $config['log_threshold'] setting by setting it to 1 but disable error reporting and logging in production environment by setting $config['log_threshold'] to 0 in application/config/production/config.php fil
 ***************************************************************************/

 
/******************** Start Coding STRUCTURE *******************************
 *
 * PHP Closing Tag  			- Is not required on the php files on the end.
 * File Naming					- Class files must be named in a Ucfirst-like manner.
								- Other file name (configurations, generic scripts) should be in all lowercase.
 * Class and Method Naming		- Class names should always start with an uppercase letter. 
								- Multiple words should be separated with an underscore, and not CamelCased.
								- Class methods should be entirely lowercased .
								- Named to clearly indicate their function, preferably including a verb. 
								- Try to avoid overly long and verbose names. 
								- Multiple words should be separated with an underscore.
 * Variable Names				- Variables should contain only lowercase letters ,underscore
								- And be reasonably named to indicate their purpose and contents. 
								- Very short, non-word variables should only be used as iterators in for() loops.
 * Commenting					- See at Start COMMENTING STRUCTURE
 * Constants					- Constants should always be fully uppercase. 
								- Always use CodeIgniter constants when appropriate.
 * TRUE, FALSE, and NULL		- TRUE, FALSE, and NULL keywords should always be fully uppercase.
 * Logical Operators			- Use of the || “or” comparison operator is discouraged.
								- Clarity on some output devices is low (looking like the number 11, for   instance). 
								- && is preferred over AND but either are acceptable, and a space should always  precede and follow !
 * Debugging Code				- Do not leave debugging code in your submissions, even when commented out. 	
								- Things such as var_dump(), print_r(), die()/exit() should not be included   in your code unless it serves a specific purpose other than debugging
 * Whitespace in Files			- No whitespace can precede the opening PHP tag or follow the closing PHP tag. 
								- Output is buffered, so whitespace in your files can cause output to begin before CodeIgniter outputs its content, leading to errors and an inability for  CodeIgniter to send proper headers.
 * One File per Class			- Use separate files for each class, unless the classes are closely related.
 * Whitespace					- Use tabs for whitespace in your code, not spaces.
 * 								- To (slightly) more compact files, storing one tab character
 * Line Breaks					- Files must be saved with Unix line breaks.
 * Code Indenting				- Use Allman style indenting.
								- With the exception of Class declarations, braces are always placed on a line by themselves
 * Bracket and Parenthetic Spacing 		- parenthesis and brackets should not use any additional spaces. 
 * Localized Text						- By Default should take advantage of corresponding language files.
 * Private Methods and Variables		- Methods and variables that are only accessed internally,
 * PHP Errors							- Code must run error free.
										- Not rely warnings and notices to be hidden to meet this requirement. 
 * Short Open Tags						- Not to use shorthand						
 * One Statement Per Line				- Never combine statements on one line.
 * Strings								- Always use single quoted strings unless you need variables parsed		
 * SQL Queries							- SQL keywords are always capitalized
 * Default Function Arguments			- prevent PHP errors with mistaken calls and provides common fallback
 * 
 ******************** End Coding STRUCTURE *********************************/

 
/********************* Start COMMENTING STRUCTURE **************************/

//======================================================================
// CATEGORY LARGE FONT
//======================================================================

//-----------------------------------------------------
// Sub-Category Smaller Font
//-----------------------------------------------------

/* Title Here Notice the First Letters are Capitalized */

# Option 1
# Option 2
# Option 3

/*
* This is a detailed explanation
* of something that should require
* several paragraphs of information.
*/

// This is a single line quote.


## Tricks for commenting/uncomment code
//*
##codes goes here for comment and uncomment
// */


//Now by taking out one / on the first line..


/********* Commenting Tags
 * Here are the tags:
 * Name of tags
 * @abstract
 * @access       	public or private
 * @author       	author name <author@email>
 * @copyright    	name date
 * @deprecated   	description
 * @example      	/path/to/example
 * @exception    	Javadoc-compatible, use as needed
 * @global       	type description of global variable usage in a function
 * @ignore
 * @internal    	private information for advanced developers only
 * @param       	type [$varname] description
 * @return      	type description
 * @link         	URL
 * @name         	$globalvaralias or procpagealias
 * @magic        	phpdoc.de compatibility
 * @package      	package name
 * @see          	name of another element that can be documented,
 *                	produces a link to it in the documentation
 * @since        	a version or a date
 * @static
 * @staticvar    	type description of static variable usage in a function
 * @subpackage   	sub package name, groupings inside of a project
 * @throws       	Javadoc-compatible, use as needed
 * @todo         	phpdoc.de compatibility
 * @var        		type    a data type for a class variable
 * @version    		version
**********/
/********************* End COMMENTING STRUCTURE ***************************/

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2018, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2018, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */

/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     testing
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 */
	
/***************************************************************************
 * 
 * @description  	Custom environment load and dynamic lookup of the root file
 * 
 * @package	    	Environment_pac
 * @author  		Francisco Abayon 
 * @source  		[mix]
 * @version  		0.1.0
 * @dependency		environment_data (./Environments.php)
 * @filesource		[N/A]
 * @code			define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');
 * 					
 ***************************************************************************/
 require 'environment.php';	
 
/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */
switch (ENVIRONMENT)
{
	case 'development':
		error_reporting(-1);
		ini_set('display_errors', 1);
	break;

	case 'testing':
	case 'production':
		ini_set('display_errors', 0);
		if (version_compare(PHP_VERSION, '5.3', '>='))
		{
			error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
		}
		else
		{
			error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
		}
	break;

	default:
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'The application environment is not set correctly.';
		exit(1); // EXIT_ERROR
}

/*
 *---------------------------------------------------------------
 * SYSTEM DIRECTORY NAME
 *---------------------------------------------------------------
 *
 * This variable must contain the name of your "system" directory.
 * Set the path if it is not in the same directory as this file.
 */
	$system_path = 'sys';

/*
 *---------------------------------------------------------------
 * APPLICATION DIRECTORY NAME
 *---------------------------------------------------------------
 *
 * If you want this front controller to use a different "application"
 * directory than the default one you can set its name here. The directory
 * can also be renamed or relocated anywhere on your server. If you do,
 * use an absolute (full) server path.
 * For more info please see the user guide:
 *
 * https://codeigniter.com/user_guide/general/managing_apps.html
 *
 * NO TRAILING SLASH!
 */
	$application_folder = 'app';

/*
 *---------------------------------------------------------------
 * VIEW DIRECTORY NAME
 *---------------------------------------------------------------
 *
 * If you want to move the view directory out of the application
 * directory, set the path to it here. The directory can be renamed
 * and relocated anywhere on your server. If blank, it will default
 * to the standard location inside your application directory.
 * If you do move this, use an absolute (full) server path.
 *
 * NO TRAILING SLASH!
 */
	$view_folder = '';


/*
 * --------------------------------------------------------------------
 * DEFAULT CONTROLLER
 * --------------------------------------------------------------------
 *
 * Normally you will set your default controller in the routes.php file.
 * You can, however, force a custom routing by hard-coding a
 * specific controller class/function here. For most applications, you
 * WILL NOT set your routing here, but it's an option for those
 * special instances where you might want to override the standard
 * routing in a specific front controller that shares a common CI installation.
 *
 * IMPORTANT: If you set the routing here, NO OTHER controller will be
 * callable. In essence, this preference limits your application to ONE
 * specific controller. Leave the function name blank if you need
 * to call functions dynamically via the URI.
 *
 * Un-comment the $routing array below to use this feature
 */
	// The directory name, relative to the "controllers" directory.  Leave blank
	// if your controller is not in a sub-directory within the "controllers" one
	// $routing['directory'] = '';

	// The controller class file name.  Example:  mycontroller
	// $routing['controller'] = '';

	// The controller function you wish to be called.
	// $routing['function']	= '';


/*
 * -------------------------------------------------------------------
 *  CUSTOM CONFIG VALUES
 * -------------------------------------------------------------------
 *
 * The $assign_to_config array below will be passed dynamically to the
 * config class when initialized. This allows you to set custom config
 * items or override any default config values found in the config.php file.
 * This can be handy as it permits you to share one application between
 * multiple front controller files, with each file containing different
 * config values.
 *
 * Un-comment the $assign_to_config array below to use this feature
 */
	// $assign_to_config['name_of_config_item'] = 'value of config item';



// --------------------------------------------------------------------
// END OF USER CONFIGURABLE SETTINGS.  DO NOT EDIT BELOW THIS LINE
// --------------------------------------------------------------------

/*
 * ---------------------------------------------------------------
 *  Resolve the system path for increased reliability
 * ---------------------------------------------------------------
 */

	// Set the current directory correctly for CLI requests
	if (defined('STDIN'))
	{
		chdir(dirname(__FILE__));
	}

	if (($_temp = realpath($system_path)) !== FALSE)
	{
		$system_path = $_temp.DIRECTORY_SEPARATOR;
	}
	else
	{
		// Ensure there's a trailing slash
		$system_path = strtr(
			rtrim($system_path, '/\\'),
			'/\\',
			DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
		).DIRECTORY_SEPARATOR;
	}

	// Is the system path correct?
	if ( ! is_dir($system_path))
	{
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'Your system folder path does not appear to be set correctly. Please open the following file and correct this: '.pathinfo(__FILE__, PATHINFO_BASENAME);
		exit(3); // EXIT_CONFIG
	}

/*
 * -------------------------------------------------------------------
 *  Now that we know the path, set the main path constants
 * -------------------------------------------------------------------
 */
	// The name of THIS file
	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

	// Path to the system directory
	define('BASEPATH', $system_path);

	// Path to the front controller (this file) directory
	define('FCPATH', dirname(__FILE__).DIRECTORY_SEPARATOR);

	// Name of the "system" directory
	define('SYSDIR', basename(BASEPATH));

	// The path to the "application" directory
	if (is_dir($application_folder))
	{
		if (($_temp = realpath($application_folder)) !== FALSE)
		{
			$application_folder = $_temp;
		}
		else
		{
			$application_folder = strtr(
				rtrim($application_folder, '/\\'),
				'/\\',
				DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
			);
		}
	}
	elseif (is_dir(BASEPATH.$application_folder.DIRECTORY_SEPARATOR))
	{
		$application_folder = BASEPATH.strtr(
			trim($application_folder, '/\\'),
			'/\\',
			DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
		);
	}
	else
	{
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'Your application folder path does not appear to be set correctly. Please open the following file and correct this: '.SELF;
		exit(3); // EXIT_CONFIG
	}

	define('APPPATH', $application_folder.DIRECTORY_SEPARATOR);

	// The path to the "views" directory
	if ( ! isset($view_folder[0]) && is_dir(APPPATH.'views'.DIRECTORY_SEPARATOR))
	{
		$view_folder = APPPATH.'views';
	}
	elseif (is_dir($view_folder))
	{
		if (($_temp = realpath($view_folder)) !== FALSE)
		{
			$view_folder = $_temp;
		}
		else
		{
			$view_folder = strtr(
				rtrim($view_folder, '/\\'),
				'/\\',
				DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
			);
		}
	}
	elseif (is_dir(APPPATH.$view_folder.DIRECTORY_SEPARATOR))
	{
		$view_folder = APPPATH.strtr(
			trim($view_folder, '/\\'),
			'/\\',
			DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
		);
	}
	else
	{
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'Your view folder path does not appear to be set correctly. Please open the following file and correct this: '.SELF;
		exit(3); // EXIT_CONFIG
	}

	define('VIEWPATH', $view_folder.DIRECTORY_SEPARATOR);

/*
 * --------------------------------------------------------------------
 * LOAD THE BOOTSTRAP FILE
 * --------------------------------------------------------------------
 *
 * And away we go...
 */
require_once BASEPATH.'core/CodeIgniter.php';
