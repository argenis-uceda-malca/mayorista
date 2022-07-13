

$(document).ready(function() {
    $(".btnEliminar").click(function(event){
        event.preventDefault();
        var id = $(this).data("id");
        var boton = $(this);
        $.ajax({
            method: "POST",
            url: "/eliminarCarrito",
            data: {
                id: id
            }
        }).done(function(respuesta){
            boton.parent('td').parent('td').remove();
        });
    });

    
});
