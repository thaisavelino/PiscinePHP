<?php
Class NightsWatch implements IFighter
{
    private $warrior = array();
    public function recruit($new)
    {
        $this->warrior[] = $new;
    }
    public function fight()
    {
        foreach ($this->warrior as $new)
        {
            if (method_exists(get_class($new), 'fight')) //get class return the name of the class // method exists check if exists.. rs
                $new->fight();
        }
    }
}
?>