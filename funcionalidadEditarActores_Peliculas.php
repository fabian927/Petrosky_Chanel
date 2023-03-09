<?php
    if($_POST["opcionCancelar"])
        header("Location: ingresarActores_Peliculas.php");
    else 
    {
        require("conexion.php");
        $conn = conectar();
        $id = $_POST["id"];
        $actor_id = $_POST["actor_id"];
        $pelicula_id = $_POST["pelicula_id"];
        $papel = $_POST["papel"];
        $personaje = $_POST["personaje"];        
        $costo = $_POST["costo"];

        $query = "update actores_peliculas set actor_id='$actor_id', pelicula_id='$pelicula_id', papel='$papel', personaje='$personaje', costo= '$costo' where id=$id";
        $conn->query($query);

        header("Location: IngresarActores_Peliculas.php");
        
    }
?> 