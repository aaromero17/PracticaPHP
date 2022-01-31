<?php

if($_post["nombre"]||$_post["apellido"]||$_post["email"]||$_post["comentarios"]){
    die();
}
    $texto_mail=$_POST["comentarios"];
    $destinatoario=$_POST["email"];
    $asunto=$_POST["asunto"];
    $headers="MIME=Version: 1.0\r\n";
    $headers.="Contetent-type: text/html; charset=iso-8859-1\r\n";
    $headers.="from Prueba Alex < aaromero17@gmail.com >\r\n";
    $exito=mail($destinatoario,$asunto,$texto_mail,$headers);

    if($exito){
        echo "Mensaje enviado";

    }else{
        echo "Error en el envio";

    }





?>