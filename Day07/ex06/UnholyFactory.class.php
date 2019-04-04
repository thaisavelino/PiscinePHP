<?php
Class UnholyFactory {
    private $warrior = array();
    public function absorb($w) {
        if (get_parent_class($w))
        {
            if (isset($this->warrior[$w->getType()]))
            {
                print('(Factory already absorbed a fighter of type ' . $w->getType() . ')' . PHP_EOL );
            } else {
                print('(Factory absorbed a fighter of type ' . $w->getType() . ')' . PHP_EOL );
                $this->warrior[$w->getType()] = $w;
            }
        }
        else 
        {
            print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL );
        }
    }
    public function fabricate($w) {
        if (array_key_exists($w, $this->warrior)) {
            print("(Factory fabricates a fighter of type " . $w . ")" . PHP_EOL);
            return (clone $this->warrior[$w]);
        }
        print("(Factory hasn't absorbed any fighter of type " . $w . ")" . PHP_EOL);
        return null;
    }
}


?>