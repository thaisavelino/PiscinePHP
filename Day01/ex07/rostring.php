#!/usr/bin/php
<?php
    $str = $argv[1];
    $tab = explode(" ", $str);
    $word = array();
	foreach ($tab as $elem)
	{
		if (!empty($elem))
			$word[] = $elem;
    }
    for ($i = 1; $i < count($word); $i++) {
        echo "$word[$i]\n";
    }
    echo "$word[0]\n";
?>