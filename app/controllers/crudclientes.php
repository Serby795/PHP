<?php

function crudBorrar($id)
{
    $db = AccesoDatos::getModelo();
    $tuser = $db->borrarCliente($id);
}

function crudTerminar()
{
    AccesoDatos::closeModelo();
    session_destroy();
}

function crudAlta()
{
    $cli = new Cliente();
    $orden = "Nuevo";
    include_once "app/views/formulario.php";
}

function crudDetalles($id)
{
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);
    include_once "app/views/detalles.php";
}


function crudDetallesSiguiente($id)
{
    $db = AccesoDatos::getModelo();
    $maxId = $db->getUltimoId();
    if ($id == $maxId) {
        $cli = $db->getCliente($id);
    } else {
        $id++;
        if ($db->comprobarId($id) == false) {
            do {
                $id++;
            } while ($db->comprobarId($id) == false);
        }
        $cli = $db->getCliente($id);
    }
    include_once "app/views/detalles.php";
}

function crudDetallesAnterior($id)
{
    $db = AccesoDatos::getModelo();
    $minId = $db->getPrimerId();
    if ($id == $minId) {
        $cli = $db->getCliente($id);
    } else {
        $id--;
        if ($db->comprobarId($id) == false) {
            do {
                $id--;
            } while ($db->comprobarId($id) == false);
        }
        $cli = $db->getCliente($id);
    }
    include_once "app/views/detalles.php";
}


function crudModificar($id)
{
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);
    $orden = "Modificar";
    include_once "app/views/formulario.php";
}

function crudModificarSiguiente($id)
{
    $db = AccesoDatos::getModelo();
    $maxId = $db->getUltimoId();
    if ($id == $maxId) {
        $cli = $db->getCliente($id);
    } else {
        $id++;
        if ($db->comprobarId($id) == false) {
            do {
                $id++;
            } while ($db->comprobarId($id) == false);
        }
        $cli = $db->getCliente($id);
    }
    $orden = "Modificar";
    include_once "app/views/formulario.php";
}

function crudModificarAnterior($id)
{
    $db = AccesoDatos::getModelo();
    $minId = $db->getPrimerId();
    if ($id == $minId) {
        $cli = $db->getCliente($id);
    } else {
        $id--;
        if ($db->comprobarId($id) == false) {
            do {
                $id--;
            } while ($db->comprobarId($id) == false);
        }
        $cli = $db->getCliente($id);
    }
    $orden = "Modificar";
    include_once "app/views/formulario.php";
}

function crudPostAlta()
{
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $cli = new Cliente();
    $cli->id            = $_POST['id'];
    $cli->first_name    = $_POST['first_name'];
    $cli->last_name     = $_POST['last_name'];
    $cli->email         = $_POST['email'];
    $cli->gender        = $_POST['gender'];
    $cli->ip_address    = $_POST['ip_address'];
    $cli->telefono      = $_POST['telefono'];
    $db = AccesoDatos::getModelo();
    $db->addCliente($cli);
}

function crudPostModificar()
{
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $cli = new Cliente();

    $cli->id            = $_POST['id'];
    $cli->first_name    = $_POST['first_name'];
    $cli->last_name     = $_POST['last_name'];
    $cli->email         = $_POST['email'];
    $cli->gender        = $_POST['gender'];
    $cli->ip_address    = $_POST['ip_address'];
    $cli->telefono      = $_POST['telefono'];
    $db = AccesoDatos::getModelo();
    $db->modCliente($cli);
}

//Obtener codigo de pais por ip
function obtenerCodigo($ip)
{
    $info = file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip);
    $consulta = json_decode($info);
    return $consulta->geoplugin_countryCode;
}
//Obtener nombre de pais por ip
function obtenerPais($ip)
{
    $info = file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip);
    $consulta = json_decode($info);
    return $consulta->geoplugin_countryName;
}


//Generar el pdf
function generarPDF($id) {
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);
    include_once "app/views/generarpdf.php";
}

//Obtener la foto
function getFoto($id){
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);
    $codigoFoto = sprintf("%'.08d\n", $cli->id);
    $directorio ="app/uploads";
    $enlace = "https://robohash.org/";
    if (file_exists($directorio.$codigoFoto.".jpg")){
        $foto = $directorio.$codigoFoto.".jpg";
    } else {
        $foto = $enlace.$codigoFoto;
    }
    return $foto;
}
