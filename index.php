<?php
require_once 'includes/functions.php';
require_once 'includes/classes/task.php';
require_once 'includes/classes/week.php';
require_once 'includes/classes/day.php';


$handle = fopen("php://stdin","r");
echo "Welcome in your taskManager: ";
$week = new Week();
$jour = new Day("saturday");
$defaultTask = new Task('faire le ménage');
$week->setDay($jour);
$jour->addTask($defaultTask);

do{

    $day = in("Plz enter the day of the week:", $handle);
    $jour1 =  $week->getDayByName($day);
    $week->setDay($jour1);
    $name=in('Plz enter the task name', $handle);
    $task = new Task ($name);
    $jour1->addTask($task);
    $test=in('Plz enter --a-- for stop or --other-- for continue', $handle);
} while($test == "a");

for( $i=0; $i<count($week->getDays());$i++) {

    //$name=  $week->getDays()[$i]->getTasks()[0]->getName();

    print_r( $week->getDays()[$i]);
}
out("a bientot");
//echo $week->getDays()[1]->getTasks()[0]->getName();