<?php
/**
 * Created by PhpStorm.
 * User: Stéphane
 * Date: 07-12-17
 * Time: 19:22
 */

/* Enoncé
 * Implémenter une classe pour la gestion de l'application.
 * */

require_once '../Includes/functions.php';
require_once '../Includes/Classes/week.php';
require_once '../Includes/Classes/DAO/fileInterface.php';

//INITIALISATION VARIABLE
$handle = fopen("php://stdin", "r");
$week = new Week();

//AFFICHAGE TITRE
output("Task Handler");

//BOUCLE INSERTION
do {
	$day = null;
	do {
		$day = $week->getDayByName(input("Veuillez introduire un jour de la semaine (Lundi, Mardi, ...) : ", $handle));
	} while(!$day);
	$taskName = input("Veuillez introduire une tache pour ce jour là : ", $handle);
	$taskPriority = input("Veuillez définir la priorité de la tâche: ", $handle);
	$day->addTask($taskName,$taskPriority);
} while(input("Voulez-vous continuer à encoder ? (Non pour arrêter) \n Réponse : ", $handle) != "Non");

//AFFICHAGE RESUME
output("");
output("Résumé des tâches");
output($week->recapWeek());

//Print In File
printInFile($week);