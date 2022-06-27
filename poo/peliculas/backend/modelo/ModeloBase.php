<?php

/**
 * el modelo base es el llamado de las funciones de Base de datos
 * con la diferencia que para funcionar necesita el nombre de la tabla de la BD
 */

include_once "BaseDeDatos.php";

class ModeloBase extends BaseDeDatos
{

    private $tabla;

    function __construct($nombreTabla)
    {
        parent::__construct();
        $this->tabla = $nombreTabla;
    }

    public function obtenerListado(){
        return $this->consultaRegistros($this->tabla);
    }

}