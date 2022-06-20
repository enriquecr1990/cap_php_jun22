<?php

//variables
/**
 * simbolo de $ (pesos/dolar) nombre_variable
 * estructura de camello o la de camelCase
 * estructura de guiones bajos
 */
$mi_variable = 10;

//funciones
/**
 * se escriben iniciando en minusculas y seguido de camelCase/_
 */
function imprimirMensaje($mensaje){
    echo $mensaje;
}

//clases
/**
 * siempre se inician en mayusculas camelCase/_
 */
class DemoClases {

    private $variable_clase;

    function __construct($variableIncial){
        //echo '*** me instanciaron la clase DemoClases ***';
        $this->variable_clase = $variableIncial;
    }

    function imprimirMensaje($mensaje){
        echo $mensaje;
        echo ' ------ ';
        echo $this->variable_clase;
    }

    function sobreCargarMetodo($varible = false){
        echo '<br>';
        if($varible){
            echo 'Llego valor en la variable'.$varible;
        }else{
            echo 'Buuuuuu, no llego variable a la funcion';
        }
    }

}

$mi_variable = 'Hola mundo';
//imprimirMensaje($mi_variable);

//DemoClases.imprimirMensaje($mi_variable);
//ejemplo java
//public String micadena = new String();
$demoClases = new DemoClases('Variable en el constructor de la clase');
//var_dump($demoClases);

$demoClases->imprimirMensaje($mi_variable);
$demoClases->sobreCargarMetodo();
$demoClases->sobreCargarMetodo(' ----- Sobre carga de metodos');

exit;