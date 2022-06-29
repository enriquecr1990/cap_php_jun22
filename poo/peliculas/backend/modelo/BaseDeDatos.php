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

    /**
     * @param $nombreTabla
     * @param $insert
     * @return void
     * $insert = array('nombre_columna' => 'valor')
     */
    public function insertarRegistro($nombreTabla,$insert){
        //insert into NOMBRE_TABLA('COLUMNAS',...) values ('valor1',....);
        $colVal = $this->obtenerClaveValorInsert($insert);
        $consultaInsert = "INSERT INTO $nombreTabla (".$colVal['columnas'].") VALUES (".$colVal['valores'].")";
        try{
            $query = $this->mysqli->query($consultaInsert);
            if($query !== true){
                return false;
            }return true;
        }catch (Exception $ex){
            return false;
        }
    }

    /**
     * agregar la funcion de actualizar registro
     * conforme al SQL de update
     * UPDATE nombre_tabla SET valores_update condiciones
     */
    public function actualizarRegistro($nombreTabla,$valoresUpdate,$condicionesUpdate){
        try{
            $sqlCamposUpdate = $this->obtenerClaveValorUpdate($valoresUpdate);
            $stringCondicionesUpdate = $this->obtenerCondicionalesWhere($condicionesUpdate);
            $consultaUpdateSQL = "UPDATE $nombreTabla SET $sqlCamposUpdate $stringCondicionesUpdate";
            var_dump($consultaUpdateSQL);
        }catch (Exception $ex){
            return false;
        }
    }

    private function obtenerClaveValorInsert($insert){
        $retorno = array();
        $stringNombreColumnas = '';
        $stringValoresColumnas = '';
        $iteracion = 1;
        $maxIteracionInsert = sizeof($insert);
        foreach ($insert as $columna => $valor){
            $stringNombreColumnas .= $columna;
            $stringValoresColumnas .= "'".$valor."'";
            if($iteracion < $maxIteracionInsert){
                $stringNombreColumnas .= ',';
                $stringValoresColumnas .= ',';
            }
            $iteracion++;
        }
        $retorno['columnas'] = $stringNombreColumnas;
        $retorno['valores'] = $stringValoresColumnas;
        return $retorno;
    }

    private function obtenerClaveValorUpdate($camposUpdate){
        $stringCampoValorSQL = '';
        $iteracion = 1;
        $maxItCampo = sizeof($camposUpdate);
        foreach ($camposUpdate as $columna => $valor){
            $stringCampoValorSQL .= " $columna = '$valor'";
            if($iteracion < $maxItCampo){
                $stringCampoValorSQL .= ',';
            }
            $iteracion++;
        }
        return $stringCampoValorSQL;
    }

    private function obtenerCondicionalesWhere($condicionales){
        $condicionesSQL = 'WHERE 1=1';
        foreach ($condicionales as $columna => $valor){
            $condicionesSQL .= " AND $columna = '$valor'";
        }
        return $condicionesSQL;
    }

}