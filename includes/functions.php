<?php
function out(string $outString){
	echo $outString . PHP_EOL;
}

function in(string $inString, $handle) {
	out($inString);
	return trim(fgets($handle));
}

function addTaskToDayOfWeek($week, $dayName, $task){
	$day = $week->getDayByName($dayName);
	$day->addTask($defaultTask);
	$week->setDay($day);
}

function displayDay($day, $numberOfTasks) {
    echo "On " . $day . " " . $numberOfTasks . " task(s) found:" . PHP_EOL;
}

function displayTask($number, $name, $priority) {
    echo "\t" . ($number+1) . ") Name: " . $name . PHP_EOL;
    echo "\t   Priority: " . $priority . PHP_EOL;
}