<?php
    if($_POST["opcionCancelar"])
        header("Location: ingresarActores.php");
    else 
    {
        require("conexion.php");
        $conn = conectar();
        $id = $_POST["id"];
        $Nombre = $_POST["Nombre"];
        $Apellido = $_POST["Apellido"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];
        $nacionalidad = $_POST["nacionalidad"];        
        $altura = $_POST["altura"];

        $query = "update actores set Nombre='$Nombre', Apellido='$Apellido', fecha_nacimiento='$fecha_nacimiento', nacionalidad='$nacionalidad', altura= '$altura' where id=$id";
        $conn->query($query);

        header("Location: IngresarActores.php");
        
    }
?>