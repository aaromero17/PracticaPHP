<?php

require_once("model/conexion.php");
$base=Conectar::conexion();

//paginacion-----------------------------------------------------------------------------------------------

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
$sql_total="select * FROM datos_usuarios";
$resultado=$base->prepare($sql_total);
$resultado->execute(array());
$numFilas=$resultado->rowCount();//cuenta el nro de registros
$totalPaginas=ceil($numFilas/$intervalo);//total de paginas

//---------------------------------------------------------------------------------------------------------





$registros=$base->query("select * from DATOS_USUARIOS limit $empezarDesde,$intervalo")->fetchAll(PDO::FETCH_OBJ);



?>
