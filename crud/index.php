<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>
<link rel="stylesheet" type="text/css" href="hoja.css">


</head>

<body>

<?php
include("conexion.php");
//misma conexion en 2 pasos
//$conexion=$base->query("select * from DATOS_USUARIOS");
//$registros=$conexion->fetchAll(PDO::FETCH_OBJ);




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
IF(isset($_POST["cr"])){
  $nombre=$_POST["Nom"];
  $apellido=$_POST["Ape"];
  $direccion=$_POST["Dir"];
  $sql= "insert into datos_usuarios (NOMBRE, APELLIDO, DIRECCION) values (:nom, :ape, :dir)";
  $resultado=$base->prepare($sql);
  $resultado->execute(array(":nom"=>$nombre, ":ape"=>$apellido, ":dir"=>$direccion));
  header("location:index.php");
}


?>


<h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">

  <table width="50%" border="0" align="center">
    <tr >
      <td class="primera_fila">Id</td>
      <td class="primera_fila">Nombre</td>
      <td class="primera_fila">Apellido</td>
      <td class="primera_fila">Dirección</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
    </tr> 
   
		<?php

      foreach($registros as $persona):?>

   	<tr>
      <td><?php echo $persona->ID?> </td>
      <td><?php echo $persona->NOMBRE?></td>
      <td><?php echo $persona->APELLIDO?></td>
      <td><?php echo $persona->DIRECCION?></td>

      
 
      <td class="bot"><a href="borrar.php?ID=<?php echo $persona->ID?>"><input type='button' name='del' id='del' value='Borrar'></a></td>
      <td class='bot'><a href="editar.php?ID=<?php echo $persona->ID?> & NOMBRE=<?php echo $persona->NOMBRE?> & APELLIDO=<?php echo $persona->APELLIDO?> & DIRECCION=<?php echo $persona->DIRECCION?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
    </tr>  
    
    
    <?php
      endforeach;  
    
    ?>



	<tr>
	<td></td>
      <td><input type='text' name='Nom' size='10' class='centrado'></td>
      <td><input type='text' name='Ape' size='10' class='centrado'></td>
      <td><input type='text' name=' Dir' size='10' class='centrado'></td>
      <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td></tr> 
      <tr><td colspan="4"><?php
  //Paginacion--------------------------------------------------------------------------------------

  for ($i=1;$i<=$totalPaginas;$i++){
    echo "<a href='?pagina=". $i . "'>". $i ."</a>  ";
  }
  
  //-------------------------------------------------------------------------------------------------
  ?></td></tr>   
  </table>
  </form>
  

  

<p>&nbsp;</p>
</body>
</html>