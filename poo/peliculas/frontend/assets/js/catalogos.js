$(document).ready(function () {

    //cargamos el catalogo de clasificacion
    Catalogos.clasificacion();
    Catalogos.categoria();

});

//en js es una tipo clase, que contiene atributos y metodos
var Catalogos = {

    clasificacion : function(){
        /*var html_opciones = '<option selected>--Seleccione--</option>' +
            '<option value="a">A</option>' +
            '<option value="b">B</option>' +
            '<option value="c">C</option>';
        $('#input_clasificacion').html(html_opciones);*/
        $.ajax({
            type : 'post',
            url : URL_BACKEND + 'peticion=catalogos&funcion=clasificacion',
            data : {},
            dataType : 'json',
            success : function(respuesta_back){
                console.log(respuesta_back);
                if(respuesta_back.status){
                    var html_opciones = '<option selected>--Seleccione--</option>';
                    //forache del catalogo
                    /*respuesta_back.data.catalogo_clasificacion.forEach(function(elemento){
                        html_opciones += '<option value="'+elemento.id+'">'+elemento.nombre+'</option>';
                    });*/
                    //foreach nativo
                    for(i = 0; i < respuesta_back.data.catalogo_clasificacion.length; i++){
                        html_opciones += '<option value="'+respuesta_back.data.catalogo_clasificacion[i].id+'">'+respuesta_back.data.catalogo_clasificacion[i].nombre+'</option>';
                    }
                    $('.select_input_clasificacion').html(html_opciones)
                }
            },error : function(error){
                console.log(error);
                alert('Ups, hubo un error en el back');
            }
        });
    },

    categoria : function(){
        /*var html_opciones = '<option selected>--Seleccione--</option>' +
            '<option value="a">Ciencia ficccion</option>' +
            '<option value="b">Acción</option>' +
            '<option value="c">Fantasia</option>';
        $('#input_categoria').html(html_opciones);*/
        $.ajax({
            type : 'post',
            url : URL_BACKEND + 'peticion=catalogos&funcion=categoria',
            data : {},
            dataType : 'json',
            success : function(respuesta_back){
                console.log(respuesta_back);
                if(respuesta_back.status){
                    var html_opciones = '<option selected>--Seleccione--</option>';
                    //forache del catalogo
                    respuesta_back.data.catalogo_categoria.forEach(function(elemento){
                        html_opciones += '<option value="'+elemento.id+'">'+elemento.nombre+'</option>';
                    });
                    $('.select_input_categoria').html(html_opciones)
                }
            },error : function(error){
                console.log(error);
                alert('Ups, hubo un error en el back');
            }
        });
    },

}