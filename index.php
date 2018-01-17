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

foreach ($week->getDays() as  $value)
{
    echo $value->getName(). PHP_EOL;
   foreach ($value->getTasks() as  $values)
    {
       if($values->getName() != null){
        echo  ("\t\t".$values->getName());
        echo("\t\t --> priority : ".$values->getPriority()). PHP_EOL;
        }
    }

}