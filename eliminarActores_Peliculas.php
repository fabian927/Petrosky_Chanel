<?php
    require("conexion.php");
    $conn = conectar();

    $id = $_POST["id"];
    $query = "delete from actores_peliculas where id=$id";

    $conn->query($query);

    header("Location: IngresarActores_Peliculas.php");
?>