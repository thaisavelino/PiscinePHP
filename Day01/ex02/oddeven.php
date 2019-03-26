#!/usr/bin/php
<?php
    $stdin = fopen('php://stdin', 'r');
    while ($stdin && !feof($stdin)) {
        echo "Enter a number: ";
        $num = fgets($stdin);
        if ($num)
        {
            $num = str_replace("\n", "", $num);
            if (is_numeric($num)) {
                $number = str_replace("\n", "", $num);
                echo "The number $num is ", ($num % 2 == 0 ? "even" : "odd"), "\n";
            } else {
                echo "'".$num."' is not a number\n";
            }
        }
    }
?>