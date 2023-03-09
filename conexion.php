<?php
    function conectar()
    {
        $host  = "localhost";
        $usuario = "root";
        $password = "";
        $baseDatos = "teatro";
        $conn = new mysqli($host, $usuario, $password, $baseDatos);
        return $conn;
    }
?>