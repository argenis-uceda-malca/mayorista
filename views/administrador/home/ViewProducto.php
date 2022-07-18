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
                            <h4 class="card-title">Lista de Productos</h4>
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
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">Producto</h5>
                                        </th>
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">Precio</h5>
                                        </th>
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">Categoria</h5>
                                        </th>
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">Descripción</h5>
                                        </th>
                                        <th class="border-0 font-14 font-weight-medium text-muted"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($arreglo as $key => $producto) { ?>
                                        <tr>
                                            <td class="border-top-0 text-center font-weight-medium text-muted px-2 py-4">
                                                <?php echo $producto->nombre; ?>
                                            </td>
                                            <td class="border-top-0 text-center font-weight-medium text-muted px-2 py-4">
                                                S/. <?php echo $producto->precio; ?>
                                            </td>
                                            <td class="border-top-0 text-center font-weight-medium text-muted px-2 py-4">
                                                <?php echo $producto->categoria; ?>
                                            </td>
                                            <td class="border-top-0 text-center font-weight-medium text-muted px-2 py-4">
                                                <?php echo $producto->descripcion; ?>
                                            </td>
                                            <td class="border-top-0 text-center px-2 py-4">
                                                
                                                <a class="btn waves-effect waves-light btn-rounded btn-outline-secondary" href="/editProducto?id=<?php echo $producto->id; ?>" title="Editar">Editar</a>
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
    <script src='/build/js/admin.js'></script>
    ";
?>