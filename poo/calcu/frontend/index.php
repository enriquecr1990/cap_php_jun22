<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Calculadora cientifica</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    </head>
    <body>
        <fieldset id="slt_calculadora">
            <legend>Calculadora</legend>
            <form method="post" action="index_puro.php">
                <input type="number" class="form-control" id="numero_a" required name="numero_a" placeholder="Numero 1">
                <input type="number" class="form-control" id="numero_b" required name="numero_b" placeholder="Numero 2">
                <select id="operacion" name="operacion" class="form-control">
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="*">*</option>
                    <option value="/">/</option>
                </select>
                <button id="btn_calcular_resultado" class="btn btn-sm btn-primary" type="button">Calcular</button>
            </form>
        </fieldset>

        <fieldset id="slt_calculadora_resultado">
            <legend>Resultado</legend>
            <span id="span_resulado"></span>
        </fieldset>


        <script type="text/javascript">
            var MiVariable = 'Hola mundo JS';
            var VariablesHTML = {
                btn_calcular : document.getElementById('btn_calcular_resultado'),
                input_numero_a : document.getElementById('numero_a'),
                input_numero_b : document.getElementById('numero_b'),
            }

        </script>
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

        <script src="js/calculadora.js"></script>
    </body>
</html>