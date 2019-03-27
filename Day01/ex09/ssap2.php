#!/usr/bin/php
<?PHP
function fast_split($string)
{
	$split = explode(" ", $string);
	$ret = array_filter($split);
	return ($ret);
}
function get_ascii($char)
{
	$ascii = ord($char);
	if ($ascii == 0)
		return $ascii;
	if (($ascii < 48) || ($ascii >= 58 && $ascii <= 64) || ($ascii >= 91 && $ascii <= 96) || ($ascii >= 123))
		$ascii += 355;
	else if (is_numeric($char))
		$ascii += 100;
	else if (ctype_upper($char))
		$ascii += 32;
	return $ascii;
}
function ord_compare($str1, $str2)
{
	if ($str1 == $str2)
		return 0;
	$s1 = str_split($str1, 1);
	$s2 = str_split($str2, 1);
	$len1 = strlen($str1);
	$len2 = strlen($str2);
	$i = 0;
	while ($i < $len1 && $i < $len2)
	{
		$ascii_s1 = get_ascii($s1[$i]);
		$ascii_s2 = get_ascii($s2[$i]);
		if ($ascii_s1 != $ascii_s2)
			return ($ascii_s1 < $ascii_s2) ? -1 : 1;
		$i += 1;
	}
	if ($i == $len1 && $i == $len2)
		return (0);
	if ($i == $s1)
		return (-1);
	return (1);
}
if ($argc >= 2)
{
	unset($argv[0]);
	$final = array();
	foreach ($argv as $elem)
	{
		$tmp = fast_split($elem);
		$final = array_merge($final, $tmp);
	}
	usort($final, "ord_compare");
	foreach ($final as $elem)
	{
		echo $elem."\n";
	}
}
?>