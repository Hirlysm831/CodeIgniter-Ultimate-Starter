<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/***************************************************************************
 * 
 * @package	    	Maintenance_Mode
 * @description		Get real visitors ip address with shorthand method also
 *					requires php7 version and up
 * @author			Francisco Abayon
 * @url 			https://aftabmuni.wordpress.com/2016/07/06/setup-maintenance-mode-using-hooks-in-codeigniter/
 * @url			 	https://github.com/bcit-ci/CodeIgniter/wiki/I-want-to-take-my-site-offline-for-maintenance---rogierb
 * @url			 	https://stackoverflow.com/questions/15572568/how-to-build-in-maintenance-mode-in-codeigniter
 * @url			 	https://gist.github.com/georgioupanayiotis/17bd480829a313402402
 * @url			 	https://stackoverflow.com/questions/10471974/codeigniter-2-and-htaccess-how-to-implement-down-for-maintenance-mode
 * @url			 	https://bitbucket.org/skunkbad/community-auth-git-version/src/032a2c579cb0089eea44bce3aa6a4b8ce1220fb6/maintenance-mode.php?at=master&fileviewer=file-view-default
 * @source			[custom][mix]
 * @version  		0.0.1
 * @todo  		    Text should be call on language or multilingual mode
 * @see				../config/ENVIRONMENT/autoload.php
 * @see				../config/ENVIRONMENT/config.php
 * @see				../config/mainteance_config.php
 * @see				../app/helper/real_ip_helper.php
 * @see				../app/views/errors/html/error_maintenance.php
 * @see				../app/views/errors/cli/error_maintenance.php
 * 					
 ***************************************************************************/

/***************************************************************************
 *
 * @access       	public
 * @description		Get real visitors ip address with shorthand method also
 *					requires php7 version and up
 * @author			Francisco Abayon
 * 
 ***************************************************************************/
class Environment {

  public function __construct() {
    // $this->CI =& get_instance();
    log_message('debug','Accessing environment_hooks from application/hooks.');
  }

	/*//////////
	 *
	 *	$params[0] = config file name
	 *	$params[1] = config variable
	 *	$params[2] = controller name
	 *
	//////////*/
  public function environments() {
    self::__construct();
    // $user_ip  = $this->CI->input->ip_address();
    // $exemption_ip  = $this->CI->config->item('allowed_maintenance_ips');
    $environment  = 'production';

	// echo APPPATH;
	switch(ENVIRONMENT) {
		#https://github.com/vlucas/phpdotenv/
		case 'development' :
		case 'testing' :
			// $dotenv = new Dotenv\Dotenv(APPPATH);
			// $dotenv->load();		
			// require_once APPPATH.'third_party'.DIRECTORY_SEPARATOR.'arrilot'.DIRECTORY_SEPARATOR.'dotenv-php'.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'DotEnv.php';
			 // $namespace = APPPATH.'third_party'.DIRECTORY_SEPARATOR.'arrilot'.DIRECTORY_SEPARATOR.'dotenv-php'.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'DotEnv.php';
			 // $namespace = $this->GetFullNamespace(APPPATH . 'vendor\', '.\\..\\Arrilot\DotEnv');
			 // $namespace = $this->GetFullNamespace(APPPATH . 'vendor');
			 $namespace = $this->GetFullNamespace(__NAMESPACE__, '.\\..\\..\\Arrilot\DotEnv');
			 
			// use Arrilot\DotEnv;
			// $dotenvs = new DotEnv();
			// var_dump(APPPATH);
			// var_dump(FCPATH);
			var_dump($namespace);
			// $dotenvs->load(APPPATH . '.env.php');
		break;

		#https://github.com/arrilot/dotenv-php
		case 'production' :
			
			// use APPPATH \Arrilot\DotEnv\DotEnv;
			require_once APPPATH.'third_party/arrilot/dotenv-php/src/DotEnv.php';
			// GetFullNamespace
			DotEnv::load(APPPATH . '.env.php');
			// echo
			// $dotenv = new Dotenv\Dotenv(APPPATH);
			// $dotenv->load();		
		break;
		
		// default switch value is set this kind whether being access at cli or host request
		default :
			die('ENVIRONMENT is not set properly');
		break;
	}		

	//override
	//$dotenv->overload();
	
	//rreq
	//$dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS']);
	//$dotenv->required('DATABASE_DSN');
	
	//$dotenv->required('DATABASE_DSN')->notEmpty();
  }

  
  
  
public function GetFullNamespace($currentNamespace, $relativeNamespace)
{
    // correct relative namespace
    $relativeNamespace = preg_replace('#/#Di', '\\', $relativeNamespace);

    // create namespace parts
    $namespaceParts = explode('\\', $currentNamespace);

    // create parts for relative namespace
    $relativeParts = explode('\\', $relativeNamespace);

    $part;
    for($i=0; $i<count($relativeParts); $i++) {
        $part = $relativeParts[$i];

        // check if just a dot
        if($part == '.') {

            // just a dot - do nothing
            continue;
        }
        // check if two dots
        elseif($part == '..') {

            // two dots - remove namespace part at end of the list
            if(count($namespaceParts) > 0) {

                // remove part at end of list
                unset($namespaceParts[count($namespaceParts)-1]);

                // update array-indexes
                $namespaceParts = array_values($namespaceParts);
            }
        }
        else {

            // add namespace part
            $namespaceParts[] = $part;
        }
    }

    if(count($namespaceParts) > 0) {
        return implode('\\', $namespaceParts);
    }
    else {
        return '';
    }

}  
  
  
  
  
  
  
  
  
  
  
  
}
/* End of maintenance class*/
