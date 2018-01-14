<?php
/**
 * Created by PhpStorm.
 * User: Stephane
 * Date: 12-01-18
 * Time: 00:10
 */

require_once 'week.php';

class TaskManager {
	private static $handle;
	private static $exitStatus;
	private static $week;

	private static function printMenu(): void {
		blankLine();
		output("<===> MENU <===>");
		output("Voici les options disponible :");
		output("\t1. Ajouter une tache");
		output("\t2. Afficher le calendrier de la semaine");
		output("\t3. Imprimer le calendrier de la semaine dans un fichier");
		blankLine();
		output("\t0. Partir");
	}

	private static function askForMenuChoice(): int {
		$returnValue = null;
		do {
			$returnValue = intval(input("Veuillez introduire votre choix: ", TaskManager::$handle));
			$correctValue = is_int($returnValue) && $returnValue>=0 && $returnValue<=3;
		} while(!$correctValue);
		blankLine();
		return $returnValue;
	}

	private static function handleChoice(int $choice): void {
		switch ($choice) {
			case 1: $day = TaskManager::askForDay();
				TaskManager::addTaskToDay($day);
				break;
			case 2: TaskManager::printOnScreen();
				break;
			case 3: TaskManager::printInFile();
				break;
			case 0: TaskManager::$exitStatus = true;
				break;
		}
	}

	private static function addTaskToDay(Day $day): void {
		$taskName = input("Veuillez introduire une tache pour ce jour là : ", TaskManager::$handle);
		$taskPriority = input("Veuillez définir la priorité de la tâche: ", TaskManager::$handle);
		$day->addTask($taskName,$taskPriority);
	}

	private static function askForDay(): Day {
		if(is_a(TaskManager::$week, "Week")) {
			$day = null;
			do {
				$day = TaskManager::$week->getDayByName(input("Veuillez introduire un jour de la semaine (Lundi, Mardi, ...) : ", TaskManager::$handle));
			} while(!$day);
			return $day;
		}
		return null;
	}

	private static function printOnScreen(): void {
		if(is_a(TaskManager::$week, "Week")) {
			output(TaskManager::$week->recapWeek());
		}
	}

	private static function printInFile(): void {
		if(printInFile(TaskManager::$week)) {
			output("Ecriture dans un fichier reussie.");
		} else {
			output("Echec de l'ecriture.");
		}
	}

	public static function execute(): void {
		TaskManager::$handle = fopen("php://stdin", "r");
		TaskManager::$exitStatus = false;
		TaskManager::$week = new Week();
		do {
			TaskManager::printMenu();
			TaskManager::handleChoice(TaskManager::askForMenuChoice());
		} while(!TaskManager::$exitStatus);

	}
}