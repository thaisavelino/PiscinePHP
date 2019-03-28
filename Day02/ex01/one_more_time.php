#!/usr/bin/php
<?PHP
date_default_timezone_set('Europe/Paris');
function	check_month($month)
{	
	$n_month = 0;
	if (preg_match("/^[Jj]anvier$/", "$month") == 1)
		$n_month = 1;
	if (preg_match("/^[Ff][ée]vrier$/", "$month") == 1)
		$n_month = 2;
	if (preg_match("/^[Mm]ars$/", "$month") == 1)
		$n_month = 3;
	if (preg_match("/^[Aa]vril$/", "$month") == 1)
		$n_month = 4;
	if (preg_match("/^[Mm]ai$/", "$month") == 1)
		$n_month = 5;
	if (preg_match("/^[Jj]uin$/", "$month") == 1)
		$n_month = 6;
	if (preg_match("/^[Jj]uillet$/", "$month") == 1)
		$n_month = 7;
	if (preg_match("/^[Aa]o[ûu]t$/", "$month") == 1)
		$n_month = 8;
	if (preg_match("/^[Ss]eptembre$/", "$month") == 1)
		$n_month = 9;
	if (preg_match("/^[Oo]ctobre$/", "$month") == 1)
		$n_month = 10;
	if (preg_match("/^[Nn]ovembre$/", "$month") == 1)
		$n_month = 11;
	if (preg_match("/^[Dd][ée]cembre$/", "$month") == 1)
		$n_month = 12;
	return ($n_month);
}
function	check_hour($hour) {
	$hour = explode(":", $hour);
	if (count($hour) != 3)
		return (0);
	else
	{
		$i = 1;
		if (preg_match("/^(([01][0-9])|(2[0-3]))$/", "$hour[0]") == 0) //hour
			$i = 0;
		if (preg_match("/^[0-5][0-9]$/", "$hour[1]") == 0) // minutes
			$i = 0;
		if (preg_match("/^[0-5][0-9]$/", "$hour[2]") == 0) // seconds
			$i = 0;
		return ($i);
	}
}
// Another way of doing it
function	check_week($week) {
	//lowercase to match it
	$week = strtolower($week);
	$weekdays = [
		"lundi",
		"mardi",
		"mercredi",
		"jeudi",
		"vendredi",
		"samedi",
		"dimanche"
	];
	return (in_array($week, $weekdays));
}
// starting
if ($argc > 1) {
	//Check Format
	$date = explode(" ", $argv[1]);
	//print_r($date);
	if (count($date) != 5)
		echo "Wrong Format\n";
	else {
		//Take elements just to be readable
		$week	= $date[0];
		$day	= $date[1];
		$month	= $date[2];
		$year	= $date[3];
		$hour	= $date[4];
		// ** test.sh ** 
		echo "$week, $day, $month, $year, $hour\n";
		//check all formats
		$error = 0;
		if (check_week($week) == 0)
			$error = 1;
		if (preg_match("/^(0?[1-9]|[1-2][0-9]|3[0-1])$/", $day) == 0)
			$error = 1;
		if (check_month($month) == 0)
			$error = 1;
		if (preg_match("/^([0-9]{4})$/", $year) == 0)
			$error = 1;
		if (check_hour($hour) == 0)
			$error = 1;
	}
	if ($error == 0) {
		$timestamp = mktime(intval($hour[0]),intval($hour[1]),intval($hour[2]),intval($n_months),intval($day),intval($year));
		//$timestamp = mktime(intval($hour[0]),intval($hour[1]),intval($hour[2]),intval($n_month),intval($day),intval($year);
		echo($timestamp);
	} else {
		echo "Wrong Format\n";
	} 
}
?>