<?php
//Validamos la sesión.
require_once 'C:/xampp/htdocs/inventario/model/persistence/session.php';
validate_session();
administrador_session();
?>

<h2 align="center">Editar productos</h2>
<div class="sales-boxes">
	<div class="recent-sales box">
		<div class="sales-details">
			<div class="form-add" id="form_productos">
				<form method="post" action="./?/bandeja/save">
					<div class="row g-4">
						<div class="col-sm-6">
							<input type="hidden" name="id_producto" id="id_producto" value="<?= $obj->id_producto ?>">
							<label>Nombre del producto</label>
							<input type="text" name="nombre" id="nombre" value="<?= $obj->nombre ?>" class="form-control" maxlength="30" data-bs-toggle="tooltip" data-bs-placement="top" title="No puedes editar este campo" readonly>
						</div>
						<div class="col-sm-6">
							<label>Descripción</label>
							<textarea type="text" name="descripcion" id="descripcion" value="<?= $obj->descripcion ?>" class="form-control" readonly maxlength="100" data-bs-toggle="tooltip" data-bs-placement="top" title="No puedes editar este campo"><?= $obj->descripcion ?></textarea>
						</div>
						<div class="col-sm-3">
							<label>Categoría</label>
							<div id="id_categoria">
								<select name="id_categoria" id="id_categoria" class="form-control form-select" data-bs-toggle="tooltip" data-bs-placement="top" title="No puedes editar este campo">
									<option value="<?= $obj->id_categoria ?>" selected><?= $obj->categoria ?></option>
									<option value="1" disabled>Electrónica</option>
									<option value="2" disabled>Línea Blanca</option>
									<option value="3" disabled>Deportes</option>
									<option value="4" disabled>Alimentos</option>
									<option value="5" disabled>Jardín</option>
								</select>
							</div>
						</div>
						<div class="col-sm-3">
							<label>Sucursal</label>
							<div id="id_sucursal">
								<select name="id_sucursal" id="id_sucursal" class="form-control form-select" readonly data-bs-toggle="tooltip" data-bs-placement="top" title="No puedes editar este campo">
									<option value="<?= $obj->id_sucursal ?>" selected><?= $obj->sucursal ?></option>
									<option value="1" disabled>Cuernavaca</option>
									<option value="2" disabled>Yautepec</option>
									<option value="3" disabled>Cuautla</option>
									<option value="4" disabled>Acapulco</option>
								</select>
							</div>
						</div>
						<div class="col-sm-3">
							<label>Precio</label>
							<input type="number" name="precio" id="precio" class="form-control" value="<?= $obj->precio ?>" readonly min="0" max="99999" data-bs-toggle="tooltip" data-bs-placement="top" title="No puedes editar este campo">
						</div>
						<div class="col-sm-3">
							<label>Fecha de compra</label>
							<input type="datetime-local" value="<?= $obj->fecha_compra ?>" id="fecha_compra" name="fecha_compra" class="form-control" readonly data-bs-toggle="tooltip" data-bs-placement="top" title="No puedes editar este campo">
						</div>
						<div class="col-sm-3">
							<label>Estado</label>
							<div id="estado">
								<select name="estado" id="estado" class="form-control form-select" required data-bs-toggle="tooltip" data-bs-placement="top" title="Selecciona el estado">
									<option value="<?= $obj->estado ?>" selected><?= $obj->estado ?></option>
									<option value="Abierto">Abierto</option>
									<option value="Cerrado">Cerrado</option>
								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<label>Comentarios</label>
							<textarea type="text" name="comentarios" id="comentarios" placeholder="Agrega comentarios" class="form-control" required maxlength="100" data-bs-toggle="tooltip" data-bs-placement="top" title="Máximo 100 caracteres"><?= $obj->comentarios ?></textarea>
						</div>
						<div align="center">
							<a href="./?/bandeja">
								<input type="button" id="cancelar" value="Cancelar" class="btn btn-danger">
							</a>
							<input type="submit" name="agregar" value="Guardar cambios" class="btn btn-success">
						</div>
				</form>
			</div>
		</div>
	</div>
</div>