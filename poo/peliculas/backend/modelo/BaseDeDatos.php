<?php

/**
 * clase de base de datos que me permita realizar
 * 0. cargar la configuracion de BD
 * 1. conexion
 * 2. operaciones de base de datos
 *  a. consulta (select)
 *  b. agregar (insert)
 *  c. eliminar (delete)
 *  d. update (update)
 */

include_once 'ConfigBD.php';

class BaseDeDatos {

    private $configDB;
    private $mysqli;

    function __construct()
    {
        try{
            $this->configDB = ConfigBD::getConfig();
            $this->mysqli = new mysqli(
                $this->configDB['hostname'],
                $this->configDB['usuario'],
                $this->configDB['password'],
                $this->configDB['base_datos'],
                $this->configDB['puerto']
            );
            if($this->mysqli->connect_errno){
                echo 'Error en la conexion de base de datos try';die;
            }else{
                //$this->consultarCatalogoCategoria();
            }
        }catch (Exception $ex){
            echo 'Error en la conexion de base de datos';die;
        }
    }

    public function consultarCatalogoCategoria(){
        $consulta = 'select * from catalogo_categoria';
        $query = $this->mysqli->query($consulta);
        $datos_consulta = array();
        while($registro = $query->fetch_assoc()){
            $datos_consulta[] = $registro;
        }return $datos_consulta;
    }

    public function consultaRegistros($nombreTabla){
        $consulta = "select * from $nombreTabla";
        $query = $this->mysqli->query($consulta);
        $datos_consulta = array();
        while($registro = $query->fetch_assoc()){
            $datos_consulta[] = $registro;
        }return $datos_consulta;
    }

}