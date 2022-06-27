$(document).ready(function () {

    //cargamos el catalogo de clasificacion
    Catalogos.clasificacion();
    Catalogos.categoria();

});

//en js es una tipo clase, que contiene atributos y metodos
var Catalogos = {

    clasificacion : function(){
        var html_opciones = '<option selected>--Seleccione--</option>' +
            '<option value="a">A</option>' +
            '<option value="b">B</option>' +
            '<option value="c">C</option>';
        $('#input_clasificacion').html(html_opciones);
    },

    categoria : function(){
        var html_opciones = '<option selected>--Seleccione--</option>' +
            '<option value="a">Ciencia ficccion</option>' +
            '<option value="b">Acción</option>' +
            '<option value="c">Fantasia</option>';
        $('#input_categoria').html(html_opciones);
    },

}