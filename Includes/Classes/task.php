<?php
/**
 * Created by PhpStorm.
 * User: Stéphane
 * Date: 07-12-17
 * Time: 21:10
 */

//require_once '../functions.php';

class Task {
	protected $taskName;
	protected $taskPriority;

	public function getTaskPriority() {
		return $this->taskPriority;
	}

	public function setTaskPriority($priority): void {
		$this->taskPriority = lowerWithFirstLetterUpper($priority);
	}

	public function getTaskName(): string {
		return $this->taskName;
	}

	public function setTaskName($taskName): void {
		$this->taskName = lowerWithFirstLetterUpper($taskName);
	}

	public function recapTask():string {
		return $this->getTaskName()." (".$this->getTaskPriority().")";
	}

	public function equals(Task $task) {
		return $this->taskName == $task->getTaskName()
			&& $this->taskPriority == $task->getTaskPriority();
	}

	public function __construct($name, $priority) {
		$this->setTaskName($name);
		$this->setTaskPriority($priority);
	}
}