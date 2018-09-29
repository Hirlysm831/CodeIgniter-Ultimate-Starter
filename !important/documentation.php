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
@version
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
@version
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
 * @version    		version
**********/


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