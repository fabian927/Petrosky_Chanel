<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petrosky Chaneel</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
        <nav>
            <ul class="navegacion">
                <li class="navegacion__li"><a href="Directores.php">Directores</a></li>
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
                <form action="funcionalidadInsertarDirector.php" method="post">
                   
                    <div class="contenedor_form_header">
                        <h2 class="form_header">Director</h2>
                    </div>
                    <div class="contenedor_form_body">
                        <div class="contenedor_input">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" name="nombre" type="text" class="contenedor_input"placeholder="juan cuero">
                        </div>
                        <div class="contenedor_input">
                            <label for="descripcion">nacionalidad</label>
                            <input type="text" name="nacionalidad" class="contenedor_input" placeholder="Colombiano">

                            
                        </div>
 
                        <div class="contenedor_input">
                            <label for="proveedor_id">Url_Foto</label>
                            <input type="url" name="url_foto" class="contenedor_input" placeholder="img123.com">

                            
                        </div>
                        <div class="contenedor_input">
                            <label for="fecha_vencimiento">Fecha de Nacimiento</label>
                            <input name="fecha_nacimiento" type="date" />
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
                                <th>Nacionalidad</th>
                                <th>Foto</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Opciones</th>
                                
                            </tr>
                        </thead>
                        <tbody class="body_tabla_datos">

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
                                                               
                                    echo '<tr>';
                                    echo '<td>'.$registro["nombre"].'</td>';
                                    echo '<td>'.$registro["nacionalidad"].'</td>';
                                    echo '<td><img src="'.$registro["url_foto"].'" width="50px" height="50px" ></td>';
                                    echo '<td>'.$registro["fecha_nacimiento"].'</td>';
                                    echo '<td class="tabla_opciones"><a href="editarDirector.php?id='.$registro["id"].'">Editar</a>
                                    <form method="post" action="eliminarDirector.php">
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