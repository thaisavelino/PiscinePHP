#!/usr/bin/php
<?php
	if ($argc >= 3) {
        $key = $argv[1];
		for ($i = 2; $i < $argc; $i++) {
            //spread key and value from : 
            $dots = strpos($argv[$i], ":");
			if ($dots) {
				$key2 = substr($argv[$i], 0, $dots);
				$value = substr($argv[$i], $dots+1);
				$str[$key2] = $value;
			}
        }
		#search key at str and print it
		if ($str[$key]) {
			echo "$str[$key]\n";
		} else if ($str[$key] == "0") {
			echo "0\n";
		}
	}
?>