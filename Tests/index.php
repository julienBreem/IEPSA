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

require_once '../Includes/Classes/taskManager.php';
require_once '../Includes/functions.php';
require_once '../Includes/Classes/DAO/fileInterface.php';

//DEBUT PROGRAMME
output("Task Manager");

TaskManager::execute();