<?php
/**
 * Created by PhpStorm.
 * User: Stéphane
 * Date: 07-12-17
 * Time: 20:55
 */

function output(string $str): void {
	echo $str.PHP_EOL;
}

function lowerWithFirstLetterUpper(string $str): string {
	return ucfirst(strtolower($str));
}

function input(string $str, $handle): string {
	echo $str;
	if (is_resource($handle))
		return trim(fgets($handle));
	return null;
}

function printInFile(Week $week): bool {
	$fileManager = new FileInterface();
	$fileManager->setResource("C:\\WeekSaveFile.txt");
	$fileManager->openInWriteMode();
	$returnValue = $fileManager->insertData($week->recapWeek()) != false ?  true : false;
	return $returnValue;
}