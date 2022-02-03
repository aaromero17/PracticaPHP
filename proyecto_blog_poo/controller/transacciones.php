<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include_once ("../model/objetoBlog.php");
include_once("../model/manejoObjetos.php");

try{
    $miconexion=new PDO("mysql:host=localhost; dbname=bbddblog","root","");
    $miconexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);



   

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
            $destino_de_ruta="../imagenes/";
            move_uploaded_file($_FILES["imagen"]["tmp_name"],$destino_de_ruta . $_FILES["imagen"]["name"]);
            echo "El archivo ". $_FILES["imagen"]["name"]. " se a copiado en la base de datos";
            

        }else{
            echo "El archivo no se a podido copiar al directorio de imagenes";
            



        }
        
    }

$manejoObeto= new manejoObjetos($miconexion);
$blog=new ObjetoBlog;

$blog->setTitulo(htmlentities(addslashes($_POST["campo_titulo"]), ENT_QUOTES));
$blog->setFecha(date("Y-m-d H:i:s"));
$blog->setComentario(htmlentities(addslashes($_POST["area_comentarios"]), ENT_QUOTES));
$blog->setImagen($_FILES["imagen"]["name"]);
$manejoObeto->setContenido($blog);
echo "<br> Entrada de blog agregada con exito<br>";






}catch(Exception $e){
    die( "Error: ". $e->getMessage());


}
   


?>
</body>
</html>