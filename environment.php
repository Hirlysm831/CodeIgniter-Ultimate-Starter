<?php
/***************************************************************************
 *
 * @package    		Environment_pac
 * @description 	Dynamic Environment detection for codeigniter code and 
 *					being access via Command Line Interface(CLI).
 * @author			Francisco Abayon
 * @version			0.0.1
 * @see				Root of the index.php file
 *
 * @url  			http://codebyjeff.com/blog/2013/10/setting-environment-vars-for-codeigniter-commandline
 * @url				http://codeinphp.github.io/post/development-environments-in-codeigniter/
 * @url				http://avenir.ro/codeigniter-tutorials/step-2-set-environments/
 * @url				https://phpdelusions.net/articles/empty
 *
 ***************************************************************************/

/****************
 *
 * This can be set to anything, but default usage is:
 *  - development
 *  - testing
 *  - production
 *     
 *     
 * It's in two places - let's be smart
 * Our goal is to send:
 *   - php index.php cron daily_tasks important_job 123 --env production
 *	 - and have it run http://mysite.com/cron/daily_tasks/important_job/123 
 *	   using the production environment
 *
 ****************/
define('DEFAULT_ENV', 'development');
$hostname_development 	= array('localhost');
$hostname_testing 		= array('localhosts','http://dikol/test');
$hostname_production	= array('https://www.yoursite.tld','http://www.yoursite.tld');

/****************
 *
 * Having conditional statement for not being access via cli is set to by boolean and check
 * if being access via cli it well automatically change the environment on it
 *
 * @todo		Create a case expression for determining the CLI or web in HTTP_HOST
 * @var			Boolean						Environement act ast the trigger point
 *
 ****************/

//--> Start of cli code here and detects if it is a command line request
if ((php_sapi_name() == 'cli') or defined('STDIN')){
	$args = array_slice($_SERVER['argv'], 1);
	$args ? implode('/', $args) : '';
	
	$environment = DEFAULT_ENV;
	if (isset($argv) && $argv)  {
		// grab the --env argument, and the one that comes next
		$key = (array_search('--env', $argv));
		$environment = $argv[$key +1];

		// get rid of them so they don't get passed in to our method as parameter values
		unset($argv[$key], $argv[$key +1]);
	}  
  	define('ENVIRONMENT', $environment);
	//--> End of CLI code here
} else{
	
	//--> Start of web request access
/****************
 *
 * Not safe using on $_SERVER['HTTP_HOST'] but just be careful...
 *
 * @url				https://stackoverflow.com/questions/10350602/how-safe-is-serverhttp-host
 * @url				https://stackoverflow.com/questions/6474783/which-server-variables-are-safe
 * @url				https://stackoverflow.com/questions/2297403/what-is-the-difference-between-http-host-and-server-name-in-php
 *
 ****************/
list($realHost,)=explode(':',$_SERVER['HTTP_HOST']);
$domain = strtolower($realHost);
	
	switch($domain) {
		
		// enter as many ip as  needed for production and testing
		case (in_array($domain, $hostname_production, TRUE)) :
		  define('ENVIRONMENT', 'production');
		break;

		// case '192.168.10.251:8099' :
		// case ($abctest < 750):
		case (in_array($domain, $hostname_testing, TRUE)) :
		  define('ENVIRONMENT', 'testing');
		break;
		
		// default switch value is set this kind whether being access at cli or host request
		default :
			if (!defined('ENVIRONMENT')) define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : DEFAULT_ENV);
		break;
	}	
	//--> End of web access of the system here
}
// End of the file environment.php
