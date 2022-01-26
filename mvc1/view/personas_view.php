<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
       

    </style>
</head>
<body>

<?php

    require ("model/paginacion.php");
    


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

      foreach($matrizpersona as $persona):?>

   	<tr>
      <td><?php echo $persona["ID"]?> </td>
      <td><?php echo $persona["NOMBRE"]?></td>
      <td><?php echo $persona["APELLIDO"]?></td>
      <td><?php echo $persona["DIRECCION"]?></td>

      
 
      <td class="bot"><a href="model/borrar.php?ID=<?php echo $persona["ID"]?>"><input type='button' name='del' id='del' value='Borrar'></a></td>
      <td class='bot'><a href="model/editar.php?ID=<?php echo $persona["ID"]?> & NOMBRE=<?php echo $persona["NOMBRE"]?> & APELLIDO=<?php echo $persona["APELLIDO"]?> & DIRECCION=<?php echo $persona["DIRECCION"]?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
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

   

</body>
</html>