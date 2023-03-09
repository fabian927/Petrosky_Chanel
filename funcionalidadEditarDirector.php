<?php
    if($_POST["opcionCancelar"])
        header("Location: ingresarDirector.php");
    else 
    {
        require("conexion.php");
        $conn = conectar();
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $nacionalidad = $_POST["nacionalidad"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];
        $url_foto = $_POST["url_foto"];

        $query = "update directores set nombre='$nombre', nacionalidad='$nacionalidad', fecha_nacimiento='$fecha_nacimiento', url_foto= '$url_foto' where id=$id";
        $conn->query($query);

        header("Location: IngresarDirector.php");
        
    }
?>