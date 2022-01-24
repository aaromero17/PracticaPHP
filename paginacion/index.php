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

try{
    $base=new PDO("mysql:host=localhost;dbname=prueba","root","");
    $base->setAttribute(pdo::ATTR_ERRMODE,pdo::ERRMODE_EXCEPTION);
    $base->exec("SET CHARACTER SET utf8");
    $intervalo=3;//tamaño de la paginacion
    
    if(isset($_GET["pagina"])){  
    
        if($_GET["pagina"]==1){

            header("location:index.php");
        }else{
            $pagina=$_GET["pagina"];

        }
    }else{
        $pagina=1;//$pagina es donde se esta la primera vez que se carga el programa
    }


    $empezarDesde=($pagina-1)*$intervalo;
    $sql_total="select NOMBREARTICULO, SECCION, PRECIO, PAISDEORIGEN FROM artículos WHERE SECCION='DEPORTE'";
    $resultado=$base->prepare($sql_total);
    $resultado->execute(array());
    $numFilas=$resultado->rowCount();//cuenta el nro de registros
    $totalPaginas=ceil($numFilas/$intervalo);//total de paginas
    echo "Numero de Registros: ". $numFilas. "<br>";
    echo "Mostramos ". $intervalo. " registros por pagina","<br>";
    echo "Mostrando la pagina ".$pagina." de ".$totalPaginas."<br>","<br>","<br>";


    $resultado->closeCursor();
    $sql_limite="select NOMBREARTICULO, SECCION, PRECIO, PAISDEORIGEN FROM artículos WHERE SECCION='DEPORTE' limit $empezarDesde,$intervalo";
    $resultado=$base->prepare($sql_limite);
    $resultado->execute(array());
    while($registro=$resultado->fetch(pdo::FETCH_ASSOC)){
        echo  " Nombre de Articulo: ". $registro["NOMBREARTICULO"] ." Seccion: ". $registro["SECCION"]." Precio: ". $registro["PRECIO"]." Pais de Origen: ". $registro["PAISDEORIGEN"]."<br>";

    }
}catch(Exception $e){
    echo "Linea de Error: ".$e->getLine();

}


for ($i=1;$i<=$totalPaginas;$i++){
    echo "<a href='?pagina=". $i . "'>". $i ."</a>  ";

}

?>
</body>
</html>