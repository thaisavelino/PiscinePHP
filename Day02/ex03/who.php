#!/usr/bin/php
<?php
date_default_timezone_set('Europe/paris');
$answer = array();
$usr = get_current_user();
echo "user $user\n";
$file = file_get_contents("/var/run/utmpx");
//echo "file $file\n";
$sub = substr($file, 1256);
//echo "peace of the file $sub its binary so we need to unpack";
$typedef = 'a256user/a4id/a32line/ipid/itype/I2time/a256host/i16pad';
// while sub is not NULL so we got content yet
while ($sub != NULL)
{
	$array = unpack($typedef, $sub); // format
	//echo "peace of the file after unpack in the typedef format";
	//print_r ($array);
	if (strcmp(trim($array[user]), $usr) == 0 && $array[type] == 7)
	{
		$date = date(" M j H:i ", $array["time1"]); // format spaces for hour ex:" Mar 28 13:02 "
		$term = trim($array[line])." "; //put space after terminal
		$user = trim($array[user])." "; // print space after user
		$answer = array_merge($answer, array($user.$term.$date)); // put all of them together to show
	}
	$sub = substr($sub, 628);;
}
sort($answer);
// print them all
foreach ($answer as $elem)
	print("$elem\n");
?>