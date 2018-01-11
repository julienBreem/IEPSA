<?php
/**
 * Created by PhpStorm.
 * User: Stéphane
 * Date: 07-12-17
 * Time: 19:22
 */

/* Enoncé
 * Implémenter la logique vue au cours pour le reste du script
 * Conserver les tâches dans un fichiers.
 * */

require_once '../Includes/functions.php';
require_once '../Includes/Classes/week.php';
require_once '../Includes/Classes/DAO/fileInterface.php';

//INITIALISATION VARIABLE
$handle = fopen("php://stdin", "r");
$week = Week::getWeek();

//AFFICHAGE TITRE
output("Task Handler");

//BOUCLE INSERTION
do {
	do {
		$day = input("Veuillez introduire un jour de la semaine (Lundi, Mardi, ...) : ", $handle);
	} while(!$week->getDayByName($day));
	$taskName = input("Veuillez introduire une tache pour ce jour là : ", $handle);
	$taskPriority = input("Veuillez définir la priorité de la tâche: ", $handle);
	$week->getDayByName($day)->addTask($taskName,$taskPriority);
} while(input("Voulez-vous continuer à encoder ? (Non pour arrêter) \n Réponse : ", $handle) != "Non");

//AFFICHAGE RESUME
output("");
output("Résumé des tâches");
output($week->recapWeek());

//Print In File
printInFile($week);