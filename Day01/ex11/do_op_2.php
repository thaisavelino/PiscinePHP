#!/usr/bin/php
<?php
//check Parameters
if ($argc == 2) {
    $str = trim($argv[1]);
    ft_parse_do_op($str);
} else {
    echo "Incorrect Parameters\n";
    exit(1);
}
//parsing
function ft_parse_do_op($str){
   // check operator and spread numbers
    if (strpos($str, "+")) {
        $op = "+";
        $num = explode("+", $str);
    } else if (strpos($str, "-")) {
        $op = "-";
        $num = explode("-", $str);
    } else if (strpos($str, "*")) {
        $op = "*";
		$num = explode("*", $str);
    } else if (strpos($str, "/")) {
        $op = "/";
		$num = explode("/", $str);
    } else if (strpos($str, "%")) {
        $op = "%";
		$num = explode("%", $str);
    } else	{
		echo "Syntax Error\n";
		exit(1);
    }
    if ((count($num) != 2)) {
        echo "Syntax Error\n";
    } else {
        $a = trim($num[0]);
        $b = trim($num[1]);
        if (is_numeric($a) && is_numeric($b)) {
            do_op($a, $b, $op);
        } else {
            echo "Syntax Error\n";
            exit(1);
        }
    }
}
// operation 
function do_op($a, $b, $op){
    switch ($op) {
        case '+':
            print($a+$b);
            break ;
        case '-':
            print($a-$b);
            break ;
        case '*':
            print($a*$b);
            break ;
        case '/':
            print($a/$b);
            break ;
        case '%':
            print($a%$b);
            break ;
    }
    print("\n");
}