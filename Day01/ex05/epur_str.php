#!/usr/bin/php
<?PHP
    if ($argc == 2)
    {
        function epur($str)
        {
            $str = trim($str);
            $str = preg_replace('/\s+/', ' ', $str);
            return ($str);
        }
        echo epur($argv[1])."\n";
    }
?>