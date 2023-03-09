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
            <form action="funcionalidadInsertarGenero.php" method="post">
               
                <div class="contenedor_form_header">
                    <h2 class="form_header">IngresarGeneros</h2>
                </div>
                <div class="contenedor_form_body">
                    <div class="contenedor_input">
                        <label for="id">Nombre</label>
                        <input id="nombre" name="nombre" type="text" class="contenedor_input"placeholder="juan cuero">
                        
                    </div>
                    <div class="contenedor_input">
                        <label for="Activo">Activo</label>
                        <input id="Activo" name="Activo" type="checkbox" class="contenedor_input">

                    </div>
                                          
                    <div class="contenedor_input">
                        <div class="contenedor_botones_editar">
                            <input type="submit" name="opcionCancelar" value="Cancelar">    
                            <input type="submit" name="opcionActualizar" value="Ingresar">
                        </div>
                    </div> 
                </div>
            </form>
        </section>
    </section>
    <section class="contenedor_tabla">
        <table class="tabla_datos">
            <thead class="head_tabla_datos">
                <tr>
                    <th>Nombre</th>
                    <th>Activo</th>
                    <th>Opciones</th>                    
                </tr>
            </thead>
            <tbody class="body_tabla_datos">
                <?php
                                require("conexion.php");
                                $conn = conectar();
                                $query = "select * from generos";
                                
                                $resultado = $conn->query($query);

                                $n_reg = $resultado->num_rows;

                          
                                for($j = 0; $j < $n_reg; ++$j)
                                {
                                    $resultado->data_seek($j);
                                   
                                    $registro = $resultado->fetch_assoc();

 
                                                               
                                    echo '<tr>';
                                    echo '<td>'.$registro["Nombre"].'</td>';
                                   // <td>juan cuero</td>
                                    if($registro["Activo"]==1){
                                        echo '<td>si</td>';
                                    }
                                    else  {
                                        echo '<td>no</td>';
                                    }
                                   
                                    echo '<td class="tabla_opciones">
                                            <a href="editarGeneros.php?id='.$registro["id"].'">Editar</a> 
                                            <form method="post" action="eliminarGenero.php">
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
    
</body>
</html>