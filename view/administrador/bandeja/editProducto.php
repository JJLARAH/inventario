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
							<input type="text" name="nombre" id="nombre" value="<?= $obj->nombre ?>" class="form-control" required maxlength="30" data-bs-toggle="tooltip" data-bs-placement="top" title="Debe tener máximo 30 caracteres">
						</div>
						<div class="col-sm-6">
							<label>Descripción</label>
							<textarea type="text" name="descripcion" id="descripcion" value="<?= $obj->descripcion ?>" class="form-control" required maxlength="100" data-bs-toggle="tooltip" data-bs-placement="top" title="Máximo 100 caracteres"><?= $obj->descripcion ?></textarea>
						</div>
						<div class="col-sm-3">
							<label>Categoría</label>
							<div id="id_categoria">
								<select name="id_categoria" id="id_categoria" class="form-control form-select" required>
									<option value="<?= $obj->id_categoria ?>" selected><?= $obj->id_categoria ?></option>
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
									<option value="<?= $obj->id_sucursal ?>" selected><?= $obj->id_sucursal ?></option>
									<option value="1">Cuernavaca</option>
									<option value="2">Yautepec</option>
									<option value="3">Cuautla</option>
									<option value="4">Acapulco</option>
								</select>
							</div>
						</div>
						<div class="col-sm-3">
							<label>Precio</label>
							<input type="number" name="precio" id="precio" class="form-control" value="<?= $obj->precio ?>" required min="0" max="99999" data-bs-toggle="tooltip" data-bs-placement="top" title="Máximo 5 caracteres">
						</div>
						<div class="col-sm-3">
							<label>Fecha de compra</label>
							<input type="datetime-local" value="<?= $obj->fecha_compra ?>" id="fecha_compra" name="fecha_compra" class="form-control">
						</div>
						<div class="col-sm-3">
							<label>Estado</label>
							<div id="estado">
								<select name="estado" id="estado" class="form-control form-select" required>
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