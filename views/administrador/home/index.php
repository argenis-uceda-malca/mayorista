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
                            <table class="table no-wrap v-middle mb-0" id="zero_config">
                                <thead>
                                    <tr class="border-0">
                                        <th class="border-0 font-14 font-weight-medium text-muted">Nombre comprador
                                        </th>
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
                                    <?php foreach($ventas as $key => $venta) {?> 
                                    <tr>
                                        <td class="border-top-0 px-2 py-4">
                                            <div class="d-flex no-block align-items-center">
                                                <div class="mr-3"><img src="/build/admin/assets/images/users/widget-table-pic1.jpg" alt="user" class="rounded-circle" width="45" height="45" /></div>
                                                <div class="">
                                                    <h5 class="text-dark mb-0 font-16 font-weight-medium">
                                                        <?php echo $venta->nombre; ?>
                                                    </h5>
                                                    <span class="text-muted font-14"><?php echo $venta->email; ?></span><br>
                                                    <span class="text-muted font-14"><?php echo $venta->telefono; ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="border-top-0 text-center font-weight-medium text-muted px-2 py-4">
                                            <?php echo $venta->cantidad; ?>
                                        </td>
                                        <td class="border-top-0 text-center font-weight-medium text-muted px-2 py-4">
                                            <?php echo $venta->total; ?>
                                        </td>
                                        <td class="border-top-0 text-center px-2 py-4"><i class="fa fa-circle text-primary font-12" data-toggle="tooltip" data-placement="top" title="In Testing"></i></td>
                                        <td class="font-weight-medium text-dark border-top-0 px-2 py-4">BOTONES
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
    ";
?>