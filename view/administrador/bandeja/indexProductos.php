<?php
//Validamos la sesión.
require_once 'C:/xampp/htdocs/inventario/model/persistence/session.php';
validate_session();
administrador_session();
?>

<!-- Tabla manuales -->
<div class="sales-boxes">
    <div class="recent-sales box">
        <div class="title"><span class="table_title">Listado de productos</span></div>
        <div class="sales-details">
            <div class="table-responsive">
                <table id="dtProductos" class="table table-dark table-hover align-middle">
                    <thead>
                        <!-- Cabezeras de la tabla -->
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Sucursal</th>
                            <th><i class='bx bx-edit-alt bx-sm'></i></th>
                            <th><i class='bx bx-trash bx-sm'></i></th>
                        </tr>
                    </thead>
                    <tbody class="table-dark table-group-divider">
                        <!-- Imprimir campos de la tabla -->
                        <?php foreach ($lista as $obj) { ?>
                            <tr>
                                <td><?= $obj->id_producto ?></td>
                                <td><?= $obj->nombre ?></td>
                                <td><?= $obj->categoria ?></td>
                                <td><?= $obj->sucursal ?></td>
                                <td>
                                    <!-- Editar producto -->
                                    <div class="button">
                                        <form method="post" action="./?/bandeja/edit">
                                            <input type="hidden" name="id_producto" id="id_producto" value="<?= $obj->id_producto ?>">
                                            <button type="submit" class="btn btn-success btn-sm" name="editar"><i class="bx bxs-pencil"></i></button>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <!-- Eliminar producto -->
                                    <div class="button">
                                        <form method="post" action="./?/bandeja/delete">
                                            <input type="hidden" name="id_producto" id="id_producto" value="<?= $obj->id_producto ?>">
                                            <button type="submit" class="btn btn-danger btn-sm" name="eliminar"><i class="bx bxs-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        } ?>
                    </tbody>
                    <tfoot>
                        <th></th>
                        <th></th>
                        <th>Categoría</th>
                        <th>Sucursal</th>
                        <th></th>
                        <th></th>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>