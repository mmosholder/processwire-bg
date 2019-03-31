<?php
/*
	
	This file generates recurme calendars for use in ajax calls 	
		
*/	

$recurme->deleteCache();
$out 			= '';
$calendar 		= new rmCalendar();
$options 		= $calendar->getDefaultCalendarOptions();

if(isset($_POST['options'])){

	$settings = json_decode($_POST['options'], true);
	
	array_walk_recursive($settings, function (&$value) {
		$value = html_entity_decode($value);
	});
	
	$options = array_replace_recursive($options, $settings);
	
	$month 			= $options['month'];
	$year			= $options['year'];
	$startTime 		= strtotime("$year-$month-01 00:00:01"); // not using.
	
}

	$newMonth		= $input->get($options['getVarMonth']);
	$newYear		= $input->get($options['getVarYear']);
	
	if($newMonth && $newYear){
		$options['month'] = $newMonth;
		$options['year']  = $newYear;
		//$options['debug'] = true;
		$options['cacheName'] = ''; // so that we create a new cacheName
	}

	// make the calendar	
	$out .= $calendar->render($options);

	echo $out;
	


?>

