<?php
function ft_is_sort($array)
{
    $array_sorted = $array;
    sort($array_sorted);
  /*  foreach($array as $v)
    {
        print($v);
    }
    print("\n");
    foreach($array_sorted as $v)
    {
        print($v);
    }
    print("\n");*/
    return ($array_sorted == $array);
}