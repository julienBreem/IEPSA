<?php
require_once 'includes/functions.php';
require_once 'includes/classes/task.php';
require_once 'includes/classes/week.php';
require_once 'includes/classes/day.php';


$handle = fopen("php://stdin","r");

$week = new Week();
$defaultTask = new Task('faire le menage');


$sunday = $week->getDayByName(Day::SUNDAY);
$oldTasks = $sunday->addTask($defaultTask);
$week->setDay($sunday);



do{	
	$dayName = in("\nWeekday:", $handle);
	if($dayName == '0'){
		echo "\nGood bye" . PHP_EOL;
		$end = 1;
		continue;
	}
	$day = $week->getDayByName($dayName);
	if(empty($day)){
		echo "\nWrong Weekday!!!!!!!!!!!!!" . PHP_EOL;
		continue;
	}
	$task = ucfirst(strtolower(in("Task: ", $handle)));
	$newTask = new Task($task);
	$day->addTask($newTask);
	$week->setDay($day);
	
	print_r($week->getDays());

}while(!$end);

