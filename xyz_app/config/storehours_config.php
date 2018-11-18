<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*************************************************  
 *
 * PHP Store hours
 *
 * @category	helper
 * @since		0.1
 * @author 		CORY ETZKORN <coryetzkorn.com>
 * @url			https://stackoverflow.com/questions/31309536/how-to-set-time-zone-in-codeigniter
 * 
 * @todo		Research and refactor the code based on codeigniter standard
 * @see			../helper/storehours_helper.php
 * 
 ************************************************/


 /*************************************************  
 *
 * Define daily open hours
 * Must be in 24-hour format, separated by dash 
 * If closed for the day, set to 00:00-00:00
 * If open multiple times in one day, enter time ranges separated by a comma
 * If open late (ie. 6pm - 1am), add hours after midnight to the next day (ie. 00:00-1:00)
 * 
 ************************************************/
$config['store_hours'] = array(
    'mon' => array('11:00-22:00'),
    'tue' => array('11:00-16:00', '18:00-22:00'),
    'wed' => array('11:00-22:00'),
    'thu' => array('11:00-22:00'),
    'fri' => array('11:00-22:00'),
    'sat' => array('11:00-20:00'),
    'sun' => array('11:00-20:00')
);

 /*************************************************  
 *
 *  Optional: add exceptions (great for holidays etc.)
 *  Works best with format day/month
 *  Leave array empty if no exceptions
 * 
 * @todo	call everything to the database
 * @todo	call everything to the database
 * 
 ************************************************/
$config['store_exceptions'] = array(
    'Christmas' => '10/22',
	'New Years Day' => '1/1'
);

 /*************************************************  
 *
 * Place HTML for output below. This is what will show in the browser.
 * Optional: use %open% and %closed% to add dynamic times to your open message.
 * Warning: %open% and %closed% will NOT work if you have multiple time ranges assigned to a single day.
 * Optional: use %day% to make your "closed all day" message more dynamic.
 * Optional: use %exception% to make your exception messages dynamic.
 * 
 * @todo	load this one in the controller
 * @todo	create language aside from english
 * 
 ************************************************/
$config['store_open_now']	= "<h3>Yes, we're open! Today's hours are %open% until %closed%.</h3>";
$config['store_closed_now']	= "<h3>Sorry, we're closed. Today's hours are %open% until %closed%.</h3>";
$config['store_closed_all_day']	= "<h3>Sorry, we're closed on %day%.</h3>";
$config['store_exception']	= "<h3>Sorry, we're closed for %exception%.</h3>";

// Enter custom time format if using %open% and %closed%
// (options listed here: http://php.net/manual/en/function.date.php)
$config['store_time_format'] = 'g:ia';

// The %day% shortcode is replaced by these days of the week.
// Edit these if you'd like to use a language other than English.
$config['store_operation_days'] = array(
  'mon' => 'Mondays',
  'tue' => 'Tuesdays',
  'wed' => 'Wednesdays',
  'thu' => 'Thursdays',
  'fri' => 'Fridays',
  'sat' => 'Saturdays',
  'sun' => 'Sundays'
);

