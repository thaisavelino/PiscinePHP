<?php

include_once('Lannister.class.php');
include_once('Jaime.class.php');
include_once('Tyrion.class.php');

class Stark {
}

class Cersei extends Lannister {
}

class Sansa extends Stark {
}

$j = new Jaime(); // Maybe with familu
$c = new Cersei();
$t = new Tyrion(); // NOT with family
$s = new Sansa();

$j->sleepWith($t); // Jaime Tyron(Lannister) = FALSE
$j->sleepWith($s); // Jaime Sansa (STARK) - TRUE Let's do this.
$j->sleepWith($c); // Jaime  Cersei(Lannister) - TRUE With pleasure, but only in a tower in Winterfell, then.

$t->sleepWith($j); // Jaime (probably a Lannister) - FALSE
$t->sleepWith($s); // tyron w sansa (stark)- TRUE Let's do this.
$t->sleepWith($c); // Lannister - FALSE - 

?>
