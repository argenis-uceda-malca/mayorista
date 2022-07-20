
document.addEventListener('DOMContentLoaded', function () {
    iniciarApp();
});

function iniciarApp() {
    AddProducto();
    ActualizarProducto();
    verificarLogin();
    editarTabla();
    ObtenerProductoPorId();
    ActualizarProductoModal();
}

function verificarLogin() {
    $('#login').on('submit', function (e) {

        e.preventDefault();
        var datos = $(this).serializeArray();
        alert("hola");
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
            info: "Mostrando del _START_ al _END_ de _TOTAL_ resultados",
            emptyaTable: "No hay registros",
            infoEmpty: "0 Registros",
            search: "Buscar",
            zeroRecords: "No se encontraron resultados",
            emptyTable: "Ningún dato disponible en esta tabla",
            paginate: {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            
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

    $('#editarProducto').on('submit', function (e) {
        e.preventDefault();
        //alert("hola");
        var datos = $(this).serializeArray();

        $.ajax({
            type: 'POST',
            data: datos,
            url: "/editarProducto",
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var resultado = data;
                if (resultado.resultado == 'exito') {
                    swal.fire(
                        'Exito',
                        'Actualizado correctamente ',
                        'success'
                    ),
                        setTimeout(function () {
                            window.location.href = '/viewProducto';
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

function AddProducto() {
    $('#addProducto').on('submit', function (e) {
        e.preventDefault();
        alert('Agregar producto');
    });
}

function ActualizarProductoModal() {
    $('.editbtn').on('click', function (e) {
        $tr = $(this).closest("tr");
        var datos = $tr.children("td").map(function () {
            return $(this).text();
        });
        console.log(datos[1]);
        $('#id').val(datos[0]);
        $('#nombre').val(datos[1]);
        $('#precio').val(datos[2]);
        $('#categoria').val(datos[3]);
    });
}

function DataTable() {
    $('.AllDataTables').DataTable({
        language: {
            "processing": "Procesando...",
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "emptyTable": "Ningún dato disponible en esta tabla",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "infoThousands": ",",
            "loadingRecords": "Cargando...",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "aria": {
                "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    })
}
