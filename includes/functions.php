<?php
function out(string $outString){
	echo $outString . PHP_EOL;
}

function in(string $inString, $handle) {
	out($inString);
	return trim(fgets($handle));
}

function addTaskToDayOfWeek($week, $dayName, $defaultTask){
	$day = $week->getDayByName($dayName);
	$day->addTask($defaultTask);
	$week->setDay($day);
}
//Affichage du dernier jour encoder
function affichage($day){
    $count = 0;
    out($day->getName());
    foreach ($day->getTasks() as $task){
        echo "\t";
        print(++$count);
        print(".");
        out($task->getName());
    }
}

