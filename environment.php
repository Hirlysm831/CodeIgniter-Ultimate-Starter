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
protected function _parse_argv(){
	$args = array_slice($_SERVER['argv'], 1);
	return $args ? implode('/', $args) : '';
}


if ((php_sapi_name() == 'cli') or defined('STDIN')){

	$environment = DEFAULT_ENV;
	if (isset($argv)) && $argv)  {
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
 *
 ****************/
	$domain = strtolower($_SERVER['HTTP_HOST']);
	switch($domain) {
		
		// enter as many ip as  needed for production and testing
		case 'www.yoursite.tld' :
		  define('ENVIRONMENT', 'production');
		break;

		// case '192.168.10.251:8099' :
		case '1111111111' :
		case '11.111.11.11' :
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