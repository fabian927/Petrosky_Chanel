<?php
    if($_POST["opcionCancelar"])
        header("Location: ingresarGeneros.php");
    else 
    {
        require("conexion.php");
        $conn = conectar();
        $id = $_POST["id"];
        $Nombre = $_POST["Nombre"];
        $Activo = $_POST["Activo"];
        

        $query = "update generos set Nombre='$Nombre', Activo='$Activo' where id=$id";
        $conn->query($query);

        header("Location: IngresarGeneros.php");
        
    }
?>