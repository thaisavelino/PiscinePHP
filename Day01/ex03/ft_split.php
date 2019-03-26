<?php
    function ft_split($str)
    {
        $ret = explode(' ', $str);
        sort($ret);
        $yo = array();
        foreach ($ret as $elem)
        {
            if (!empty($elem))
            $yo[] = $elem;
        }
        unset($ret);
        return $yo;
    }
?>
