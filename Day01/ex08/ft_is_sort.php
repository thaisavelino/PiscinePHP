<?php
function ft_is_sort($array)
{
    $array_sorted = $array;
    sort($array_sorted);
    return ($array_sorted == $array);
}