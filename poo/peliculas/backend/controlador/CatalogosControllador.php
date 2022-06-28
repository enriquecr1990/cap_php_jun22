<?php

//incluir la entidad(es) catalogos
include_once "modelo/CatalogoCategoriaModel.php";
include_once "modelo/CatalogoClasificacionModel.php";

class CatalogosControllador
{

    private $catCatagoriaModel;
    private $catClasificacionModel;

    function __construct()
    {
        $this->catCatagoriaModel = new CatalogoCategoriaModel();
        $this->catClasificacionModel = new CatalogoClasificacionModel();
    }

    //listado de algun catalogo

    public function listadoCatCatagoria(){
        $catCategoria = $this->catCatagoriaModel->obtenerListado();
        return array(
            'status' => true,
            'msg' => array('Se obtuvo el catalogo correctamente'),
            'data' => array(
                'catalogo_categoria' => $catCategoria
            )
        );
    }

    public function listadoCatClasificacion(){
        $catClasificacion = $this->catClasificacionModel->obtenerListado();
        return array(
            'status' => true,
            'msg' => array('Se obtuvo el catalogo correctamente clasificacion - controlador'),
            'data' => array(
                'catalogo_clasificacion' => $catClasificacion
            )
        );
    }

}