<?php 
    include "cabecera.php";
    include "conexion.php";

    if($_POST){
        $nombre=$_POST["nombre"];
    $objConexion=new Conexion;
    $sql="INSERT INTO `contenido` (`ID`, `NOMBRE`, `DESCRIPCION`, `IMAGEN`) VALUES ('', '$nombre', 'proyecto nuevo', 'foto.jpg')";
    $objConexion->ejecutar($sql);    
    }

    $objConexion=new Conexion;
    $proyectos= $objConexion->consulta("SELECT * FROM `contenido`");
    ?>

   
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                        <div class="card">
                    <div class="card-header">
                        Datos del proyecto
                    </div>
                    <div class="card-body">
                        <form action="portafolio.php" method="post" enctype="multipart/form-data">
                            Nombre del proyecto: <input class="form-control" type="text" name="nombre" id="">
                            <br>
                            Nombre del proyecto: <input class="form-control" type="file" name="archivo" id="">
                            <br>
                            <input class="btn btn-success" type="submit" value="Enviar proyecto">
                            
                                
                        </form>
                    
                    
                        
                    </div>
                </div>
                    
                </div>
                <div class="col-md-6">
                            <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre del Proyecto</th>
                            <th>Imagen</th>
                            <th>Descripcion</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($proyectos as $proyecto){ ?>
                        <td><?php echo $proyecto["ID" ]?></td>
                        <td><?php echo $proyecto["NOMBRE" ]?></td>
                        <td><?php echo $proyecto["IMAGEN" ]?></td>
                        <td><?php echo $proyecto["DESCRIPCION" ]?></td>
                        <tr>
                           
                        </tr>
                        
                        <?php }?>
                    
                    </tbody>
                </table>
                    
                    </div>
                
            </div>
        </div>
        
    
        



    

     
<?php include "pie.php";?>