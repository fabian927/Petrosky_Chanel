<?php
    require("conexion.php");
    $conn = conectar();    
    if ($conn->connect_error) echo ("No se pudo conectar a la bd");

    $Nombre = $_POST["Nombre"];
    $Apellido = $_POST["Apellido"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $nacionalidad = $_POST["nacionalidad"];        
    $altura = $_POST["altura"];

    if($Nombre == "" or $Apellido == "" or $fecha_nacimiento == "" )
        header("Location: IngresarActor.php");    

    $query = "insert into actores (Nombre, Apellido, fecha_nacimiento, nacionalidad, altura) values ('$Nombre', '$Apellido', '$fecha_nacimiento', '$nacionalidad', '$altura')"; 
    $resultado = $conn->query($query);
    if(!$resultado) echo 'algo salio mal';
    header("Location:IngresarActores.php");
?>