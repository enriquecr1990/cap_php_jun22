<?php

//incluir la entidad(es) catalogos
include_once "modelo/CatalogoCategoriaModel.php";

class CatalogosControllador
{

    private $catCatagoriaModel;

    function __construct()
    {
        $this->catCatagoriaModel = new CatalogoCategoriaModel();
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

}