#!/usr/bin/php
<?PHP
$tab = file_get_contents("php://stdin");
$tab = explode("\n", $tab);
$i = 0;
foreach ($tab as $elem)
{
	$tab2 = explode(";", $elem);
	$tab[$i] = $tab2;
	$i++;
}
//print_r($tab[0]);
if ($argc == 2)
{
	if ($argv[1] == "moyenne")
	{
		$i = 0;
		$sum = 0;
		foreach ($tab as $elem)
		{
			if (is_numeric($elem[1]) && $elem[2] != "moulinette")
			{
				$sum = $sum + $elem[1];
				$i++;
			}
		}
		$moyenne = $sum / $i;
		echo $moyenne."\n";
	}
	else if($argv[1] == "moyenne_user")
	{
		$tab = array_slice($tab, 1);
		sort($tab);
		$tab = array_slice($tab, 1);
		$i = 0;
		$count_user = 0;
		foreach ($tab as $elem)
		{
			$j = 0;
			if (is_string($tab[$i + 1][0]) && $tab[$i + 1][0] != $elem[0])
				$count_user++;
			$i++;
		}
		$tab2 = $tab;
		$i = 0;
		$users = array();
		while ($i <= $count_user)
		{
			$j = 0;
			while ($tab2[$j][0] == $tab2[$j + 1][0] && is_string($tab2[$j][0]))
			{
				$j++;
			}
			$users[$i] = array_slice($tab2, 0, $j + 1);
			$k = 0;
			$sum = 0;
			$name = "";
			foreach ($users[$i] as $v)
			{
				if(is_numeric($v[1]) && $v[2] != "moulinette")
				{
					$sum = $sum + $v[1];
					$k++;
				}
				$name = $v[0];
			}
			$moyenne = $sum / $k;
			echo $name.":".$moyenne."\n";
			$tab2 = array_slice($tab2, $j + 1);
			$i++;
		}
	}
	else if($argv[1] == "ecart_moulinette")
	{
		$tab = array_slice($tab, 1);
		sort($tab);
		$tab = array_slice($tab, 1);
		$i = 0;
		$count_user = 0;
		foreach ($tab as $elem)
		{
			$j = 0;
			if (is_string($tab[$i + 1][0]) && $tab[$i + 1][0] != $elem[0])
				$count_user++;
			$i++;
		}
		$tab2 = $tab;
		$i = 0;
		$users = array();
		while ($i <= $count_user)
		{
			$j = 0;
			while ($tab2[$j][0] == $tab2[$j + 1][0] && is_string($tab2[$j][0]))
			{
				$j++;
			}
			$users[$i] = array_slice($tab2, 0, $j + 1);
			$k = 0;
			$k_mouli = 0;
			$sum = 0;
			$sum_mouli = 0;
			$name = "";
			foreach ($users[$i] as $v)
			{
				if(is_numeric($v[1]) && $v[2] != "moulinette")
				{
					$sum = $sum + $v[1];
					$k++;
				}
				if(is_numeric($v[1]) && $v[2] == "moulinette")
				{
					$sum_mouli = $sum_mouli + $v[1];
					$k_mouli++;
				}
				$name = $v[0];
			}
			$moyenne_humain = $sum / $k;
			$moyenne_mouli = $sum_mouli /$k_mouli;
			$ecart = $moyenne_humain - $moyenne_mouli;
			echo $name.":".$ecart."\n";
			$tab2 = array_slice($tab2, $j + 1);
			$i++;
		}
	}
}
?>