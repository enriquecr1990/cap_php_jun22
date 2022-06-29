$(document).ready(function(){

    //mandar a llamar la funcion de buscar peliculas al dar click en el boton de buscar
    $(document).on('click','#btn_buscar_peliculas',function(){
        Peliculas.buscar();
    });

    $(document).on('click','#btn_agregar_pelicula',function(){
        Peliculas.mostrar_formulario_pelicula('Registro de una nueva pelicula');
    });

    $(document).on('click','.btn_modificar_pelicula',function (){
        Peliculas.mostrar_formulario_pelicula('Actualización de pelicula');
    });

    $(document).on('click','#btn_guardar_form_pelicula',function(){
        Peliculas.guardar_nueva();
    });

    $(document).on('click','.btn_eliminar_pelicula',function(){
        var confirmacion = confirm('¿Estas seguro de eliminar la pelicula?');
        if(confirmacion){
            Peliculas.eliminar();
        }
    });

    $(document).on('click','#btn_cancelar_form_pelicula',function(){
        Peliculas.ocultar_formulario_pelicula();
    });

    /*$(document).on('click','#btn_guardar_form_pelicula',function(){
        Peliculas.ocultar_formulario_pelicula();
    });*/

    //mandamos a llamar la funcion de buscar peliculas
    //Peliculas.buscar();

});

var Peliculas = {

    buscar : function(){
        /*var html_registros = '<tr>' +
            '<td>1</td>' +
            '<td>mi villano favorito JS</td>' +
            '<td>05 de julio</td>' +
            '<td>A/Animación</td>' +
            '<td>' +
            '    <button type="button" class="btn btn-sm btn-outline-warning btn_modificar_pelicula">Editar</button>' +
            '    <button type="button" class="btn btn-sm btn-outline-danger">Eliminar</button>' +
            '</td>' +
            '                            </tr>';
        $('#tbody_resultados_peliculas').html(html_registros);*/
        $.ajax({
            type : 'post',
            url : URL_BACKEND + 'peticion=pelicula&funcion=listado',
            data : {},
            dataType : 'json',
            success : function(respuesta_back){
                console.log(respuesta_back);
                if(respuesta_back.status){
                    var html_peliculas = '';
                    //forache del catalogo
                    respuesta_back.data.pelicula.forEach(function(pelicula){
                        html_peliculas += '<tr>' +
                            '<td>'+pelicula.id+'</td>' +
                            '<td>'+pelicula.titulo+'</td>' +
                            '<td>'+pelicula.fecha_estreno+'</td>' +
                            '<td>'+pelicula.clasificacion+'</td>' +
                            '<td>' +
                                '<button type="button" class="btn btn-sm btn-outline-warning btn_modificar_pelicula">Editar</button>' +
                                '<button type="button" class="btn btn-sm btn-outline-danger btn_eliminar_pelicula">Eliminar</button>' +
                            '</td>' +
                            '</tr>';
                    });
                    $('#tbody_resultados_peliculas').html(html_peliculas)
                }
            },error : function(error){
                console.log(error);
                alert('Ups, hubo un error en el back');
            }
        });
    },

    mostrar_formulario_pelicula : function(titulo){
        $('#contenedor_filtro_busqueda').fadeOut();
        $('#contenedor_tablero_resultados').fadeOut();
        $('#contenedor_formulario_peliculas').fadeIn();
        $('#titulo_formulario').html(titulo);
    },

    ocultar_formulario_pelicula : function (){
        $('#contenedor_filtro_busqueda').fadeIn();
        $('#contenedor_tablero_resultados').fadeIn();
        $('#contenedor_formulario_peliculas').fadeOut();
        //el trigger con el parametro click, es simular por JS que se la da click al boton con el selector correspondiente
        $('#btn_reiniciar_form_pelicula').trigger('click');
    },

    guardar_nueva : function(){
        //
        $.ajax({
            type : 'post',
            url : URL_BACKEND + 'peticion=pelicula&funcion=agregar',
            data : $('#form_pelicula').serialize(),
            dataType : 'json',
            //el success es una funcion anonima
            success : function(respuesta_back){
                console.log(respuesta_back);
                if(respuesta_back.status){
                    Peliculas.ocultar_formulario_pelicula();
                    Peliculas.buscar();
                }else{
                    alert('no fue posible guardar la pelicula');
                }
            },error : function (error){
                console.log(error);
                alert('Ups, hubo un error en el back');
            }
        });
    },

    eliminar : function(){
        alert('se elimino la pelicula con exito');
    }

}