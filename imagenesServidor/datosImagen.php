<?php
    //recibimos los datos de la imagen
    $nombre_imagen=$_FILES["imagen"]["name"];
    $nombre_tipo=$_FILES["imagen"]["type"];
    $nombre_tamano=$_FILES["imagen"]["size"];

    echo " $nombre_imagen"."<br>","<br>";

   
   
   
    
    if($nombre_tamano<=2000000){
    //ruta de la carpeta destino en el servidor   
    $carpeta_destino=$_SERVER["DOCUMENT_ROOT"]. "/intranet/descargas/";
    
    //movemos la imagen desde la carpera temporal a la carpeta definitiva
    move_uploaded_file($_FILES["imagen"]["tmp_name"], $carpeta_destino. $nombre_imagen);
    }
    
    else{
        echo "El tamaño demasiado grande";
    }

?>