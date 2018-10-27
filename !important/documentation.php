************************************************
***************************************************************************
  https://atom.io/packages/todo-show
 ['FIXME', 'TODO', 'CHANGED', 'XXX', 'IDEA', 'HACK', 'NOTE', 'REVIEW', 'NB', 'BUG', 'QUESTION', 'COMBAK', 'TEMP'] 
  /**
     * Assert that the callback returns true for each variable.
     *
     * @param callable $callback
     * @param string   $message
     *
     * @throws \Dotenv\Exception\InvalidCallbackException|\Dotenv\Exception\ValidationException
     *
     * @return \Dotenv\Validator
     */
 * @package        	CodeIgniter
 * @subpackage    	Libraries
 * @category    	Libraries
 * @access    	Libraries
 * @author        	Zeeshan M
  * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2018, British Columbia Institute of Technology (http://bcit.ca/)
  * @license	http://opensource.org/licenses/MIT	MIT License
  @var 		array()
 * @since	Version 1.0.0
 * @see		at the top
 * @link		../environments.php
 * @url			https://stackoverflow.com/questions/9149483/get-folder-up-one-level/9149495
 @ example
 	 * @todo 		customize the error handler with developer POV and thinking in index.php
	 * @tutorial	https://stackoverflow.com/questions/5187948/how-do-you-format-php-error-messages-they-dont-respect-css

@session_start();
 // echo $_SERVER['AUTH_USER'];
 echo gethostbyaddr($_SERVER['REMOTE_ADDR']);
 // echo $_SERVER['REMOTE_USER'];
  $user= shell_exec("echo %username%"); 
    echo "user : $user";
if (!function_exists('getallheaders')) {
    /**
     * Get all HTTP header key/values as an associative array for the current request.
     *
     * @return string[string] The HTTP header key/value pairs.
     */
    function getallheaders()
    {
        $headers = array();
        $copy_server = array(
            'CONTENT_TYPE'   => 'Content-Type',
            'CONTENT_LENGTH' => 'Content-Length',
            'CONTENT_MD5'    => 'Content-Md5',
        );
        foreach ($_SERVER as $key => $value) {
            if (substr($key, 0, 5) === 'HTTP_') {
                $key = substr($key, 5);
                if (!isset($copy_server[$key]) || !isset($_SERVER[$key])) {
                    $key = str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', $key))));
                    $headers[$key] = $value;
                }
            } elseif (isset($copy_server[$key])) {
                $headers[$copy_server[$key]] = $value;
            }
        }
        if (!isset($headers['Authorization'])) {
            if (isset($_SERVER['REDIRECT_HTTP_AUTHORIZATION'])) {
                $headers['Authorization'] = $_SERVER['REDIRECT_HTTP_AUTHORIZATION'];
            } elseif (isset($_SERVER['PHP_AUTH_USER'])) {
                $basic_pass = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '';
                $headers['Authorization'] = 'Basic ' . base64_encode($_SERVER['PHP_AUTH_USER'] . ':' . $basic_pass);
            } elseif (isset($_SERVER['PHP_AUTH_DIGEST'])) {
                $headers['Authorization'] = $_SERVER['PHP_AUTH_DIGEST'];
            }
        }
        return $headers;
    }
}
foreach (getallheaders() as $name => $value) {
    // echo "$name: $value\n";
}
die();
  try {
    throw new Exception();
    return 1;
  } catch (Exception $e) {
    echo "Exception!\n";
    return 2;
  } finally {
    echo "Finally called!\n";
    return 3;
  }
die();



//https://davidwalsh.name/php-error_reporting-error-reporting
add this one on the dev environment only
error_get_last();


	https://medium.com/@amirsanni/dynamically-setting-base-url-in-codeigniter-3-8179d72ddd84
	https://github.com/assoft/codeigniter/blob/master/application/config/constants.php

	
	/**
 * Predefined logging levels
 *
 * @var array
 */
https://stackoverflow.com/questions/35459870/how-to-configure-multiple-database-and-using-failover-in-codeigniter
https://codeigniter.com/user_guide/database/configuration.html
return $this->output
        ->set_content_type('application/json')
        ->set_status_header(200) // Return status
        ->set_output(json_encode(array(your array)));
		
$response = array('status' => 'OK');

$this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
exit;



/ Base URL (keeps this crazy sh*t out of the config.php
if(isset($_SERVER['HTTP_HOST']))
{
	$base_url = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on' ? 'https' : 'http';
	$base_url .= '://'. $_SERVER['HTTP_HOST'];
	$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
	
	// Base URI (It's different to base URL!)
	$base_uri = parse_url($base_url, PHP_URL_PATH);
	if(substr($base_uri, 0, 1) != '/') $base_uri = '/'.$base_uri;
	if(substr($base_uri, -1, 1) != '/') $base_uri .= '/';
}
else
{
	$base_url = 'http://localhost/';
	$base_uri = '/';
}
// Define these values to be used later on
define('BASE_URL', $base_url);
define('BASE_URI', $base_uri);
define('APPPATH_URI', BASE_URI.APPPATH);
// We dont need these variables any more
unset($base_uri, $base_url);



defined('DEFAULT_ENV') OR define('DEFAULT_ENV', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development'); 
$hostname_development 	= array('localhost','http://test.ultimatemvc.com:8080');
$hostname_testing 		= array('http://test.ultimatemvc.com:8080','http://dikol/test');
$hostname_production	= array('https://www.yoursite.tld','http://www.yoursite.tld');
// Get the requestor host either bird who already suicide any
list($realHost,)=explode(':',$_SERVER['HTTP_HOST']);
$domain = strtolower($realHost);
	
	switch($domain) {
		
		// enter as many ip as  needed for production and testing
		case (in_array($domain, $hostname_production, TRUE)) :
		  defined('ENVIRONMENT') OR define('ENVIRONMENT', 'production');
		break;

		//case '192.168.10.251:8099' :
		//case ($abctest < 750):
		case (in_array($domain, $hostname_testing, TRUE)) :
		  defined('ENVIRONMENT') OR define('ENVIRONMENT', 'testing');
		break;
		
		//default switch value is set this kind whether being access at cli or host request
		default :
		  defined('ENVIRONMENT') OR define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : DEFAULT_ENV);
		break;
	}	
	//--> End of web access of the system here
}
	
noun-actionword
https://www.youtube.com/watch?v=zD4IGp1lBWs
https://github.com/aiamk/codeigniter-restserver
https://code.tutsplus.com/tutorials/working-with-restful-services-in-codeigniter--net-8814
http://programmerblog.net/create-restful-web-services-in-codeigniter/
https://www.codementor.io/byjg/using-json-web-token-jwt-as-a-php-session-axeuqbg1m
https://recalll.co/app/?q=REST%20Authentication%20in%20PHP%20%28CodeIgniter%29
https://github.com/firebase/php-jwt
https://github.com/chriskacerguis/codeigniter-restserver/issues/765
https://vivavivugeek.blogspot.com/2016/08/codeigniter-build-jwt-authentication.html

https://github.com/dwyl/learn-json-web-tokens
https://isabelcastillo.com/error-info-messages-css
https://github.com/dodistyo/ci-rest-jwt
https://github.com/ParitoshVaidya/CodeIgniter-JWT-Sample
<?php
/*
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//$token = bin2hex(openssl_random_pseudo_bytes(64));	
*/
//https://www.weichieprojects.com/blog/curl-api-calls-with-php/
//https://stackoverflow.com/questions/30426047/correct-way-to-set-bearer-token-with-curl
function callAPI($method, $url, $data,$headers = false){
   $curl = curl_init();

   switch ($method){
      case "POST":
         curl_setopt($curl, CURLOPT_POST, 1);
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      break;
	  
      case "PUT":
         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
      break;
	  
      default:
         if ($data)
            $url = sprintf("%s?%s", $url, http_build_query($data));
   }

   // OPTIONS:
   curl_setopt($curl, CURLOPT_URL, $url);
   if(!$headers){
       curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'APIKEY: 111111111111111111111',
          'Content-Type: application/json',
       ));
   }else{
       curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'APIKEY: 111111111111111111111',
          'Content-Type: application/json',
          $headers
       ));
   }
   curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
   curl_setopt($curl, CURLOPT_TIMEOUT, 30);
   curl_setopt($curl, CURLOPT_HEADER, 1); //addtional 2
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  //instead print directly, uncomment to be passed to variable
   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
   //curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY); extension
   // curl_setopt($curl, CURLOPT_USERPWD, “username:password”); //addtional 1

   curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//addition 1 if https uncomment here
   // EXECUTE:
   $result = curl_exec($curl);
   if(!$result){die("Connection Failure");}
   curl_close($curl);
   return $result;
}


