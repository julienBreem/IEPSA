<?php
require_once('day.php');

class Week {
	private $days;
	
	public function __construct() {
        $this->days = [];
		$this->days[Day::MONDAY] = new Day(Day::MONDAY);
		$this->days[Day::TUESDAY] = new Day(Day::TUESDAY);
		$this->days[Day::WEDNESDAY] = new Day(Day::WEDNESDAY);
		$this->days[Day::THURSDAY] = new Day(Day::THURSDAY);
		$this->days[Day::FRIDAY] = new Day(Day::FRIDAY);
		$this->days[Day::SATURDAY] = new Day(Day::SATURDAY);
		$this->days[Day::SUNDAY] = new Day(Day::SUNDAY);
    }
	
	public function getDayByName($name){
		$day = formatStr($name);
		if($this->isWeekDay($day))
		{
			return $this->days[$day];
		}
		else
			return NULL;
	}
	
	public function setDay(Day $day){
		for($i = 0; $i < count($this->days); ++$i){
			if($this->days[$i]->getName() == $day->getName()){
				$this->days[$i] = $day;
				return true;
			}
		}
		return false;
	}
	
	public function getDays(){
		return $this->days;
	}
	public function isWeekDay($day)
	{
		$day = formatStr($day);
		return in_array($day, array_keys($this->days));
	}
}