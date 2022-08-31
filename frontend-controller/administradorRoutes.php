<?php

/* Contador de ruta */
$ruta = count($data) <= 1 ? $ruta = "" : $ruta = $data[1];
/* Listado de casos a enrutar */
switch ($ruta) {
    case "bandeja":
        require_once("../../frontend-controller/bandejaRoute.php");
        break;
    default:
        require_once '../../view/static/clockMenu.php';
        break;
}
