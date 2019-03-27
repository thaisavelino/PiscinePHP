#!/usr/bin/php
<?PHP
function ft_split($str)
{
	$tab = explode(" ", $str);
	sort($tab);
	$str = array();
	foreach ($tab as $elem)
	{
		if (!empty($elem))
			$str[] = $elem;
	}
	unset($tab);
	return ($str);
}
$i = 0;
$stack = array();
foreach($argv as $str2)
{
	if ($i != 0)
		$stack = array_merge($stack, ft_split($str2));
	$i++;
}
sort($stack);
foreach($stack as $elem)
{
	print("$elem\n");
}
?>