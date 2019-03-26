#!/usr/bin/php
<?php
if ($argc == 4)
{
    $a = $argv[1];
    $b = $argv[3];
    switch ($argv[2]) {
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
?>