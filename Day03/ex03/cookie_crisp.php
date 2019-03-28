<?php
if ($_GET && isset($_GET['action']) && isset($_GET['name']) ) {
      switch ($_GET['action']) {
        case("set"): //curl -c cook.txt 'http://localhost:8100/ex03/cookie_crisp.php?action=set&name=plat&value=choucroute'
            if ($_GET['value'])
                setcookie($_GET['name'], $_GET['value']);
            break;
        case("get"): // test $> curl -b cook.txt 'http://localhost:8100/ex03/cookie_crisp.php?action=get&name=plat'
            if ($_COOKIE[$_GET['name']]) 
                echo $_COOKIE[$_GET['name']]."\n";
            break;
        case 'del': // test $>  curl -c cook.txt 'http://localhost:8100/ex03/cookie_crisp.php?action=del&name=plat'
            setcookie($_GET['name'], "", -1);
            break;
      }
}