#!/usr/bin/php
<?php

function check_input_format($date)
{
	$pattern = '/[A-Za-z][a-zéû]+ \d{1,2} [A-Za-z][a-zéû]+ \d{4} \d{2}:\d{2}:\d{2}$/';
	if (!preg_match($pattern, $date))
    {
		echo "Wrong Format\n";
		exit();
	}
    $format = '%A %d %B %Y %T';
	$parsed_date = strptime($date, $format);
	if (!$parsed_date)
    {
		echo "Wrong Format\n";
		exit();
	}
    parse_date($date, $parsed_date);
}

function parse_date($date, $parsed_date)
{
    $result = mktime($parsed_date['tm_hour'], $parsed_date['tm_min'], $parsed_date['tm_sec'],
    $parsed_date['tm_mon'] + 1, $parsed_date['tm_mday'], $parsed_date['tm_year'] + 1900);
    if (date("w", $result) == $parsed_date['tm_wday'])
        echo $result . "\n";
    else
        echo "Wrong Format\n";
}

if ($argc == 1)
    exit (0);
else if ($argc == 2)
{
    $array = explode(' ', $argv[1]);
    if (count($array) == 5)
    {
	    setlocale($LC_TIME, "fr_FR");
        date_default_timezone_set('Europe/Paris');
	    check_input_format($argv[1]);
    }
    else
        echo "Wrong Format\n";
}
else
    echo "Wrong Format\n";
?>