/***************************************************************************
 * 
 * @project			Custom Codeigniter V3
 * @description		Standard Framework in PHP with codeigniter framework
 * @author			Francisco Abayon
 * @url				[N/A]
 * @since			0.0.1
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
 
 @abstract
@access
@category
@package
@subpackage
@method
@property
@param
@return
@todo
@see
@final
@ignore
@internal
@since
@author
@copyright
@license
@deprecated
@example

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
@abstract
@access
@category
@package
@subpackage
@method
@property
@param
@return
@todo
@see
@final
@ignore
@internal
@since
@author
@copyright
@license
@deprecated
@example





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
 * @since    		version
**********/

<<<<<<< HEAD

<?php
class MY_Loader extends CI_Loader
{
	/**
	* List of paths to load interfaces from
	*
	* @var array
	* @access protected
	*/
	protected $_ci_interface_paths = array();
	function __construct()
	{
		parent::__construct();
		//we do all the standard Loader construction, then also set up the acceptable places to look for interfaces
		$this->_ci_interface_paths = array(APPPATH, BASEPATH);
	}
	 
	public function initialize()
	{
	parent::initialize();
		// After the parent is initialized, we load the autoload config
		if (defined('ENVIRONMENT') AND file_exists(APPPATH.'config/'.ENVIRONMENT.'/autoload.php'))
		{
		include(APPPATH.'config/'.ENVIRONMENT.'/autoload.php');
		}
		else
		{
		include(APPPATH.'config/autoload.php');
		}
		// and if $autoload['interface'] is in the config, load each one
		if (isset($autoload['interface']))
		{
		foreach($autoload['interface'] as $interface)
		$this->iface($interface);
		}
	}
	 
