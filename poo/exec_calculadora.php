<?php
//importar la clase a utilizar, calculadora.php
//include_once 'Calculadora.php';
include_once 'CalculadoraCientifica.php';

$variableA = 3;
$variableB = 5;

//instancias la clase calculadora
$cal = new CalculadoraCientifica($variableA,$variableB);
echo 'Suma de '.$cal->getA().' + '.$variableB.' = '.$cal->suma();
echo '<br>Resta de '.$cal->getA().' - '.$variableB.' = '.$cal->resta();
echo '<br>Producto de '.$cal->getA().' * '.$variableB.' = '.$cal->producto();
$cal->setA(10);
echo '<br>Division de '.$cal->getA().' / '.$variableB.' = '.$cal->division();
echo '<br>Potencia de '.$cal->getA().' ^ '.$variableB.' = '.$cal->potencia();
echo '<br>Raiz cuadrada de '.$cal->getA().' = '.$cal->rCuadrada();


/**realizar la interfaz grafica en html de la calculadora **/

var_dump($_GET);