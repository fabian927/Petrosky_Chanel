<?php
    require("conexion.php");
    $conn = conectar();    
    if ($conn->connect_error) echo ("No se pudo conectar a la bd");

    $actor_id = $_POST["actor_id"];
    $pelicula_id = $_POST["pelicula_id"];
    $papel = $_POST["papel"];
    $personaje = $_POST["personaje"];        
    $costo = $_POST["costo"];

    if($actor_id == "" or $pelicula_id == "" or $papel == "" )
        header("Location: IngresarActores_Peliculas.php");    

    $query = "insert into actores_peliculas (actor_id, pelicula_id, papel, personaje, costo) 
    values ('$actor_id', '$pelicula_id', '$papel', '$personaje', '$costo')"; 
    
    $resultado = $conn->query($query);

    if(!$resultado) echo 'algo salio mal';
    header("Location:IngresarActores_Peliculas.php");
?>