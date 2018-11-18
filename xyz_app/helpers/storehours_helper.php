<?php defined('BASEPATH') OR exit('No direct script access allowed');
/***************************************************************************
*
* @package		store hours setup
* @category		helper
* @return		the data of the operation hours whether it is open, closed or holidays
* @url			../config/storehours_config.php
* @url			../config/ENVIRONMENT/autoload.php
* @url			../config/ENVIRONMENT/autoload.php
* @todo				go back to this class and understand deeper values in the property and method
*
***************************************************************************/
// ------------------------------------------------------------------------

if (!function_exists('store_hours')) {
    function store_hours()
    {
        $CI =& get_instance();
		$CI->config->load('storehours_config', TRUE);
		$arr_data = $CI->config->item('storehours_config');

		$day = strtolower(date("D"));
		$today = strtotime('today midnight');
		$now = strtotime(date("G:i"));
		$is_open = 0;
		$is_exception = false;
		$is_closed_all_day = false;

		// Check if closed all day
		if($arr_data['store_hours'][$day][0] == '00:00-00:00') {
			$is_closed_all_day = true;
		}

		// Check if currently open
		foreach($arr_data['store_hours'][$day] as $range) {
			$range = explode("-", $range);
			$start = strtotime($range[0]);
			$end = strtotime($range[1]);
			if (($start <= $now) && ($end >= $now)) {
				$is_open ++;
			}
		}

		// Check if today is an exception
		foreach($arr_data['store_exceptions'] as $ex => $ex_day) {
			$ex_day = strtotime($ex_day);
			if($ex_day === $today) {
				$is_open = 0;
				$is_exception = true;
				$the_exception = $ex;
			}
		}

		// Output HTML
		if($is_exception) {
			$arr_data['exception'] = str_replace('%exception%', $the_exception, $arr_data['exception']);
			return $arr_data['exception'];
		} elseif($is_closed_all_day) {
			$arr_data['closed_all_day'] = str_replace('%day%', $arr_data['store_operation_days'][$day], $arr_data['closed_all_day']);
			return $arr_data['closed_all_day'];
		} elseif($is_open > 0) {
			$arr_data['open_now'] = str_replace('%open%', date($arr_data['store_time_format'], $start), $arr_data['open_now']);
			$arr_data['open_now'] = str_replace('%closed%', date($arr_data['store_time_format'], $end), $arr_data['open_now']);
			return $arr_data['open_now'];
		} else {
			$arr_data['store_closed_now'] = str_replace('%open%', date($arr_data['store_time_format'], $start), $arr_data['store_closed_now']);
			$arr_data['store_closed_now'] = str_replace('%closed%', date($arr_data['store_time_format'], $end), $arr_data['store_closed_now']);
			return $arr_data['store_closed_now'];
		}
    }
}

