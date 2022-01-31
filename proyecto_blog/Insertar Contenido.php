<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2 style="text-align: center">Blog</h2>
    <hr>
    <br>
    <br>
<?php
    $miconexion=mysqli_connect("localhost","root","","bbddblog");
    /*Comrrobar <conexion></conexion*/
    if (!$miconexion){
        echo "La conexion a fallado";
        exit();
    }

    if($_FILES["imagen"]["error"]){
        switch($_FILES["imagen"]["error"]){
            case 1: //error de tamaño
                echo "error de tamaño de archivo maximo permitido por el servidor";
                break;
            
            case 2:
                echo "error de tamaño de archivo maximo permitido por la aplicacion";
                break;
            
            case 3:
                echo "error de carga completa del archivo";    
                break;

            case 4:
                echo "No se a subido la imagen";
                break;
            
            
        }
    }else{
        echo "Imagen subida correctamente <br>";
        
        

        if((isset($_FILES["imagen"]["name"]) && ($_FILES["imagen"]["error"]==UPLOAD_ERR_OK))){
            $destino_de_ruta="imagenes/";
            move_uploaded_file($_FILES["imagen"]["tmp_name"],$destino_de_ruta . $_FILES["imagen"]["name"]);
            echo "El archivo ". $_FILES["imagen"]["name"]. " se a copiado en la base de datos";
            

        }else{
            echo "El archivo no se a podido copiar al directorio de imagenes";
            



        }
        
    }
    $titulo=$_POST["campo_titulo"];
    $comentarios=$_POST["area_comentarios"];
    $imagen=$_FILES["imagen"]["name"];            
    $fecha=date("y-m-d H:i:s");           
    $miconsulta="insert into contenido(TITULO,FECHA,COMENTARIO,IMAGEN) values('".$titulo."','".$fecha."','".$comentarios."','".$imagen."')";
    $resultado=mysqli_query($miconexion, $miconsulta);
    mysqli_close($miconexion);
    echo "<br> se ha agregado la entrada .<br><br>";


?>
<a href="Formulario.php">Insertar nuevo registro</a>
<br>
<a href="mostrarBlog.php">Mostrar  registros</a>
</body>
</html>