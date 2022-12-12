<?php
session_start();

include_once 'app/funciones.php';
include_once 'app/acciones.php';
include_once 'app/AccesoDatos.php';

$base = AccesoDatos::getModelo();
$clientesTotal = $base->getNumClientes();
$filas = 10;


if (!isset($_SESSION['inicio'])) {
    $_SESSION['inicio'] = 0;
}
$desde = $_SESSION['inicio'];


if ($clientesTotal % $filas == 0) {
    $final = $clientesTotal - $filas;
} else {
    $final = $clientesTotal - ($clientesTotal % $filas);
}


// Div con contenido
$contenido = "";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['orden'])) {
        switch ($_GET['orden']) {
            case "Nuevo":
                accionAlta();
                break;
            case "Borrar":
                accionBorrar($_GET['id']);
                break;
            case "Modificar":
                accionModificar($_GET['id']);
                break;
            case "Detalles":
                accionDetalles($_GET['id']);
                break;
            case "Primero":
                $desde = 0;
                break;
            case "Anterior":
                $desde = $desde - $filas;
                if ($desde < 0) {
                    $desde = 0;
                }
                break;
            case "Siguiente":
                $desde = $desde + $filas;
                if ($desde > $final) {
                    $desde = $final;
                }
                break;
            case "Ultimo":
                $desde = $final;
                break;
            case "Terminar":
                accionTerminar();
                break;
        }
    }
    // POST Formulario de alta o de modificación
    else {
        if(isset($_POST['orden'])){
            switch($_POST['orden']){
                case "Nuevo":
                    accionAlta();
                    break;
                case "Modificar":
                    accionModificar($_POST['id']);
                    break;
            }
        }
    }
}

$_SESSION['inicio'] = $desde;

$contenido .= mostrarDatos($desde, $filas);
include_once "app/layout/principal.php";