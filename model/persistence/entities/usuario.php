<?php

namespace persistence\entities;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model{
	public $timestamps = false;

	protected $table = 'usuarios';

	protected $primaryKey = 'id_usuario';

	protected $fillable =[
		"usuario",
		"contraseña",
		"perfil",
		"nombre",
		"apellido_paterno",
		"apellido_materno",
		"acceso",
		"fecha_registro"
	];

	public function toString(){
		return $this->usuario;
	}
}

?>