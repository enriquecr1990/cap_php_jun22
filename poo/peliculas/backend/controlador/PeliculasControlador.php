<?php

include_once 'modelo/PeliculaModel.php';

class PeliculasControlador
{

    private $peliculaModel;

    function __construct()
    {
        $this->peliculaModel = new PeliculaModel();
    }

    public function listado(){
        $listadoPelicula = $this->peliculaModel->obtenerListado();
        $respuesta = array(
            'status' => true,
            'msg' => array(
                'Se obtuvo el listado correctamente'
            ),
            'data' => array(
                'pelicula' => $listadoPelicula
            )
        );
        return $respuesta;
    }

    public function agregar(){

    }

    public function modificar(){

    }

    public function eliminar(){

    }

}