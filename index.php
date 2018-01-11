<?php
require_once 'includes/functions.php';
require_once 'includes/classes/task.php';
require_once 'includes/classes/week.php';

$handle = fopen ("php://stdin","r");

out("Welcome in your taskManager:");

$week = new Week();
$defaultTask = new Task('faire le ménage');

addTaskToDayOfWeek($week,'sunday', $defaultTask);

do{
	
	$task = new Task();	
	$day = in("Plz enter the day of the week:", $handle);	
	if(!ISSET($week[$day])){
		out("WROOOOOONG!!");
		continue;
	}	
	$task->setName(in('Plz enter tha task name', $handle));
	$week[$day][] = $task;
	print_r($week);
	out("----------");
	
} while(!empty($day) && !empty($task->getName()));

out("a bientot");