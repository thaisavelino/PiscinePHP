<?php
Class Fighter {
    private $type;
    public function __construct($type)
    {
       $this->type = $type;
    }
    public function getType()
    {
        return $this->type;
    }
}
?>