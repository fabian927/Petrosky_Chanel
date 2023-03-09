<?php
    if($_POST["opcionCancelar"])
        header("Location: ingresarPeliculas.php");
    else 
    {
        require("conexion.php");
        $conn = conectar();
        $id = $_POST["id"];
        $titulo = $_POST["titulo"];
        $sipnosis = $_POST["sipnosis"];
        $puntaje_imd = $_POST["puntaje_imd"];
        $portada = $_POST["portada"];

        $query = "update peliculas set titulo='$titulo', sipnosis='$sipnosis', puntaje_imd='$puntaje_imd', portada='$portada' where id=$id";
        $conn->query($query);

        header("Location: IngresarPeliculas.php");
        
    }
?>