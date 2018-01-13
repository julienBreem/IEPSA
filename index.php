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


$end = 0;
do{	
	$dayName = in("\nWeekday (0 -> recap):", $handle);
	if($dayName == '0'){
		$end = 1;
		continue;
	}
	$day = $week->getDayByName($dayName);
	if(empty($day)){
		out("Wrong Weekday!!!!!!!!!!!!!");
		continue;
	}
	$newTask = new Task(in("Task: ", $handle));
	$day->addTask($newTask);
	$week->setDay($day);
    out("");
	affichage($week->getDayByName($dayName));
}while(!$end);
out("");
foreach ($week->getDays() as $day){
    affichage($day);
}
