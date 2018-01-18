<?php
mb_internal_encoding('UTF-8');
require_once 'functions.php';
require_once 'includes/classes/week.php';
require_once 'includes/classes/task.php';

function mainMenu($handle, $taskManager)
{
	out('To consult the the TaskManager type 1.');
	out('To add a task type 2.');
	$choice = intval(in('0 or nothing will leave the program', $handle));
	if($choice == 1)
	{
		print_r($taskManager);
	}
	elseif($choice == 2)
	{
		$day = getDayDetails($taskManager->getWeek(0), $handle);
		
		
		$task = getTaskDetails($taskManager, $handle);
		if($task != null)
		{
			$taskManager->addWeekTask(0, $day, $task);
		}
	}
	else
	{
		out('See you soon (space cowboy)');
		return 1;
	}
}

function getDayDetails($week, $handle)
{
	$end = 0;
	do{
		out('Please enter the day for the task.');
		$dayName = in('0 or nothing will cancel the addition of the task', $handle);
		if($week->isWeekDay($dayName))
		{
			$end = 1;
		}
		elseif(!empty($dayName))
		{
			out('Non valid day, list of days:');
			print_r($taskManager->getDaysNames());
			out('------------');
		}
		else
		{
			$dayname = null;
			$end = 1;
		}
	} while($end == 0);
	return $dayName;
}

function getTaskDetails($taskManager, $handle)
{
	$task = null;
	out('Enter the task name.');
		$taskName = in('0 or nothing will cancel the addition of the task.', $handle);
		if(!empty($taskName))
		{
			out('Enter the priority value (higher is more urgent).');
			$priority = intval(in('Non integer or nothing will count as 0', $handle));
			$task = new Task($taskName, $priority);
		}
		else
			out('entry canceled');
		return $task;
}

?>