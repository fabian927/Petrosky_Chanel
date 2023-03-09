<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion actores y peliculas</title>
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
    <main>
        <section class="contenedor_editar">
            <section class="contenedor_formulario">
                <form action="funcionalidadInsertarActores_Peliculas.php" method="post">
                   
                    <div class="contenedor_form_header">
                        <h2 class="form_header">Actores</h2>
                    </div>
                    <div class="contenedor_form_body">
                        <div class="contenedor_input">

                        <label for="actor_id">Actor_id</label>
                            <select name="actor_id" id="actor_id">
                                <option value="">seleccionar</option>

                                <?php
                                require("conexion.php");
                                $conn = conectar();
                                $query = "select * from actores";
                                
                                $resultado = $conn->query($query);

                                $n_reg = $resultado->num_rows;

                          
                                for($j = 0; $j < $n_reg; ++$j)
                                {
                                    $resultado->data_seek($j);
                                   
                                    $registro = $resultado->fetch_assoc();
                                    echo '<option value="'.$registro["id"].'">'.$registro["Nombre"].' '.$registro["Apellido"].'</option>';
                                
                                }
                                ?>
                                
                            </select>
                            
                        </div>
                        <div class="contenedor_input">
                        <label for="pelicula_id">Pelicula_id</label>
                            <select name="pelicula_id" id="pelicula_id">
                                <option value="">seleccionar</option>

                                <?php
                                
                                $query = "select * from peliculas";
                                
                                $resultado = $conn->query($query);

                                $n_reg = $resultado->num_rows;

                          
                                for($j = 0; $j < $n_reg; ++$j)
                                {
                                    $resultado->data_seek($j);
                                   
                                    $registro = $resultado->fetch_assoc();
                                    echo '<option value="'.$registro["id"].'">'.$registro["titulo"].'</option>';
                                
                                }
                                ?>
                                
                            </select>                            
                        </div>
 
                        <div class="contenedor_input">
                            <label for="papel">Papel</label>
                            <input type="text"  name="papel" class="contenedor_input">

                            
                        </div>
                        <div class="contenedor_input">
                            <label for="personaje">Personaje</label>
                            <input id="personaje" name="personaje" type="text" class="contenedor_input">


                            
                        </div> 
                        
                        <div class="contenedor_input">
                            <label for="costo">Costo</label>
                            <input id="costo" name="costo" type="text" class="contenedor_input">


                            
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
                                <th>Actor_id</th>
                                <th>Pelicula_id</th>
                                <th>Papel</th>
                                <th>Personaje</th>
                                <th>Costo</th>
                                <th>Opciones</th>
                                
                            </tr>
                        </thead>
                        <tbody class="body_tabla_datos">

                        <?php
                                 
                                $query = "select * from actores_peliculas";
                                
                                $resultado = $conn->query($query);

                                $n_reg = $resultado->num_rows;

                          
                                for($j = 0; $j < $n_reg; ++$j)
                                {
                                    $resultado->data_seek($j);
                                   
                                    $registro = $resultado->fetch_assoc();
                                                               
                                    echo '<tr>';
                                    echo '<td>'.$registro["actor_id"].'</td>';
                                    echo '<td>'.$registro["pelicula_id"].'</td>';
                                    echo '<td>'.$registro["papel"].'</td>';
                                    echo '<td>'.$registro["personaje"].'</td>';
                                    echo '<td>'.$registro["costo"].'</td>';
                                    echo '<td class="tabla_opciones">
                                    <a href="editarActores_Peliculas.php?id='.$registro["id"].'">Editar</a> 
                                    <form method="post" action="eliminarActores_Peliculas.php">
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