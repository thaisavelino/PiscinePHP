#!/usr/bin/php
<?php
    if ($argc == 2) 
    {
        $array = explode(' ', $argv[1]);
        $res = implode(" ", $array);    
        echo "$res\n";
    }
?>