<?php
Class Tyrion extends Lannister {
    function answer($who) {
        if (get_parent_class($who) === 'Lannister')
        {
            return ( "Not even if I'm drunk !");
        }
        else {
            return ( "Let's do this.");
        }
    }
}
?>