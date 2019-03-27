#!/usr/bin/php
<?php
	if ($argc >= 3) {
        $key = $argv[1];
		for ($i = 2; $i < $argc; $i++) {
            //spread key and value from : 
            $dots = strpos($argv[$i], ":");
			if ($dots) {
				$key2 = substr($argv[$i], 0, $dots);
				echo "|$argv[$i]|\n key2: $key2\n";
				$value = substr($argv[$i], $dots+1);
				echo "value $value\n";
				$str[$key2] = $value;
				echo "str[key2] = $str[$key2] \n";
			}
        }
        #search key at str and print it
		if ($str[$key]) {
			echo "str0 - $str[0]\n answer ";
			echo "$str[$key]\n";
		}
	}
?>