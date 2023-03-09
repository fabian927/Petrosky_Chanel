<?php
    require("conexion.php");
    $conn = conectar();    
    if ($conn->connect_error) echo ("No se pudo conectar a la bd");

    $nombre = $_POST["nombre"];
    $activo = $_POST["activo"];

    if($nombre == "" or $activo == "" )
        header("Location: IngresarGeneros.php");    

    $query = "insert into generos (Nombre, Activo) values ('$nombre', '$activo')"; 
    $resultado = $conn->query($query);
    if(!$resultado) echo 'algo salio mal';
    header("Location: IngresarGeneros.php");
?>