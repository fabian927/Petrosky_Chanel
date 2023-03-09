<?php
    require("conexion.php");
    $conn = conectar();    
    if ($conn->connect_error) echo ("No se pudo conectar a la bd");

    $nombre = $_POST["nombre"];
    $nacionalidad = $_POST["nacionalidad"];
    $url_foto = $_POST["url_foto"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];

    if($nombre == "" or $nacionalidad == "" or $fecha_nacimiento == "" )
        header("Location: IngresarDirector.php");    

    $query = "insert into directores (nombre, nacionalidad,url_foto,fecha_nacimiento) values ('$nombre', '$nacionalidad', '$url_foto','$fecha_nacimiento')"; 
    $resultado = $conn->query($query);
    if(!$resultado) echo 'algo salio mal';
    header("Location:IngresarDirector.php");
?>