<?php
    require("conexion.php");
    $conn = conectar();    
    if ($conn->connect_error) echo ("No se pudo conectar a la bd");

    $titulo = $_POST["titulo"];
    $sipnosis = $_POST["sipnosis"];
    $puntaje_imd = $_POST["puntaje_imd"];
    $portada = $_POST["portada"];
    $director_id = $_POST["director_id"];


    if($titulo == "" or $sipnosis == "" or $puntaje_imd == ""  or $director_id == ""){
        header("Location: IngresarPeliculas.php"); 
    }

    $query = "insert into peliculas (titulo, sipnosis, puntaje_imd, portada, director_id) values ('$titulo', '$sipnosis', $puntaje_imd,'$portada', $director_id)"; 
    $resultado = $conn->query($query);
    if(!$resultado) echo 'algo salio mal';
    header("Location: IngresarPeliculas.php");
?>
