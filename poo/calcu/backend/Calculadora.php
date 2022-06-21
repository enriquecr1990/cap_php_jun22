<?php

/**
 * operaciones basicas de una calculadora
 * + - * /
 */

class Calculadora {

    private $a;
    private $b;

    function __construct($a,$b){
        $this->a = $a;
        $this->b = $b;
    }

    public function suma(){
        //return $a + $b;
        return $this->a + $this->b;
    }

    public function resta(){
        return $this->a - $this->b;
    }

    public function producto(){
        return $this->a * $this->b;
    }

    public function division(){
        return $this->a / $this->b;
    }

}