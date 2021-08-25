function busqueda(){
    var texto= document.getElementById("usu").value;
    var parametros={
        "texto" : texto
    }
    $.ajax({
        data: parametros,
        url: "Controller/validarU.php",
        type: "POST",
        success: function(response){
            $("#error").php(response);
            console.log(response);
        }
    });
}