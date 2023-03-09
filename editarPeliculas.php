<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar_Pelicula</title>
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
            <form action="funcionalidadEditarPeliculas.php" method="post">

                    <?php
                        require("conexion.php");
                        $conn = conectar();
                        $id = $_GET["id"];
                        $query = "select * from peliculas where id=$id";
                        $resultado = $conn->query($query);
                        $registro = $resultado->fetch_assoc();
                    ?>
               
                <div class="contenedor_form_header">
                    <h2 class="form_header">Editar Peliculas</h2>
                </div>
                <div class="contenedor_form_body">
                <?php 
                                $id = $registro["id"];
                                echo '<input id="id" type="hidden" name="id" value="'.$id.'" readonly>';
                            ?>



                    <div class="contenedor_input">
                        <label for="nombre">titulo</label>
                        <?php
                                $titulo = $registro["titulo"];
                                echo '<input id="titulo" value="'.$titulo.'" name="titulo" type="text">';
                        ?>
                    </div>
                    <div class="contenedor_input">
                        <label for="sipnosis">sipnosis</label> <?php
                                $sipnosis = $registro["sipnosis"];
                                echo '<input id="sipnosis" value="'.$sipnosis.'" name="sipnosis" type="text">';
                        ?>

                        
                        
                    </div>
                    <div class="contenedor_input">
                        <label for="puntaje_imd">puntaje_imd</label>
                        <?php
                                $puntaje_imd = $registro["puntaje_imd"];
                                echo '<input id="puntaje_imd" value="'.$puntaje_imd.'" name="puntaje_imd" type="number">';
                        ?>


                        
                        
                    </div>  
                    <div class="contenedor_input">
                        <label for="portada">portada</label>
                        <?php
                                $portada = $registro["portada"];
                                echo '<input id="portada" value="'.$portada.'" name="portada" type="text">';
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