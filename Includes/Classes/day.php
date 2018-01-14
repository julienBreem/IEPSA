<?php
/**
 * Created by PhpStorm.
 * User: Stéphane
 * Date: 07-12-17
 * Time: 22:25
 */

require_once 'task.php';

class Day {
	const MONDAY = "Lundi";
	const TUESDAY = "Mardi";
	const WEDNESDAY = "Mercredi";
	const THURSDAY = "Jeudi";
	const FRIDAY = "Vendredi";
	const SATURDAY = "Samedi";
	const SUNDAY = "Dimanche";

	protected $dayName;
	protected $tasksOfDay;

	public function getDayName(): string {
		return $this->dayName;
	}

	public function setDayName($dayName): void {
		switch (lowerWithFirstLetterUpper($dayName)) {
			case self::MONDAY:
			case self::TUESDAY:
			case self::WEDNESDAY:
			case self::THURSDAY:
			case self::FRIDAY:
			case self::SATURDAY:
			case self::SUNDAY:
				$this->dayName = $dayName;
				break;
			default:
				break;
		}
	}

	public function addTask(string $taskName, $taskPriority): void {
		$this->tasksOfDay[] = new Task($taskName, $taskPriority);
	}

	public function getNumberOfTask(): int {
		return count($this->tasksOfDay);
	}

	public function recapDay(): string {
		if(count($this->tasksOfDay)>0) {
			$recap = $this->dayName . ":" . PHP_EOL;
			foreach ($this->tasksOfDay as $task) {
				if ($task instanceof Task) {
					$recap .= "\t" . $task->recapTask() . PHP_EOL;
				}
			}
			return $recap;
		}
		else {
			return "";
		}
	}

	public function getTask($index) {
		if ($index < $this->getNumberOfTask()) {
			return $this->tasksOfDay[$index];
		}
		return null;
	}

	public function equals(Day $day) {
		$sameTask = true;
		if ($this->getNumberOfTask() == $day->getNumberOfTask()) {
			for ($i=0; $i<$this->getNumberOfTask() && $sameTask; ++$i) {
				if (!$this->tasksOfDay[$i]->equals($day->getTask($i))) {
					$sameTask = false;
				}
			}
		}
		return $this->dayName == $day->getDayName() && $sameTask;
	}

	public function __construct(string $name) {
		$this->setDayName($name);
		$this->tasksOfDay = array();
	}
}