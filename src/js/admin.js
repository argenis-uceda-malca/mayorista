
document.addEventListener('DOMContentLoaded', function () {
    iniciarApp();
});

function iniciarApp() {
    verificarLogin();
    editarTabla();
    ObtenerProductoPorId();
    ActualizarProducto();
}

function verificarLogin() {
    $('#login').on('submit', function (e) {
        e.preventDefault();
        var datos = $(this).serializeArray();
        // console.log(datos);
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: "/login",
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var resultado = data;
                if (resultado.resultado == 'exito') {
                    swal.fire(
                        'Login Exitoso',
                        'Bienvenido ' + resultado.usuario,
                        'success'
                    )
                    setTimeout(function () {
                        window.location.href = '/admin';
                    }, 600);
                }
                if (resultado.resultado == 'error') {
                    swal.fire(
                        'Error',
                        'Password Incorrecto o Usuario No existente',
                        'error'
                    )
                }
            },
            error: function (e) {
                swal.fire(
                    'UPS!!!',
                    'Lo sentimos hubo un error inesperado',
                    'error'
                )
            }
        });
    });
}

function editarTabla() {
    $('#registro').DataTable({
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': false,
        'info': true,
        'autoWidth': false,
        'pageLength': 20,
        'language': {
            info: "Mostrando del _START_ a _END_ de _TOTAL_ resultados",
            emptyaTable: "No hay registros",
            infoEmpty: "0 Registros",
            search: "Buscar"
        }
    });
}

function ObtenerProductoPorId() {
    $('.btnModal').on('click', function () {
        var ventaId = $(this).data("id");

        //console.log(ventaId);
        $.ajax({
            method: "POST",
            url: "/getInfo",
            data: {
                ventaId: ventaId
            },
            success: function (data) {
                var jsonOriginal = data;

                const json = JSON.parse(jsonOriginal);

                $(".del").remove();

                var table_header = $('#MyModaltable_header').find('.table tbody');

                json.ventas.forEach(function (comprador) {
                    table_header.append('<tr class="del"><td class="text-center">' + comprador.nombres + '</td><td class="text-center">' + comprador.apellidos + '</td><td class="text-center">' + comprador.telefono + '</td><td class="text-center">S/. ' + comprador.total + '</td></tr>');
                });

                var table = $('#MyModaltable').find('.table tbody');

                json.detalle.forEach(function (rol) {
                    console.log(rol.ventaId);
                    table.append('<tr class="del"><td class="text-center">' + rol.nombre + '</td><td class="text-center">' + rol.categoria + '</td><td class="text-center">' + rol.cantidad + '</td><td class="text-center">S/. ' + rol.precio + '</td><td class="text-center">S/. ' + rol.total + '</td></tr>');
                });

            }
        });
    });

}

function ActualizarProducto() {
    $('#editProducto').on('submit', function (e) {
        e.preventDefault();
        var datos = $(this).serializeArray();
        
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: "/update",
            dataType: 'json',
            success: function (data){
                var resultado = data;
                if (resultado.resultado == 'exito') {
                    swal.fire(
                        'Exitos',
                        'Actualizado correctamente ',
                        'success'
                    )
                    setTimeout(function () {
                        window.location.href = '/admin';
                    }, 600);
                }
                if (resultado.resultado == 'error') {
                    swal.fire(
                        'Error',
                        'Error al Actualizar',
                        'error'
                    )
                }
            }, 
            error: function (e) {
                swal.fire(
                    'UPS!!!',
                    'Lo sentimos hubo un error inesperado',
                    'error'
                )
            }
        });
    });
}