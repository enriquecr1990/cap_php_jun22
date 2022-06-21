$(document).ready(function(){

    //selector de JS del boton de calcular
    $(document).on('click','#btn_calcular_resultado',function(){
        //alert('diste click para calcular');
        var numero_a = $('#numero_a').val();
        var numero_b = $('#numero_b').val();
        var operacion = $('#operacion').val();
        //mandamos a llamar el servicio rest de calculadora
        $.ajax({
            type : 'post', //get,post,...
            data : {
                numero_a : numero_a,
                numero_b : numero_b,
                operacion : operacion,
            },
            dataType : 'json',
            url : '../backend/operaciones_servicios.php',
            success : function (respuesta){
                if(respuesta.status) {
                    $('#span_resulado').html(respuesta.data.resultado);
                }else{
                    alert('hubo un error');
                }
            },
            error : function(e,opciones,error){
                alert('hubo un error en el ajax')
            }
        });
    });

});