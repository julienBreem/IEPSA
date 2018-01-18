<?php

require_once 'includes/classes/taskManager.php';
require_once 'includes/userInterface.php';


$handle = fopen("php://stdin","r");

$taskManager = new TaskManager();


$end = 0;
do{	
	$end = mainMenu($handle, $taskManager);
	
}while($end == 0);
