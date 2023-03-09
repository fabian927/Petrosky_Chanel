<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Peliculas Chidas</title>
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

            </ul>
        </nav>
        <div class="contenedor_logo">
            <img class="logo_colegio" src="img/directorDeCine.webp" alt="logo_colegio"/>
        </div>
    </header>
    <main>
        <section class="contenedor_editar">
            <section class="contenedor_formulario">
                <form action="funcionalidadInsertarPeliculas.php" method="post">
                   
                    <div class="contenedor_form_header">
                        <h2 class="form_header">Peliculas</h2>
                    </div>
                    <div class="contenedor_form_body">
                        <div class="contenedor_input">
                            <label for="nombre">Titulo</label>

                            <input id="nombre" name="titulo" type="text" class="contenedor_input">
                        </div>
                        <div class="contenedor_input">
                            <label for="sipnosis">Sipnosis</label>
                            <textarea name="sipnosis" id="descripcion" cols="30" rows="10"></textarea>

                            
                        </div>
 
                        <div class="contenedor_input">
                            <label for="proveedor_id">Puntaje_imd</label>
                            <input type="number" step="any" name="puntaje_imd" class="contenedor_input">

                            
                        </div>
                        <div class="contenedor_input">
                            <label for="portada">Portada</label>
                            <input name="portada" type="url" />

                            
                        </div> 
                        
                        <div class="contenedor_input">
                            <label for="director_id">Director</label>
                            <select name="director_id" id="director_id">
                                <option value="">seleccionar</option>

                                <?php
                                require("conexion.php");
                                $conn = conectar();
                                $query = "select * from directores";
                                
                                $resultado = $conn->query($query);

                                $n_reg = $resultado->num_rows;

                          
                                for($j = 0; $j < $n_reg; ++$j)
                                {
                                    $resultado->data_seek($j);
                                   
                                    $registro = $resultado->fetch_assoc();
                                    echo '<option value="'.$registro["id"].'">'.$registro["nombre"].'</option>';
                                
                                }
                                ?>
                                
                            </select>
                            
                        </div> 
                        <div class="contenedor_input">
                                <input type="submit"value="Ingresar">
                        </div> 
                    </div>
                </form>
                <section class="contenedor_tabla">
                    <table class="tabla_datos">
                        <thead class="head_tabla_datos">
                            <tr>
                                <th>Titulo</th>
                                <th>Sipnosis</th>
                                <th>Puntaje_imd</th>
                                <th>Portada</th>
                                <th>Director</th>
                                <th>Opciones</th>
                                
                            </tr>
                        </thead>
                        <tbody class="body_tabla_datos">

                        <?php

                                $query = "SELECT p.*, d.nombre as director
                                         FROM peliculas p
                                         JOIN directores d
                                         ON p.director_id = d.id;";
                                
                                $resultado = $conn->query($query);

                                $n_reg = $resultado->num_rows;

                          
                                for($j = 0; $j < $n_reg; ++$j)
                                {
                                    $resultado->data_seek($j);
                                   
                                    $registro = $resultado->fetch_assoc();
                                                               
                                    echo '<tr>';
                                    echo '<td>'.$registro["titulo"].'</td>';
                                    echo '<td>'.$registro["sipnosis"].'</td>';
                                    echo '<td>'.$registro["puntaje_imd"].'</td>';
                                    echo '<td><img src="'.$registro["portada"].'" width="50px" height="50px" ></td>';
                                    echo '<td>'.$registro["director"].'</td>';
                                    echo '<td class="tabla_opciones">
                                    <a href="editarPeliculas.php?id='.$registro["id"].'">Editar</a> 
                                    <form method="post" action="eliminarPelicula.php">
                                            <input  name="id" type="hidden" value="'.$registro["id"].'">
                                                <button type="submit">Eliminar</button>
                                     </form>
                                     </td>';
                                    echo '<tr>';
                                  
                                }
                                                          
                            ?>
                            
                        </tbody>
                    </table>
                </section>
            </section>
        </section>        
    </main>
</body>
</html>