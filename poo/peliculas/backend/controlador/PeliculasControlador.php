<?php

include_once 'modelo/PeliculaModel.php';
include_once 'helper/ValidacionFormulario.php';

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

    public function agregar($postFormulario){
        $respuesta = array(
            'status' => false,
            'msg' => array(
                'Ups, aun no he podido guardar la pelicula'
            ),
        );
        //un ayudante para realizar las validaciones de campo
        $validacionCampos = ValidacionFormulario::formPeliculaNuevo($postFormulario);
        if($validacionCampos['status']){
            //paso la validacion de campos
            //falta la funcionalidad de la categoria de pelicula
            //por tanto ese campo se quita del formulario y se respalda en otra variable
            $categoriaPelicula = $postFormulario['categoria'];
            unset($postFormulario['categoria']);
            $peliculaNueva = $this->peliculaModel->insertar($postFormulario);
            if($peliculaNueva){
                $respuesta['status'] = true;
                $respuesta['msg'] = array(
                    'Se guardo la pelicula con exito'
                );
            }else{
                $respuesta['msg'] = array('No fue posible guardar la pelicula, error en el Modelo');
            }
        }else{
            //hubo un error en la validacion de campos
            $respuesta['msg'] = $validacionCampos['msg'];
        }
        return $respuesta;
    }

    public function modificar(){
        //crear la respuesta por default
        //validar los campos del formulario, hay que considerar el id de la pelicula para modificar/update
        /**
         * si se valido el formulario correctamente
         *  mandar a llamar el modelo para actualizar la pelicula y mandarle el post del formulario
         */
    }

    public function eliminar(){

    }

}