<?php
    require("conexion.php");
    $conn = conectar();

    $id = $_POST["id"];
    $query = "delete from generos where id=$id";

    $conn->query($query);

    header("Location: IngresarGeneros.php");
?>