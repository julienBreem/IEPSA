<?php

require_once 'task.php';

class Day
{
	const MONDAY = 'monday';
	const TUESDAY = 'tuesday';
	const WEDNESDAY = 'wednesday';
	const THURSDAY = 'thursday';
	const FRIDAY = 'friday';
	const SATURDAY = 'saturday';
	const SUNDAY = 'sunday';	
	
	/*private $name;
	private $tasks;*/
    protected $dayName;
    protected $tasksOfDay;
	
	public function __construct($name)
    {
		$this->setName($name);
		$this->tasks = [];
	}

    public function getDayName()//: string
    {
        return $this->dayName;
    }

    /*public function addTask(Task $task)
    {
        $this->tasks[] = $task;
    }*/

    public function addTaskced(string $taskName, $taskPriority): void
    {
        $this->tasksOfDay[] = new Task($taskName, $taskPriority);
    }

	public function setName($name)
    {
		$name = strtolower($name);
		switch($name)
        {
			case self::MONDAY:
			case self::TUESDAY:
			case self::WEDNESDAY:
			case self::THURSDAY:
			case self::FRIDAY:
			case self::SATURDAY:
			case self::SUNDAY:
				$this->name = $name;
				break;
			default:
				break;
		}
	}
	
	public function getName()
    {
		return $this->name;
	}
	
	public function setTasks($tasks)
    {
		$this->tasks =  $tasks;
	}
	
	public function getTasks()
    {
		return $this->tasks;
	}

    public function recapDay(): string
    {
        if(count($this->tasksOfDay)>0)
        {
            $recap = $this->dayName . ":" . PHP_EOL;
            foreach ($this->tasksOfDay as $task)
            {
                if ($task instanceof Task)
                {
                    $recap .= "\t" . $task->recapTask() . PHP_EOL;
                }
            }
            return $recap;
        }
        else
        {
            return "";
        }
    }
	
	
}