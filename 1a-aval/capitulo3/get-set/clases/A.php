<?php

class A
{
public $publica;
protected $protegida;
private $privada1;
private $privada2;
private $privada3;

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            if ($property == "protegida"){
                $this->$property = $value;
            }elseif ($property == "privada1"){
                $this->$property = $value;
            }elseif ($property == "privada2"){
                $this->$property = $value;
            }
        }
        return $this;
    }

}