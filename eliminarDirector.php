<?php
    require("conexion.php");
    $conn = conectar();

    $id = $_POST["id"];
    $query = "SELECT COUNT(*) as cantidad FROM peliculas WHERE director_id=$id";
    $resultado = $conn->query($query);
    $registro = $resultado->fetch_assoc();

    if ($registro["cantidad"] ==0) {
        $query = "delete from directores where id=$id";
        $conn->query($query);
        header("Location: IngresarDirector.php");
    }else {
        echo "Tiene ".$registro["cantidad"]." peliculas";
    }

   
?>