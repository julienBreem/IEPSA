<?php
require_once 'includes/classes/task.php';
require_once 'includes/classes/week.php';
require_once 'includes/classes/day.php';

class TaskManager
{
	//pour le moment considérons que le taskmanager est uniquement composé de semaine
	private $weeks;
	
	public function __construct()
	{
		$this->weeks = [];
		$this->initialize();
	}
	
	//initialisation du taskmanager : création de la semaine avec actuellement la task par défaut
	private function initialize()
	{
		$this->weeks[] = new Week();
		$defaultTask = new Task('faire le menage');
		$this->addWeekTask(0, Day::SUNDAY, $defaultTask);
	}
	
	/* La méthode devra évoluer en même temps que la définition du TaskManager pour prendre en compte
	les ajouts futurs tels que potentiellement mois, date etc*/
	public function addWeekTask($weekIndex, $day, Task $task)
	{
		$week = $this->weeks[$weekIndex];
		$week->getDayByName($day)->addTask($task);
	}
	
	public function getWeek($index)
	{
		return $this->weeks[$index];
	}
}
?>