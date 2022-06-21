<?php

include_once 'Calculadora.php';

//aplicar herancia de la calculadora normal

/**
 * mejorar la clase de calculadora cientifica
 * agregando mas funciones
 */

class CalculadoraCientifica extends Calculadora
{
    private $a;
    private $b;
    //paramentros para operar las funciones de la calculadora
    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
        parent::__construct($a, $b);
    }

    public function potencia(){
        //variable_a = variable base
        //variable_b = potencia
        return pow($this->a,$this->b);
    }

    //raiz cuadrada
    public function rCuadrada(){
        return sqrt($this->a);
    }

    public function setA($a){
        $this->a = $a;
    }

    public function getA(){
        return $this->a;
    }

}