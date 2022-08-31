<?php

namespace persistence\entities;

use Illuminate\Database\Eloquent\Model;

class bandeja extends Model{
	public $timestamps = false;

	protected $table = 'bandeja';

	protected $primaryKey = 'id_bandeja';

	protected $fillable =[
		"nombre",
		"categoria",
		"sucursal",
		"estado",
		"comentarios",
        "fecha_registro"
	];

	public function toString(){
		return $this->nombre;
	}
}

?>