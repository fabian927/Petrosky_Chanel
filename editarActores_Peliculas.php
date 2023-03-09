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
            <form action="funcionalidadEditarActores_Peliculas.php" method="post">

                    <?php
                        require("conexion.php");
                        $conn = conectar();
                        $id = $_GET["id"];
                        $query = "select * from actores_peliculas where id=$id";
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
                        <label for="actor_id">Actor_id</label>
                        <?php
                                $actor_id = $registro["actor_id"];
                                echo '<input id="actor_id" value="'.$actor_id.'" name="actor_id" type="text">';
                        ?>
                    </div>
                    <div class="contenedor_input">
                        <label for="pelicula_id">Pelicula_id</label>
                        <?php
                                $pelicula_id = $registro["pelicula_id"];
                                echo '<input id="pelicula_id" value="'.$pelicula_id.'" name="pelicula_id" type="text">';
                        ?>
                    </div>

                    <div class="contenedor_input">
                        <label for="papel">Papel</label>
                        <?php
                                $papel = $registro["papel"];
                                echo '<input id="papel" value="'.$papel.'" name="papel" type="text">';
                        ?>
  
                    </div>

                    <div class="contenedor_input">
                        <label for="personaje">Personaje</label> <?php
                                $personaje = $registro["personaje"];
                                echo '<input id="personaje" value="'.$personaje.'" name="personaje" type="text">';
                        ?>

                    </div>
                     
                    <div class="contenedor_input">
                        <label for="costo">Costo</label>
                        <?php
                                $costo = $registro["costo"];
                                echo '<input id="costo" value="'.$costo.'" name="costo" type="number">';
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