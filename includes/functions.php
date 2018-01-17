<?php
function out(string $outString)
{
	echo $outString . PHP_EOL . PHP_EOL;
}

function blankLine(): void
{
    echo PHP_EOL;
}

function in(string $inString, $handle)
{
	out($inString);
	return trim(fgets($handle));
}

function lowerWithFirstLetterUpper(string $str): string
{
    return ucfirst(strtolower($str));
}