	/**
	* Load an interface from /application/interfaces
	*
	* @param $interface string The interface name
	* @return CI_Loader for chaining */
	public function iface($interface = '')
	{
	$class = str_replace('.php', '', trim($interface, '/'));
	 
	// Was the path included with the interface name?
	// We look for a slash to determine this
	$subdir = '';
	if (($last_slash = strrpos($class, '/')) !== FALSE)
	{
	// Extract the path
	$subdir = substr($class, 0, $last_slash + 1);
	 
	// Get the filename from the path
	$class = substr($class, $last_slash + 1);
	}
	// Look for the interface path and include it
	$is_duplicate = FALSE;
	foreach ($this->_ci_interface_paths as $path)
	{
	$filepath = $path.'interfaces/'.$subdir.$class.'.php';
	 
	// Does the file exist? No? Try the remaining paths
	if ( ! file_exists($filepath))
	{
	continue;
	}
	 
	include_once($filepath);
	$this->_ci_loaded_files[] = $filepath;
	return $this;
	}
}
}
/* End of file MY_Loader.php */
/* Location: ./application/core/MY_Loader.php */


https://github.com/ParitoshVaidya/CodeIgniter-JWT-Sample
https://github.com/lcobucci/jwt
https://dev.to/robdwaller/how-to-create-a-json-web-token-using-php-3gml
https://stackoverflow.com/questions/40903355/how-to-verify-jwt-token-in-codeigniter-3-x-for-every-request-from-client

