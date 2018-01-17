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

echo PHP_EOL;
out("Welcome in your taskManager:");
out("----------------------------");
echo PHP_EOL;

do {

    do {
        $day = in("Enter the day of the week:", $handle);
        $validDay = $week->getDayByName($day);
        if ($validDay == null) out("Incorrect name, please retry.");
    } while ($validDay == null);

    do {
        $taskName = in("Enter the name of the task:", $handle);
        $task = new Task($taskName);
        $taskPriority = in("Enter the priority of the task:", $handle);
        $task->setPriority($taskPriority);
        $validDay->addTask($task);
        $continue = in("Other task (Y/N):", $handle);
    } while (strtolower($continue) == 'y');

    $week->setDay($validDay);

    $continue = in("Other day (Y/N):", $handle);
} while (strtolower($continue) == 'y');

echo PHP_EOL;
out("----------");
echo PHP_EOL;

// Affichage via fonction
/*
foreach ($week->getDays() as $dayValue) {

    if ($dayValue->getTasks() != null) {
        displayDay($dayValue);
        foreach ($dayValue->getTasks() as $taskNumber => $taskValue) {
            displayTask($taskNumber, $taskValue);
        }
        echo PHP_EOL;
    }

}
*/

// Affichage via methode
foreach ($week->getDays() as $dayValue) {

    if ($dayValue->getTasks() != null) {
        $dayValue->displayDay();
        foreach ($dayValue->getTasks() as $taskNumber => $taskValue) {
            $taskValue->displayTask($taskNumber);
        }
        echo PHP_EOL;
    }

}

out("----------");
echo PHP_EOL;
out("Goodbye");