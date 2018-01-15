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
    } while ($continue == 'Y' or $continue == 'y');

    $week->setDay($validDay);

    $continue = in("Other day (Y/N):", $handle);
} while ($continue == 'Y' or $continue == 'y');

echo PHP_EOL;
out("----------");
echo PHP_EOL;

$dayList = $week->getDays();
foreach ($dayList as $dayValue) {
    $taskList = $dayValue->getTasks();

    if ($taskList != null) {
        out("On " . $dayValue->getName() . " " . count($taskList) . " task(s) found:");
        $taskNumber = 0;
        foreach ($taskList as $taskValue) {
            $taskNumber++;
            out("\t" . $taskNumber . ") Name: " . $taskValue->getName());
            out("\t   Priority: " . $taskValue->getPriority());
        }
        echo PHP_EOL;
    }

}

//var_dump($week);

out("----------");
echo PHP_EOL;
out("Goodbye");