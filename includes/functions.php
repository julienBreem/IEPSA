<?php
function out( $outString){
	echo $outString . PHP_EOL . PHP_EOL;
}

function in($inString, $handle) {
	out($inString);
	return trim(fgets($handle));
}

function addTaskToDayOfWeek($week, $dayName, $task){
	$day = $week->getDayByName($dayName);
	$day->addTask($task);
	$week->setDay($day);
}