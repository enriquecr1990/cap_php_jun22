<?php
/*
//var_dump($_SERVER);exit;
include_once 'modelo/ConfigBD.php';

//$configDB = new ConfigBD();
//var_dump($configDB->getConfig());
//var_dump(ConfigBD::getConfig());exit;
$configDB = ConfigBD::getConfig();

//instancia de mysqli
$mysqli = new mysqli(
    $configDB['hostname'],
    $configDB['usuario'],
    $configDB['password'],
    $configDB['base_datos'],
    $configDB['puerto']
);

if($mysqli->connect_errno){
    echo 'Error en la conexion de BD';die;
}else{
    echo 'Conexion exitosa';
    $consulta = 'select * from catalogo_categoria';
    $query = $mysqli->query($consulta);
    $datos_consulta = array();
    while($registro = $query->fetch_assoc()){
        $datos_consulta[] = $registro;
    }
    var_dump($datos_consulta);
}*/

include_once 'modelo/CatalogoCategoriaModel.php';

//primera forma
/*$bd = new BaseDeDatos();
$catalogo_cat = $bd->consultarCatalogoCategoria();
var_dump($catalogo_cat);*/

//segunda forma
//consultar catalogo categoria nueva forma
/*$cc = $bd->consultaRegistros('catalogo_categoria');
var_dump($cc);
$peliculas = $bd->consultaRegistros('pelicula');
var_dump($peliculas);*/

//tercera
/*$mbCatCat = new ModeloBase('catalogo_categoria');
var_dump($mbCatCat->obtenerListado());

$mbPeliculas = new ModeloBase('pelicula');
var_dump($mbPeliculas->obtenerListado());*/

//cuarta forma
$ccm = new CatalogoCategoriaModel();
$lista = $ccm->obtenerListado();
var_dump($lista);exit;

//probando el consumo del controller

include_once "controlador/CatalogosControllador.php";

$catalogoControlador = new CatalogosControllador();
$respuesta = $catalogoControlador->listadoCatCatagoria();
http_response_code(200);
echo json_encode($respuesta);