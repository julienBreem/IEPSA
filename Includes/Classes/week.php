<?php
/**
 * Created by PhpStorm.
 * User: Stéphane
 * Date: 07-12-17
 * Time: 22:55
 */

require_once 'day.php';

class Week {
	protected $days;
	private static $week = null;

	private function __construct() {
		$this->days = array(
			new Day(Day::MONDAY),
			new Day(Day::TUESDAY),
			new Day(Day::WEDNESDAY),
			new Day(Day::THURSDAY),
			new Day(Day::FRIDAY),
			new Day(Day::SATURDAY),
			new Day(Day::SUNDAY)
		);
	}

	public static function getWeek(): Week {
		if (self::$week == null) {
			self::$week = new Week();
		}
		return self::$week;
	}

	public function getDayByName(string $dayName): Day {
		$tempDay = new Day($dayName);
		foreach ($this->days as $day) {
			if ($day instanceof Day && $day->getDayName()==$tempDay->getDayName()) {
				unset($tempDay);
				return $day;
			}
		}
		return null;
	}

	public function setDay($newDay) {
		$tempDay = new Day($newDay);
		for ($i=0; $i<7;++$i) {
			if ($this->days[$i] instanceof Day && $this->days[$i]->getDayName()==$tempDay->getDayName()) {
				unset($tempDay);
				$this->days[$i] = $newDay;
				return true;
			}
		}
		return false;
	}

	public function recapWeek(): string {
		$recap = "";
		foreach ($this->days as $day) {
			if ($day instanceof Day) {
				$recap .= $day->recapDay();
			}
		}
		return $recap;
	}
}