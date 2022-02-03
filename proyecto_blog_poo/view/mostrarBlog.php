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
     include ("../model/manejoObjetos.php");
     
     
     
     
     try{
        $miconexion=new PDO("mysql:host=localhost; dbname=bbddblog","root","");
        $miconexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $manejoObjeto = new manejoObjetos($miconexion);
        $tablaBlog=$manejoObjeto->getContenidoPorFecha();
        if(empty($tablaBlog)){
            echo "No hay entradas de Blog aun <br><br>";

        }else{
            foreach ($tablaBlog as $valor){
                
                echo "<h3>". $valor->getTitulo(). "</h3>";
                echo "<h4>". $valor->getFecha(). "</h4>";
                echo "<div style='width:400px'>";
                echo $valor->getComentario(). "</div>";
                if($valor->getImagen()!=""){
                    echo "<img src='../imagenes/";
                    echo $valor->getImagen()."'width=300px'height='200px'/>";

                }

                echo "<hr>";



            }
        }
    

     }catch(Exception $e){
        die( "Error: ". $e->getMessage());

     }
     
?>
<a href="Formulario.php">Volver al Formulario</a>
</body>
</html>