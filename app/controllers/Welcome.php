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
	public function index()
	{
		$this->load->view('welcome_message');
		// echo DB_HOST;
		 
		 // $ip = getenv('REMOTE_ADDR', true) ?: getenv('REMOTE_ADDR');
		 // $ip = getenv('REMOTE_ADDR', true) ? getenv('REMOTE_ADDR', true) : getenv('REMOTE_ADDR');
		 // echo ENVIRONMENT;
		// echo $s3_bucket = $_ENV['DB_HOST'];
		// echo $dbUser = DotEnv::get('DB_USER', 'admin');
		// echo $s3_bucket =getenv('DB_HOST');
		// echo ENVIRONMENT;
		//https://stackoverflow.com/questions/21901795/database-credentials-encryption-codeigniter
		//https://stackoverflow.com/questions/5010660/how-do-you-use-setenv-to-read-variables-in-apache
	}
	
	/*
	
	When a new developer clones your codebase, they will have an additional one-time step to manually copy the .env.example file to .env and fill-in their own values (or get any sensitive values from a project co-worker).

phpdotenv is made for development environments, and generally should not be used in production. In production, the actual environment variables should be set so that there is no overhead of loading the .env file on each request. This can be achieved via an automated deployment process with tools like Vagrant, chef, or Puppet, or can be set manually with cloud hosts like Pagodabox and Heroku.*/
}
