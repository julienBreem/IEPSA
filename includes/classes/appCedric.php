<?php

/**
 * Created by PhpStorm.
 * User: Cedric
 * Date: 16-01-18
 * Time: 10:30
 */
 
require_once 'week.php';

class appCedric 
{
	private static $handle;
	private static $exitStatus;
	private static $week;

	private static function printMenu() : void
	{
		blankLine();
		out("**** MENU ****");
		
		out("Choix possibles :");
		out("\t1. Ajout d une tache");
		out("\t2. Lister le calendrier de la semaine");
		blankLine();
		out("\t0. Quitter l application");
	}
	
	private static function askForMenuChoice() : int
	{
		$returnValue = null;
		do 
		{
			$returnValue = intval(in("Veuillez introduire votre choix, via un chiffre : ", appCedric::$handle));
			$maskValue = is_int($returnValue) && $returnValue>=0 && $returnValue<=2;
		} while (!$maskValue);
		blankLine();
		return $returnValue;
	}
	
	private static function handleChoice(int $choice) : void
	{
		switch ($choice) 
		{
			case 1: $day = appCedric::askForDay();
				appCedric::addTaskToDay($day);
				break;
			case 2: appCedric::ViewOnScreen();
                sleep(110);
                //system('cls');
                    appcedric::askForMenuChoice();
				break;
			case 0: appCedric::$exitStatus = true;
				break;
		}
	}
	
	private static function addTaskToDay(Day $day) //: void
	{
		$taskName = in("Veuillez introduire une tache pour ce jour là : ", appCedric::$handle);
		$taskPriority = in("Veuillez définir la priorité de la tâche: ", appCedric::$handle);
		$day->addTaskced($taskName, $taskPriority);
	}
	
	private static function askForDay() : Day
	{
		if(is_a(appCedric::$week, "Week")) 
		{
			$day = null;
			do 
			{
				$day = appCedric::$week->getDayByName(in("Veuillez introduire un jour de la semaine (Lundi, Mardi, ...) : ", appCedric::$handle)) ;
			} while(!$day);
			return $day;
		}
		return null;
	}
	
	private static function ViewOnScreen() : void
	{
		if(is_a(appCedric::$week, "Week")) 
		{
            // below command execute to clear the console windows
            system('cls');
            out(appCedric::$week->recapWeek());
		}
	}
		
	public static function execute() //: void
	{
		appCedric::$handle = fopen("php://stdin", "r");
		appCedric::$exitStatus = false;
		appCedric::$week = new Week();
		do 
		{
			appCedric::printMenu();
			appCedric::handleChoice(appCedric::askForMenuChoice());
		} while(!appCedric::$exitStatus);
	}
	
}