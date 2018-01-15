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
$defaultTask->setPriority(0);
$week->setDay($sunday);
$end = 0;
do{
    $dayName = in("\nWeekday:", $handle);
    if($dayName == '0'){
        echo "\nAffichage" . PHP_EOL;
        $end = 1;
        continue;
    }
    $day = $week->getDayByName($dayName);
    if(empty($day)){
        echo "\nWrong Weekday!!!!!!!!!!!!!" . PHP_EOL;
        continue;
    }
    $newTask = new Task(in("Task: ", $handle));
    $day->addTask($newTask);
    $priority = in("Priority: ", $handle);
    $newTask->setPriority($priority);
    $week->setDay($day);

}while(!$end);
//print_r($week->getDays());
for($i=0;$i < 7;$i++)
{
    echo ( $week->getDays()[$i]->getName()). PHP_EOL;
    for( $x=0;$x < count($week->getDays()[$i]->getTasks());$x++)
    {
        echo  ("\t\t".$week->getDays()[$i]->getTask($x)->getName());
          echo("\t\t --> priority : ".$week->getDays()[$i]->getTask($x)->getPriority()). PHP_EOL;
    }

}