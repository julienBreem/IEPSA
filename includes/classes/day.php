<?php

class Day {
	
	const MONDAY = 'Monday';
	const TUESDAY = 'Tuesday';
	const WEDNESDAY = 'Wednesday';
	const THURSDAY = 'Thursday';
	const FRIDAY = 'Friday';
	const SATURDAY = 'Saturday';
	const SUNDAY = 'Sunday';
	
	private $name;
	private $tasks;	
	
	public function __construct($name){
		$this->setName($name);
		$this->tasks = [];
	}
	
	public function addTask(Task $task){
		$this->tasks[] = $task;
	}
	
	public function setName($name){
		$name = ucfirst(strtolower(trim($name)));
		switch($name){
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
	
	public function getName(){
		return $this->name;
	}
	
	public function setTasks($tasks){
		$this->tasks =  $tasks;
	}
	
	public function getTasks(){
		return $this->tasks;
	}
	
	
	
}