https://github.com/dhanifudin/rest-in-ci
=======
http://myrightcode.com/send-email-using-php-mailer-codeigniter/
https://www.smashingmagazine.com/2009/01/50-extremely-useful-php-tools/
https://github.com/theseer/phpdox
https://www.smashingmagazine.com/2008/12/50-really-useful-css-tools/
https://thinkinginobjects.com/2012/08/26/dont-use-dao-use-repository/
https://medium.com/@tungnt86/program-to-an-interface-not-an-implementation-108692c08baa
https://www.airpair.com/php/posts/best-practices-for-modern-php-development
https://phptherightway.com/pages/Design-Patterns.html
https://designpatternsphp.readthedocs.io/en/latest/Structural/DataMapper/README.html
https://dzone.com/articles/practical-php/practical-php-patterns-data

http://php.net/language.oop5.typehinting
http://php.net/manual/en/language.oop5.interfaces.php
https://codeutopia.net/blog/2009/01/05/decoupling-models-from-the-database-data-access-object-pattern-in-php/
http://php.net/manual/en/functions.arguments.php#functions.arguments.type-declaration

================
$year = date("Y");   
$month = date("m");   
$filename = "../".$year;   
$filename2 = "../".$year."/".$month;

if(file_exists($filename)){
    if(file_exists($filename2)==false){
        mkdir($filename2,0777);
    }
}else{
    mkdir($filename,0777);
}


$dirname = $_POST["search"];
$filename = "/folder/" . $dirname . "/";

if (!file_exists($filename)) {
    mkdir("folder/" . $dirname, 0777);
    echo "The directory $dirname was successfully created.";
    exit;
} else {
    echo "The directory $dirname exists.";
}


define('CI_VERSION', '2.1.3');
echo CI_VERSION;

applications/foo/
applications/foo/config/
applications/foo/controllers/
applications/foo/libraries/
applications/foo/models/
applications/foo/views/
applications/bar/
applications/bar/config/
applications/bar/controllers/
applications/bar/libraries/
applications/bar/models/
applications/bar/views/




https://code.tutsplus.com/tutorials/manage-multiple-applications-in-codeigniter--cms-29795
https://www.twoclock.com/multiple-applications-with-one-codeigniter-installation/

===========
?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*|--------------------------------------------
------------------------------| Base Site URL|---------------
-----------------------------------------------
------------|| URL to your CodeIgniter root. Typically this will be your base URL,| WITH a trailing slash:|| http://www.your-site.com/|*/
if(isset($_SERVER['HTTP_HOST'])){  
  $config['base_url'] = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on' ? 'https' : 'http'; 
  $config['base_url'] .= '://'. $_SERVER['HTTP_HOST'];  
  $config['base_url'] .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
  }
else{    $config['base_url'] = 'http://localhost/';}

when to use die
  https://stackoverflow.com/questions/1795025/what-are-the-differences-in-die-and-exit-in-php/27851270#27851270
  
/*|---------------------
------------------------------
-----------------------| Site| Set a constant for whichever site you happen to be running, if its not here| it will fatal error.|-------------
-------------------------------------------------
------------*/
switch($_SERVER['HTTP_HOST']){
case 'example.com':  
  case 'www.example.com':  
  define('SITE', 'example'); 
break;    
    case 'example2.com':  
	case 'www.example2.com':
	define('SITE', 'example2');   
break;        d
efault:       
 define('SITE', 'default');    break;}
>>>>>>> 810e8426c0174144b85810a01c7befdcebaa9a3d
--------------------
<?php 
$indicesServer = array('PHP_SELF', 
'argv', 
'argc', 
'GATEWAY_INTERFACE', 
'SERVER_ADDR', 
'SERVER_NAME', 
'SERVER_SOFTWARE', 
'SERVER_PROTOCOL', 
'REQUEST_METHOD', 
'REQUEST_TIME', 
'REQUEST_TIME_FLOAT', 
'QUERY_STRING', 
'DOCUMENT_ROOT', 
'HTTP_ACCEPT', 
'HTTP_ACCEPT_CHARSET', 
'HTTP_ACCEPT_ENCODING', 
'HTTP_ACCEPT_LANGUAGE', 
'HTTP_CONNECTION', 
'HTTP_HOST', 
'HTTP_REFERER', 
'HTTP_USER_AGENT', 
'HTTPS', 
'REMOTE_ADDR', 
'REMOTE_HOST', 
'REMOTE_PORT', 
'REMOTE_USER', 
'REDIRECT_REMOTE_USER', 
'SCRIPT_FILENAME', 
'SERVER_ADMIN', 
'SERVER_PORT', 
'SERVER_SIGNATURE', 
'PATH_TRANSLATED', 
'SCRIPT_NAME', 
'REQUEST_URI', 
'PHP_AUTH_DIGEST', 
'PHP_AUTH_USER', 
'PHP_AUTH_PW', 
'AUTH_TYPE', 
'PATH_INFO', 
'ORIG_PATH_INFO') ; 

