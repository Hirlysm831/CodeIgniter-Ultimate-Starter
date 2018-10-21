<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

/*
|--------------------------------------------------------------------------
| Custom Constants
|--------------------------------------------------------------------------
*/
/*************************************************  
 *
 * Custom environment load and dynamic lookup of the root file
 * 
 * @url			https://stackoverflow.com/questions/9149483/get-folder-up-one-level/9149495
 * @url			https://stackoverflow.com/questions/7008830/why-defined-define-syntax-in-defining-a-constant 
 * @url			https://semver.org/
 *
 * @todo		Apply CICD based on the SemVer variables reflected in the repository
 * @tutorial	http://php.net/manual/en/timezones.asia.php
 * 
 ************************************************/
defined('MAJOR')			OR define('MAJOR','0', TRUE);  // major changes tracking
defined('MINOR') 			OR define('MINOR','0', TRUE); 	// minor changes tracking
defined('PATCH') 			OR define('PATCH','1', TRUE);	// patch changes tracking
defined('APP_NAME') 		OR define('APP_NAME','xxxxxxxxxxx');  // name of the application in the system
defined('APP_VERSION') 		OR define('APP_VERSION',MAJOR .'.'. MINOR .'.'. PATCH, TRUE);  // semantic version
defined('ENVIRONMENT_APP_NAME_VERSION') OR define('ENVIRONMENT_APP_NAME_VERSION',ucwords(ENVIRONMENT) .':'. APP_NAME .'-'.APP_VERSION, TRUE);  // Name of the system with its corresponding version
defined('SUBCLASS_PREFIX') 	OR define('SUBCLASS_PREFIX','xyz_');  // semantic version
defined('PROXY_IPS') 		OR define('PROXY_IPS', $_SERVER["HTTP_X_REAL_IP"] ?? $_SERVER["HTTP_X_FORWARDED_FOR"] ?? $_SERVER["HTTP_CLIENT_IP"] ?? $_SERVER["REMOTE_ADDR"] ?? NULL, TRUE);  // Dynamic filterring data in PROXY_IP based on setup of Cloud
defined('DEFAULT_TIMEZONE') OR define('DEFAULT_TIMEZONE','Asia/Urumqi' ,TRUE);  //Timezone Setup in Asia, can be used also in 'Asia/Manila'
defined('PUBLIC_FOLDER') 	OR define('PUBLIC_FOLDER','xyz_public' ,TRUE);  //  Folder name of the directory in public folder
defined('CONFIG_FOLDER') 	OR define('CONFIG_FOLDER','config' ,TRUE);  //  Folder name of the directory in config folder
defined('LOGS_FOLDER') 		OR define('LOGS_FOLDER','logs' ,TRUE);  // Folder name of the directory in logs
defined('THIRD_PARTY') 		OR define('THIRD_PARTY','third_party' ,TRUE);  // Folder name of the directory in thirdy_party