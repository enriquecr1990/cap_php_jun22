<!-- codigo de php para realizar el calculo de los datos -->
<?php
    //verificar que el $_POST no este vacio
    //var_dump($_POST);
    $resultado = '';
    if(is_array($_POST) && !empty($_POST)){
        //llegaron los datos para calcular
        include_once '../backend/CalculadoraCientifica.php';
        //crear mi instacia de Calculadoracientifica
        $cc = new CalculadoraCientifica($_POST['numero_a'],$_POST['numero_b']);
        //estructura de control para la operacion
        switch ($_POST['operacion']){
            case '+':
                $resultado = $cc->suma();
                break;
            case '-':
                $resultado = $cc->resta();
                break;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Calculadora cientifica</title>

        <style>
            body{
                background-color: grey;
            }
            #slt_calculadora{
                background-color: green;
            }
            #slt_calculadora_resultado{
                background-color: yellow;
            }
        </style>
    </head>
    <body>
        <fieldset id="slt_calculadora">
            <legend>Calculadora</legend>
            <form method="post" action="index_puro.php">
                <input type="number" id="numero_a" required name="numero_a" placeholder="Numero 1">
                <input type="number" id="numero_b" required name="numero_b" placeholder="Numero 2">
                <select name="operacion">
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="*">*</option>
                    <option value="/">/</option>
                </select>
                <button id="btn_calcular_resultado" type="button">Calcular</button>
            </form>
        </fieldset>

        <fieldset id="slt_calculadora_resultado">
            <legend>Resultado</legend>
            <?php echo $resultado; ?>
        </fieldset>


        <script type="text/javascript">
            var MiVariable = 'Hola mundo JS';
            var VariablesHTML = {
                btn_calcular : document.getElementById('btn_calcular_resultado'),
                input_numero_a : document.getElementById('numero_a'),
                input_numero_b : document.getElementById('numero_b'),
            }

        </script>

    </body>
</html>