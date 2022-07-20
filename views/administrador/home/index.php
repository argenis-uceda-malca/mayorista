<?php
include_once __DIR__ . '/../../templates/administrador/header.php';
?>

<?php
include_once __DIR__ . '/../../templates/administrador/sidebar.php';
?>

<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">

        <!-- *************************************************************** -->
        <!-- Start Top Leader Table -->
        <!-- *************************************************************** -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <h4 class="card-title">Registro de Pagos</h4>
                            <div class="ml-auto">
                                <div class="dropdown sub-dropdown">
                                    <button class="btn btn-link text-muted dropdown-toggle" type="button" id="dd1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1">
                                        <a class="dropdown-item" href="#">Insert</a>
                                        <a class="dropdown-item" href="#">Update</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table no-wrap v-middle mb-0" id="registro">
                                <thead>
                                    <tr class="border-0">
                                        <th class="border-0 font-14 font-weight-medium text-muted">Datos del comprador
                                        </th>
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center">Telefono</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center">Cantidad</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                            Monto
                                        </th>
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                            Estado
                                        </th>
                                        <th class="border-0 font-14 font-weight-medium text-muted"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ventas as $key => $venta) { ?>
                                        <tr>
                                            <td class="border-top-0 px-2 py-4">
                                                <div class="d-flex no-block align-items-center">
                                                    <div class="">
                                                        <h5 class="text-dark mb-0 font-16 font-weight-medium">
                                                            <?php echo $venta->nombres; ?> <?php echo $venta->apellidos; ?>
                                                        </h5>
                                                        <span class="text-muted font-14"><?php echo $venta->email; ?></span><br>
                                                        <span class="text-muted font-14">DNI: <?php echo $venta->dni; ?></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="border-top-0 text-center font-weight-medium text-muted px-2 py-4">
                                                <?php echo $venta->telefono; ?>
                                            </td>
                                            <td class="border-top-0 text-center font-weight-medium text-muted px-2 py-4">
                                                <?php echo $venta->cantidad; ?>
                                            </td>
                                            <td class="border-top-0 text-center font-weight-medium text-muted px-2 py-4">
                                                S/. <?php echo $venta->total; ?>
                                            </td>
                                            <td class="border-top-0 text-center px-2 py-4">
                                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-outline-secondary btnModal" data-toggle="modal" data-target="#myModal" data-id="<?php echo $venta->ventaId; ?>" id="<?php echo $venta->ventaId; ?>"><i class="fas fa-eye"></i> Ver </button>

                                            </td>
                                            <td class="font-weight-medium text-dark border-top-0 px-2 py-4">
                                                <a href="#" type="button" class="btn waves-effect waves-light btn-rounded btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>



                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- *************************************************************** -->
        <!-- End Top Leader Table -->
        <!-- *************************************************************** -->


        <!-- sample modal content -->
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Detalle de la venta</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body" >

                        <div id="MyModaltable_header">
                            <table class="table table_header no-wrap v-middle mb-0" id="registro">
                                <thead>
                                    <tr class="border-0">
                                        <th class="border-0 font-14 font-weight-medium text-center">Nombre</th>
                                        <th class="border-0 font-14 font-weight-medium text-center">Apellido</th>
                                        <th class="border-0 font-14 font-weight-medium text-center">Teléfono</th>
                                        <th class="border-0 font-14 font-weight-medium text-center">Total</th>
                                    </tr>
                                </thead>
                                <tbody id="cuerpo">
                                </tbody>
                            </table>
                        </div>
                        <div id="MyModaltable">
                            <table class="table no-wrap v-middle mb-0" id="registro">
                                <thead>
                                    <tr class="border-0">
                                        <th class="border-0 font-14 font-weight-medium text-center">Productos</th>
                                        <th class="border-0 font-14 font-weight-medium text-center">Categoria</th>
                                        <th class="border-0 font-14 font-weight-medium text-center">Cantidad</th>
                                        <th class="border-0 font-14 font-weight-medium text-center">Precio</th>
                                        <th class="border-0 font-14 font-weight-medium text-center">Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody id="cuerpo">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->




    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->

<?php
include_once __DIR__ . '/../../templates/administrador/footer.php';
?>


<?php
$script = "
    <script src='/build/admin/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js'></script>
    <script src='/build/admin/dist/js/pages/datatable/datatable-basic.init.js'></script>
    <script src='/build/js/admin.js'></script>
    ";
?>