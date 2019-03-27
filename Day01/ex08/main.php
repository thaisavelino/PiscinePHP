#!/usr/bin/php
<?php
    include("ft_is_sort.php");
    //$tab = array("0", "2", "4", "a");
    //$tab = array("a", "b", "c");
    $tab = array("z", "b", "c");
    //$tab[] = "What are we doing now ?";
    if (ft_is_sort($tab))
        echo "The array is sorted\n";
    else
        echo "The array is not sorted\n";
?>
