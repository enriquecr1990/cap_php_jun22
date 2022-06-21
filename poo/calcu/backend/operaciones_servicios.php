<?php

//archivo de servicios rest que responden en formato JSON
/**
 * status: true/false obligatorio
 * msg: arreglo de mensajes obligatorio
 * data: arreglo de datos si devuelve algo (opcional)
 */

include_once 'CalculadoraCientifica.php';

$respuesta = array(
    'status' => false,
    'msg' => array('No se pudo procesar la respuesta'),
);

if(is_array($_POST) && !empty($_POST)){
    //validar que llegen los dos numeros y el operando
    if(isset($_POST['numero_a']) && $_POST['numero_a'] != ''
        && isset($_POST['numero_b']) && $_POST['numero_b'] != ''
        && isset($_POST['operacion']) && $_POST['operacion'] != ''){
        $resultado = '';
        $cc = new CalculadoraCientifica($_POST['numero_a'],$_POST['numero_b']);
        //estructura de control para la operacion
        switch ($_POST['operacion']){
            case '+':
                $resultado = $cc->suma();
                break;
            case '-':
                $resultado = $cc->resta();
                break;
            case '*':
                $resultado = $cc->producto();
                break;
            case '/':
                $resultado = $cc->division();
                break;
        }
        $respuesta = array(
            'status' => true,
            'msg' => array('Se realizó el calculo correctamente'),
            'data' => array(
                'resultado' => $resultado
            )
        );
    }else{
        $respuesta = array(
            'status' => false,
            'msg' => array('No llegaron los datos para la calculadora'),
        );
    }
}else{
    $respuesta = array(
        'status' => false,
        'msg' => array('No llego el formularo de la calculadora'),
    );
}

//retornar la respuesta del arreglo;
echo json_encode($respuesta);exit;