echo '<table cellpadding="10">' ; 
foreach ($indicesServer as $arg) { 
    if (isset($_SERVER[$arg])) { 
        echo '<tr><td>'.$arg.'</td><td>' . $_SERVER[$arg] . '</td></tr>' ; 
    } 
    else { 
        echo '<tr><td>'.$arg.'</td><td>-</td></tr>' ; 
    } 
} 
echo '</table>' ; 

/* 

That will give you the result of each variable like (if the file is server_indices.php at the root and Apache Web directory is in E:\web) : 

PHP_SELF    /server_indices.php 
argv    - 
argc    - 
GATEWAY_INTERFACE    CGI/1.1 
SERVER_ADDR    127.0.0.1 
SERVER_NAME    localhost 
SERVER_SOFTWARE    Apache/2.2.22 (Win64) PHP/5.3.13 
SERVER_PROTOCOL    HTTP/1.1 
REQUEST_METHOD    GET 
REQUEST_TIME    1361542579 
REQUEST_TIME_FLOAT    - 
QUERY_STRING    
DOCUMENT_ROOT    E:/web/ 
HTTP_ACCEPT    text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8 
HTTP_ACCEPT_CHARSET    ISO-8859-1,utf-8;q=0.7,*;q=0.3 
HTTP_ACCEPT_ENCODING    gzip,deflate,sdch 
HTTP_ACCEPT_LANGUAGE    fr-FR,fr;q=0.8,en-US;q=0.6,en;q=0.4 
HTTP_CONNECTION    keep-alive 
HTTP_HOST    localhost 
HTTP_REFERER    http://localhost/ 
HTTP_USER_AGENT    Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.57 Safari/537.17 
HTTPS    - 
REMOTE_ADDR    127.0.0.1 
REMOTE_HOST    - 
REMOTE_PORT    65037 
REMOTE_USER    - 
REDIRECT_REMOTE_USER    - 
SCRIPT_FILENAME    E:/web/server_indices.php 
SERVER_ADMIN    myemail@personal.us 
SERVER_PORT    80 
SERVER_SIGNATURE    
PATH_TRANSLATED    - 
SCRIPT_NAME    /server_indices.php 
REQUEST_URI    /server_indices.php 
PHP_AUTH_DIGEST    - 
PHP_AUTH_USER    - 
PHP_AUTH_PW    - 
AUTH_TYPE    - 
PATH_INFO    - 
ORIG_PATH_INFO    - 

*/ 
?>

for($i=0;$i<3;$i++) {
    $str = str_repeat("Hello", 10000);
    echo memory_get_peak_usage(), PHP_EOL;
    unset($str);
}
--------------------
environments in the htaccesss
<IfModule mod_env.c>
    SetEnv CI_ENV development
</IfModule>
--------------------

	$dotenv = new Dotenv\Dotenv(APPPATH . CONFIG_FOLDER . DIRECTORY_SEPARATOR . ENVIRONMENT  );
			$dotenv->load();
			$dotenv->required(['XYZ_DBHOST_DEFAULT', 'XYZ_DBUSER_DEFAULT', 'XYZ_DBPASSWORD_DEFAULT']);
			
			//check the variables if empty, error will be return in the exception
			$dotenv->required('XYZ_DBHOST_DEFAULT')->notEmpty();
			$dotenv->required('XYZ_DBUSER_DEFAULT')->notEmpty();
			$dotenv->required('XYZ_DBPASSWORD_DEFAULT')->notEmpty();
$hook['pre_controller'][] = array(
  'class' => 'environment',
  'function' => 'environments',
  'filename' => 'environment_hook.php',
  'filepath' => 'hooks',
  'params'   => ''
);