<?php
require_once 'includes/functions.php';
/*
require_once 'includes/classes/task.php';
require_once 'includes/classes/week.php';
require_once 'includes/classes/day.php';
$handle = fopen("php://stdin","r");

$week = new Week();
$defaultTask = new Task('faire le menage');


$sunday = $week->getDayByName(Day::SUNDAY);
$oldTasks = $sunday->addTask($defaultTask);
$week->setDay($sunday);

*/

require_once 'includes/Classes/appCedric.php';
//do  {

out("Planificateur de taches Cédric");
appCedric::execute();

