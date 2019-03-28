<?php
/* lets see how cookies works.. so if we put in hour browser

create your php file called cookie_crisp.php:
    <?php
    print_r($_GET);
    ?>
now lets see what we take from GET function
But this in your browser and refresh:
http://localhost:8100/ex03/cookie_crisp.php?action=set&name=plat&value=choucroute

you will see:
Array ( [action] => set [name] => plat [value] => choucroute )

Perfect! Now lets see how to set a cookie:
    
    [documentation]    https://www.php.net/manual/en/function.setcookie.php
    The function works like this:
    setcookie ( string $name [, string $value = "" [, int $expires = 0 [, string $path = "" [, string $domain = "" [, bool $secure = FALSE [, bool $httponly = FALSE ]]]]]] ) : bool

So lets create something following this, we must give a name of the cookie a value (both strings) and
what time it expires. Note that it counts a the number of seconds past since "January 1, 1970", so we must use the function time() to take the time now
and we can set the time to expire for X seconds after now, 
    for example: time()+1200
    [check more](https://www.php.net/time)

    your php now is:
    <?php
    setcookie("baba", "value", time()+1200);
    //print to check the cookie
    print_r($_COOKIE)
    ?>
*/
    setcookie("baba", "value", time()+1200);
    print_r($_COOKIE)
//setcookie("baba", NULL, 0);
//foreach ($_GET as $key => $value)
    //echo "$login: $value\n";

    //curl -c cook.txt 'http://eXrXpX.42.fr:8xxx/ex03/cookie_crisp.php?action=set&name=plat&value=choucroute'
?>