<?php

class Task {
	private $name;
	private $priority;
	
	public function __construct($name){
		$this->setName($name);
	}
	
	public function setPriority($priority){
		$this->priority = $priority;
	}
	
	public function getPriority() {
		return $this->priority;
	}
	
	public function setName($name){
		$this->name =  ucfirst(strtolower(trim($name)));
	}
	
	public function getName(){
		return $this->name;
	}

    public function displayTask($taskNumber) {
        echo "\t" . ($taskNumber+1) . ") Name: " . $this->getName() . PHP_EOL;
        echo "\t   Priority: " . $this->getPriority() . PHP_EOL;
    }

}