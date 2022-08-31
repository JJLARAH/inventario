<?php
//Validamos la sesión.
require_once 'C:/xampp/htdocs/inventario/model/persistence/session.php';
validate_session();
capturista_session();
?>

<h2 align="center">Registro de productos</h2>
<div class="sales-boxes">
    <div class="recent-sales box">
        <div class="sales-details">
            <div class="form-add" id="form_productos">
                <form method="post" action="./?/productos/save">
                    <div class="row g-4">
                        <div class="col-sm-6">
                            <input type="hidden" name="id_producto" id="id_producto" value="0">
                            <label>Nombre del producto</label>
                            <input type="text" name="nombre" id="nombre" placeholder="Máximo 30 caracteres" class="form-control" required maxlength="30" data-bs-toggle="tooltip" data-bs-placement="top" title="Debe tener máximo 30 caracteres">
                        </div>
                        <div class="col-sm-6">
                            <label>Descripción</label>
                            <textarea type="text" name="descripcion" id="descripcion" placeholder="Agrega una descripción" class="form-control" required maxlength="100" data-bs-toggle="tooltip" data-bs-placement="top" title="Máximo 100 caracteres"></textarea>
                        </div>
                        <div class="col-sm-3">
                            <label>Categoría</label>
                            <div id="id_categoria">
                                <select name="id_categoria" id="id_categoria" class="form-control form-select" required>
                                    <option value="" selected>Selecciona...</option>
                                    <option value="1">Electrónica</option>
                                    <option value="2">Línea Blanca</option>
                                    <option value="3">Deportes</option>
                                    <option value="4">Alimentos</option>
                                    <option value="5">Jardín</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label>Sucursal</label>
                            <div id="id_sucursal">
                                <select name="id_sucursal" id="id_sucursal" class="form-control form-select" required>
                                    <option value="" selected>Selecciona...</option>
                                    <option value="1">Cuernavaca</option>
                                    <option value="2">Yautepec</option>
                                    <option value="3">Cuautla</option>
                                    <option value="4">Acapulco</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label>Precio</label>
                            <input type="number" name="precio" id="precio" class="form-control" required min="0" max="99999" data-bs-toggle="tooltip" data-bs-placement="top" title="Máximo 5 caracteres">
                        </div>
                        <div class="col-sm-3">
                            <label>Fecha de compra</label>
                            <input type="datetime-local" value="<?php echo date('Y-m-d\TH:i'); ?>" id="fecha_compra" name="fecha_compra" class="form-control">
                        </div>
                        <div align="center">
                            <input type="submit" name="agregar" value="Registrar" class="btn btn-success">
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>