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
                                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-outline-success" data-toggle="modal" data-target="#myModalNuevoProducto"><i class="fas fa-plus"></i> Agregar Nuevo</button>
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
                            <table class="table no-wrap v-middle mb-0 AllDataTables" id="registro">
                                <thead>
                                    <tr class="border-0">
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">ID</h5>
                                        </th>
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">Producto</h5>
                                        </th>
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">Precio</h5>
                                        </th>
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">Categoria</h5>
                                        </th>
                                        <th class="border-0 font-14 font-weight-medium text-muted"></th>
                                        <th class="border-0 font-14 font-weight-medium text-muted"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($arreglo as $key => $producto) { ?>
                                        <tr>
                                            <td class="border-top-0 text-center font-weight-medium text-muted px-2 py-4"><?php echo $producto->id;?>
                                            </td>
                                            <td class="border-top-0 font-weight-medium text-muted px-2 py-4"><?php echo$producto->nombre;?></td>
                                            <td class="border-top-0 text-center font-weight-medium text-muted px-2 py-4">S/. <?php echo $producto->precio;?></td>
                                                <?php foreach ($categorias as $categoria) {
                                                    if ($producto->idcategoria == $categoria->id) {
                                                        $nombreCategoria = $categoria->nombre;
                                                    }
                                                } ?>

                                                <?php  ?>
                                            <td class="border-top-0 text-center font-weight-medium text-muted px-2 py-4"><?php echo$nombreCategoria;?></td>
                                            <td class="border-top-0 text-center px-2 py-4">
                                                <!--<a class="btn waves-effect waves-light btn-rounded btn-outline-secondary " href="/editProducto?id=<?php echo $producto->id; ?>" title="Editar">Editar</a>-->
                                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-outline-secondary editbtn" data-toggle="modal" data-target="#myModalProducto" data-id="" id="">Editar </button>
                                            </td>
                                            <td class="border-top-0 text-center px-2 py-4">
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
        <div id="myModalProducto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Actualice el producto</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form action="POST" id="editarProducto">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control" name="nombre" id="nombre">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Precio</label>
                                            <input type="text" class="form-control" placeholder="S/." name="precio" id="precio">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Categoria</label>
                                            <div class="input-group mb-3">
                                                <select class="custom-select" id="inputGroupSelect01" name="idcategoria">
                                                    <option selected>Elegir</option>
                                                    <?php foreach ($categorias as $categoria) { ?>
                                                        <option value="<?php echo $categoria->id; ?>" id="categoria"><?php echo $categoria->nombre; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info">Guardar</button>
                                    <button type="reset" class="btn btn-dark">Cancelar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- sample modal content -->
        <div id="myModalNuevoProducto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Registre un producto</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form action="POST" id="addProducto" novalidate>
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control" name="nombre" id="nombre" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Precio</label>
                                            <input type="text" class="form-control" placeholder="S/." name="precio" id="precio">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Categoria</label>
                                            <div class="input-group mb-3">
                                                <select class="custom-select" id="inputGroupSelect01" name="idcategoria">
                                                    <option selected>Elegir</option>
                                                    <?php foreach ($categorias as $categoria) { ?>
                                                        <option value="<?php echo $categoria->id; ?>" id="categoria"><?php echo $categoria->nombre; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info">Guardar</button>
                                    <button type="reset" class="btn btn-dark">Cancelar</button>
                                </div>
                            </div>
                        </form>
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
    <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script src='/build/js/admin.js'></script>
    ";
?>