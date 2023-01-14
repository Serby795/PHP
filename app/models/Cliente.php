<?php
class Cliente
{

    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $gender;
    private $ip_address;
    private $telefono;



    function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }

    function &__get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }

    function obtenerFoto()
    {
        $codigoFoto = sprintf("%'.08d\n", $this->id);
        $directorio = "app/uploads";
        $enlace = "https://robohash.org/";
        if (file_exists($directorio . $codigoFoto . ".jpg")) {
            $foto = $directorio . $codigoFoto . ".jpg";
        } else {
            $foto = $enlace . $codigoFoto;
        }
        return $foto;
    }
    
    //Obtener codigo de pais por ip
    function obtenerCodigo()
    {
        $info = file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $this->ip_address);
        $consulta = json_decode($info);
        return strtolower($consulta->geoplugin_countryCode);
    }
    
    
    //Obtener nombre de pais por ip
    function obtenerPais()
    {
        $info = file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $this->ip_address);
        $consulta = json_decode($info);
        return $consulta->geoplugin_countryName;
    }
}
