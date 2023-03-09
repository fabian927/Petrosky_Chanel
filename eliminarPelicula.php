<?php
    require("conexion.php");
    $conn = conectar();

    $id = $_POST["id"];
    $query = "delete from peliculas where id=$id";

    $conn->query($query);

    header("Location: IngresarPeliculas.php");
?>