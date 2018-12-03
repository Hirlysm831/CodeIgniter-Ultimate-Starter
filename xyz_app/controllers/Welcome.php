<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
public function demo_date() {

# Refference variable(pointer somewhat)			
// $a=2;
// $b=&$a; // note the & operator
// $b=3;
	
#codeigniter logger
// $this->load->library('utilities/Logviewer');
// echo  $this->logviewer->showlogs(); 

// echo store_hours();

#setup variable in the system, either in htaccess/web.config or manual in CICD PAAS
// echo  $ip = getenv('XYZ_DBHOST_DEV', true) ? getenv('XYZ_DBHOST_DEV', true) : getenv('XYZ_DBHOST_DEV');
}	 
	 
	public function index()
	{
		$this->load->library('encryption');
$key = $this->encryption->create_key(16);
// Get a hex-encoded representation of the key:
	$data['key']  = bin2hex($this->encryption->create_key(16));

		// @link		https://stackoverflow.com/questions/11071529/pass-multi-dimensional-array-from-controller-to-view-codeignighter
	$data['menus'] = array(
				"SANDWITCH"=>array(
					"title" => "SANDWITCH",
					"price" => "11",
					'description' => "Delicious, freshly made, and oh-so-satisfying. From the Big Mac to our 
					Premium Grilled Chicken Club to our classic Cheeseburger, McDonald’s sandwiches make the meal."

				),
				"SALAD"=>array(
					"title" => "SALAD",
					"price" => "15",
					'description' => "Nutritional values are based on average figures and standard product 
					formulation. Actual serving size and nutrient values may vary including due to special customer requests."

				),
				"JUICES"=>array(
					"title" => "JUICES",
					"price" => "10",
					'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum 
					has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley 
					of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also 
					the leap into electronic typesetting, remaining essentially unchanged."
				),
				"LUNCH"=>array(
					"title" => "LUNCH",
					"price" => "20",
					'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum 
					has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley 
					of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also 
					the leap into electronic typesetting, remaining essentially unchanged."
				),
		);
		$this->load->view('welcome_message',$data); 
		// $this->load->library('utilities/Logviewer');
// echo  $this->logviewer->showlogs(); 

	}
	

}
