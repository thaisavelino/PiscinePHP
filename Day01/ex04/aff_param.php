#!/usr/bin/php
<?php 
    unset($argv[0]);
    $arr = [];
    foreach($argv as $value) {
        array_push($arr, trim($value));
    }
    array_filter($arr);
    foreach ($arr as $k=>$v) {
        if(!empty($v))
            print("$v\n");
   }
?>