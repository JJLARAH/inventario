<?php

namespace persistence\entities;

use Illuminate\Database\Eloquent\Model;

class productos extends Model{
	public $timestamps = false;

	protected $table = 'productos';

	protected $primaryKey = 'id_producto';

	protected $fillable =[
		"nombre",
		"descripcion",
		"categoria",
		"sucursal",
		"precio",
        "fecha_compra",
        "fecha_registro"
	];

	public function toString(){
		return $this->nombre;
	}
}

?>