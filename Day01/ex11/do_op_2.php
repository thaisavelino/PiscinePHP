#!/usr/bin/php
<?php
//check Parameters
if ($argc == 2) {
    // trim spaces from the str
    $str = trim($argv[1]);
    // check Syntax
    ft_parse_do_op($str);
   /* if ($check_op > 1) {
        echo "Syntax Error\n";
    }*/
  /*  // do the operation
    switch ($o) {
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
    print("\n");*/
} else {
    echo "Incorrect Parameters\n";
    exit(1);
}
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
    if (count($num) == 2)
	{
        ft_check_num($num);
    } else {
		echo "Syntax Error\n";
		exit(1);
	}
}
function ft_check_num($num){
    $a = trim($num[0]);
    $b = trim($num[1]);
    if (is_numeric($a) && is_numeric($b)) {
        echo "lets go\n";
    } else {
		echo "Syntax Error\n";
		exit(1);
    } 
}
