<?php

include_once('UnholyFactory.class.php');
include_once('Fighter.class.php');

class Footsoldier extends Fighter {
	public function __construct() {
		parent::__construct("foot soldier");
	}

	public function fight($target) {
		print ("* draws his sword and runs towards " . $target . " *" . PHP_EOL);
	}
}

class Archer extends Fighter {
	public function __construct() {
		parent::__construct("archer");
	}

	public function fight($target) {
		print ("* shoots arrows at " . $target . " *" . PHP_EOL);
	}
}

class Assassin extends Fighter {
	public function __construct() {
		parent::__construct("assassin");
	}

	public function fight($target) {
		print ("* creeps behind " . $target . " and stabs at it *" . PHP_EOL);
	}
}

class Llama {
	public function fight($target) {
		print ("* spits at " . $target . " *" . PHP_EOL);
	}
}

$uf = new UnholyFactory();	// Create a absorb function to UnholyFactory class
$uf->absorb(new Footsoldier());  //output: (Factory absorbed a fighter of type foot soldier)
$uf->absorb(new Footsoldier()); // output: (Factory already absorbed a fighter of type foot soldier)
$uf->absorb(new Archer()); // output: (Factory absorbed a fighter of type archer)
$uf->absorb(new Assassin());//(Factory absorbed a fighter of type assassin)
$uf->absorb(new Llama()); // output: (Factory can't absorb this, it's not a fighter)

$requested_fighters = Array( 	//outputs para o foreach li embaixo:
	"foot soldier",				// (Factory fabricates a fighter of type foot soldier)
	"llama",					//(Factory hasn't absorbed any fighter of type llama)
	"foot soldier",				// (Factory fabricates a fighter of type foot soldier)
	"archer",					// (Factory fabricates a fighter of type archer)
	"foot soldier",				// (Factory fabricates a fighter of type foot soldier)
	"assassin",					// (Factory fabricates a fighter of type assassin)
	"foot soldier",				// (Factory fabricates a fighter of type foot soldier)
	"archer",					// (Factory fabricates a fighter of type archer)
);

$actual_fighters = Array(
);

foreach ($requested_fighters as $rf) {
	$f = $uf->fabricate($rf); 			//create this function to UnholyFactory class
	if ($f != null) {
		array_push($actual_fighters, $f);
	}
}

$targets = Array("the Hound", "Tyrion", "Podrick");

foreach ($actual_fighters as $f) {
	foreach ($targets as $t) {
		$f->fight($t);
	}
}
