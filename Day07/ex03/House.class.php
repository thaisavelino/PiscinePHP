<?php
abstract Class House {
    public function Introduce() {
        print ("House ");
        print($this->getHouseName());
        print(" of ");
        print($this->getHouseSeat());
        print(" : ");
        print('"' . $this->getHouseMotto() . '"');
        print(PHP_EOL);
    }
    abstract protected function getHouseName(); //test2 gives error that this doesnt exists
    abstract protected function getHouseSeat(); // so must put them all as abstract
    abstract protected function getHouseMotto();
}
?>