<?php
function out(string $outString){
	echo $outString .PHP_EOL;
}

function in(string $inString, $handle) {
	out($inString);
	return trim(fgets($handle));
}

function addTaskToDayOfWeek($week, $dayName, $taskName,$priority){
	$newTask = new Task($taskName);
	$newTask->setPriority($priority);
	$day = $week->getDayByName($dayName);
	$day->addTask($newTask);
	$week->setDay($day);
}