<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar_Director</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
        <nav>
            <ul class="navegacion">
                <li class="navegacion__li"><a href="IngresarDirector.php">Directores</a></li>
                <li class="navegacion__li"><a href="IngresarGeneros.php">Generos</a></li>
                <li class="navegacion__li"><a href="IngresarPeliculas.php">Peliculas</a></li>
                <li class="navegacion__li"><a href="IngresarActores.php">Actores</a></li>
                <li class="navegacion__li"><a href="IngresarActores_Peliculas.php">Relacion</a></li>

            </ul>
        </nav>
        <div class="contenedor_logo">
            <img class="logo_colegio" src="img/directorDeCine.webp" alt="logo_colegio"/>
        </div>
    </header>

    <section class="contenedor_editar">
        <section class="contenedor_formulario">
            <form action="funcionalidadEditarActores.php" method="post">

                    <?php
                        require("conexion.php");
                        $conn = conectar();
                        $id = $_GET["id"];
                        $query = "select * from actores where id=$id";
                        $resultado = $conn->query($query);
                        $registro = $resultado->fetch_assoc();
                    ?>
               
                <div class="contenedor_form_header">
                    <h2 class="form_header">Editar</h2>
                </div>
                <div class="contenedor_form_body">
                <?php 
                                $id = $registro["id"];
                                echo '<input id="id" type="hidden" name="id" value="'.$id.'" readonly>';
                            ?>



                    <div class="contenedor_input">
                        <label for="nombre">Nombre</label>
                        <?php
                                $Nombre = $registro["Nombre"];
                                echo '<input id="Nombre" value="'.$Nombre.'" name="Nombre" type="text">';
                        ?>
                    </div>
                    <div class="contenedor_input">
                        <label for="Apellido">Apellido</label>
                        <?php
                                $Apellido = $registro["Apellido"];
                                echo '<input id="Apellido" value="'.$Apellido.'" name="Apellido" type="text">';
                        ?>
                    </div>

                    <div class="contenedor_input">
                        <label for="fecha_nacimiento">Fecha de nacimiento</label>
                        <?php
                                $fecha_nacimiento = $registro["fecha_nacimiento"];
                                echo '<input id="fecha_nacimiento" value="'.$fecha_nacimiento.'" name="fecha_nacimiento" type="date">';
                        ?>


                        
                        
                    </div>

                    <div class="contenedor_input">
                        <label for="nacionalidad">Nacionalidad</label> <?php
                                $nacionalidad = $registro["nacionalidad"];
                                echo '<input id="nacionalidad" value="'.$nacionalidad.'" name="nacionalidad" type="text">';
                        ?>

                        
                        
                    </div>
                     
                    <div class="contenedor_input">
                        <label for="altura">altura</label>
                        <?php
                                $altura = $registro["altura"];
                                echo '<input id="altura" value="'.$altura.'" name="altura" type="number" step="any">';
                        ?>

                       
                        
                    </div>
                                          
                    <div class="contenedor_input">
                        <div class="contenedor_botones_editar">
                            <input type="submit" name="opcionCancelar" value="Cancelar">    
                            <input type="submit" name="opcionActualizar" value="Editar">
                        </div>
                    </div> 
                </div>
            </form>
        </section>
    </section>
    
</body>
</html>