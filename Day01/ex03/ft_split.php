
<?php
    function ft_split($str)
    {
        $ret = explode(' ', $str);
        sort($ret);
        return $ret;
    }
?>