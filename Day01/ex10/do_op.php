#!/usr/bin/php
<?php
//clean spaces
if ($argc == 4) {
    $a = trim($argv[1]);
    $o = trim($argv[2]);
    $b = trim($argv[3]);
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
    print("\n");
} else {
    echo "Incorrect Parameters\n";
    exit(1);
}
?>