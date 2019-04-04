<?php
Class Jaime extends Lannister
{
    public function answer($who)
    {
        if (get_class($who) === "Cersei")
            return "With pleasure, but only in a tower in Winterfell, then.";
        else if (get_parent_class($who) !== "Lannister")
            return "Let's do this.";
        else
            return "Not even if I'm drunk !";
    }
}
?>