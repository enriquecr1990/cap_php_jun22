<?php

class ValidacionFormulario
{

    public static function formPeliculaNuevo($postFormulario){
        $validacion['status'] = true;
        $validacion['msg'] = array();
        if(!isset($postFormulario['titulo']) || $postFormulario['titulo'] == ''){
            $validacion['status'] = false;
            $validacion['msg'][] = 'El campo titulo es requerido';
        }if(!isset($postFormulario['sinopsis']) || $postFormulario['sinopsis'] == ''){
            $validacion['status'] = false;
            $validacion['msg'][] = 'El campo sinopsis es requerido';
        }if(!isset($postFormulario['poster']) || $postFormulario['poster'] == ''){
            $validacion['status'] = false;
            $validacion['msg'][] = 'El campo poster es requerido';
        }if(!isset($postFormulario['clasificacion']) || $postFormulario['clasificacion'] == ''){
            $validacion['status'] = false;
            $validacion['msg'][] = 'El campo clasificacion es requerido';
        }
//        if(!isset($postFormulario['categoria']) || $postFormulario['categoria'] == ''){
//            $validacion['status'] = false;
//            $validacion['msg'][] = 'El campo categoria es requerido';
//        }
        return $validacion;
    }

}