<?php
require_once 'includes/functions.php';
require_once 'includes/classes/task.php';
require_once 'includes/classes/week.php';
require_once 'includes/classes/day.php';

$handle = fopen("php://stdin","r");
out("Task Manager",$handle);

$week = new Week();
$end = 0;

do{	
	$dayName = in("Weekday :", $handle);
	if($dayName == '0'){
		out("Good bye",$handle);
		$end = 1;
		continue;
	}

	$day = $week->getDayByName($dayName);
	if(empty($day)){
		out("Wrong Weekday!!!!!!!!!!!!!",$handle);
		continue;
	}
	
	$taskName=in("Task : ", $handle);
	if(empty($taskName)){
		out("Empty Task.",$handle);
		continue;
	}

	$priority =in("Task Priority :",$handle);
	if(empty($priority)){
		out("Default Priority 0",$handle);
		$priority=0;
		continue;
	}

	addTaskToDayOfWeek($week,$dayName,$taskName,$priority);
}while(!$end);

print_r($week->getDays());
