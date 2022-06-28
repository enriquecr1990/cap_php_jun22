<?php

//incluir los controladores necesario a utilizar
include_once "controlador/CatalogosControllador.php";
include_once "controlador/PeliculasControlador.php";

//el backend necesita
/**
 * en los parametros get debe contener la peticion y la funcion a consumir
 */

$parametros_get = $_GET;

$respuesta_back = array(
    'status' => false,
    'msg' => array(
        'Error, no se encontro la petición'
    )
);

$rutas = new Rutas();
if(isset($parametros_get['peticion']) && $parametros_get['peticion'] != ''){
    if(isset($parametros_get['funcion']) && $parametros_get['funcion'] != ''){
        //catalogos,peliculas
        switch ($parametros_get['peticion']){
            case 'catalogos':
                $catControlador = new CatalogosControllador();
                switch ($parametros_get['funcion']){
                    case 'categoria':
                        $respuesta_controlador = $catControlador->listadoCatCatagoria();
                        $rutas->peticion(200,$respuesta_controlador);
                        break;
                    case 'clasificacion':
                        $respuesta_controlador = $catControlador->listadoCatClasificacion();
                        $rutas->peticion(200,$respuesta_controlador);
                        break;
                    default:
                        $rutas->peticion(404,$respuesta_back);
                        break;                }
                break;
            case 'pelicula':
                //construir mi controller de pelicula
                //switch de funcion
                //listado, agregar, modificar, eliminar
                $peliculaControlador = new PeliculasControlador();
                switch ($parametros_get['funcion']){
                    case 'listado':
                        $respuesta_controlador = $peliculaControlador->listado();
                        $rutas->peticion(200,$respuesta_controlador);
                        break;
                    case 'agregar':
                        $respuesta_controlador = array(
                            'status' => true,
                            'msg' => array(
                                'Se registro la pelicula correctamente'
                            )
                        );
                        $rutas->peticion(201,$respuesta_controlador);
                        break;
                    case 'modificar':
                        $respuesta_controlador = array(
                            'status' => true,
                            'msg' => array(
                                'Se actualizo la pelicula correctamente'
                            )
                        );
                        $rutas->peticion(200,$respuesta_controlador);
                        break;
                    case 'eliminar':
                        $respuesta_controlador = array(
                            'status' => true,
                            'msg' => array(
                                'Se elimino la pelicula correctamente'
                            )
                        );
                        $rutas->peticion(200,$respuesta_controlador);
                        break;
                    default:
                        $rutas->peticion(404,$respuesta_back);
                        break;                }
                break;
                break;
        }
    }else{
        $rutas->peticion(404,$respuesta_back);
    }
}else{
    $rutas->peticion(404,$respuesta_back);
}

class Rutas {

    public function peticion($codigo,$respuestaBack){
        http_response_code($codigo);
        echo json_encode($respuestaBack);
    }

}