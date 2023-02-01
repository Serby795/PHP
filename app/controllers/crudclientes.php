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

    if(!comprobarEmail($_POST['first_name'],$_POST['email'])){

        
        $cli->id            = $_POST['id'];
        $cli->first_name    = $_POST['first_name'];
        $cli->last_name     = $_POST['last_name'];
        $cli->email         = $_POST['email'];
        $cli->gender        = $_POST['gender'];
        $cli->ip_address    = $_POST['ip_address'];
        $cli->telefono      = $_POST['telefono'];
        $db = AccesoDatos::getModelo();
        $db->modCliente($cli);
    } else{
        $error = "E-mail repetido";
        include_once "app/views/error.php";
        exit();
    }
}

//Obtener codigo de pais por ip



//Generar el pdf
function generarPDF($id) {
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);
    include_once "app/views/generarpdf.php";
}


//login con md5
function logIn($user,$password){
    $encryptPass = md5($password,false);
    $db = AccesoDatos::getModelo();
    if ($db->checkLogIn($user,$encryptPass)){
        return true;
    } else{
        return false;
    }
}

//Obtener el usuario
function obtenerUserName($user){
    $db = AccesoDatos::getModelo();
    $user = $db->getUser($user);
    $userName = $user->user;
    return $userName;
}

//Obtener el rol
function obtenerRol($user){
    $db = AccesoDatos::getModelo();
    $user = $db->getUser($user);
    $rol = $user->rol;
    return $rol;
}


//Comprobar email
function comprobarEmail($nombre,$email){
    $db = AccesoDatos::getModelo();
    $repetido = $db->emailRepetido($nombre,$email);
    if($repetido){
        return true;
    }else{
        return false;
    }
}