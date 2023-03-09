<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Peliculas</title>
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
                <form action="funcionalidadInsertarActor.php" method="post">
                   
                    <div class="contenedor_form_header">
                        <h2 class="form_header">Actores</h2>
                    </div>
                    <div class="contenedor_form_body">
                        <div class="contenedor_input">
                            <label for="Nombre">Nombre</label>

                            <input id="Nombre" name="Nombre" type="text" class="contenedor_input">
                        </div>
                        <div class="contenedor_input">
                            <label for="Apellido">Apellido</label>
                            <input id="Apellido" name="Apellido" type="text" class="contenedor_input">
                            
                        </div>
 
                        <div class="contenedor_input">
                            <label for="fecha_nacimiento">Fecha_nacimiento</label>
                            <input type="date"  name="fecha_nacimiento" class="contenedor_input">

                            
                        </div>
                        <div class="contenedor_input">
                            <label for="nacionalidad">Nacionalidad</label>
                            <input id="nacionalidad" name="nacionalidad" type="text" class="contenedor_input">


                            
                        </div> 
                        
                        <div class="contenedor_input">
                            <label for="altura">Altura</label>
                            <input id="altura" name="altura" type="number" step="any" class="contenedor_input">


                            
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
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Fecha_nacimiento</th>
                                <th>Nacionalidad</th>
                                <th>Altura</th>
                                <th>Opciones</th>
                                
                            </tr>
                        </thead>
                        <tbody class="body_tabla_datos">

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
                                                               
                                    echo '<tr>';
                                    echo '<td>'.$registro["Nombre"].'</td>';
                                    echo '<td>'.$registro["Apellido"].'</td>';
                                    echo '<td>'.$registro["fecha_nacimiento"].'</td>';
                                    echo '<td>'.$registro["nacionalidad"].'</td>';
                                    echo '<td>'.$registro["altura"].'</td>';
                                    echo '<td class="tabla_opciones">
                                    <a href="editarActores.php?id='.$registro["id"].'">Editar</a> 
                                    <form method="post" action="eliminarActor.php">
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