function buscar(){
    var textoBusqueda =document.getElementById("busqueda"); // se trae mediante el id del campo
    var valor = textoBusqueda.value; // se especifica que solo sea el valor
    //var textoBusqueda = $("busqueda").val();
    $.post("est_resultado.php", {cursoBuscar: valor}, function(mensaje){
        $("#resultadoBusqueda").html(mensaje);
    })
    console.log("esta buscando",valor)
}