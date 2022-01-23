<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>

<h1>ACTUALIZAR</h1>
<?php
include("conexion.php");

if(!isset($_POST["bot_actualizar"])){
  $id=$_GET["ID"];
  $nom=$_GET["NOMBRE"];
  $ape=$_GET["APELLIDO"];
  $dir=$_GET["DIRECCION"];
}else{
  $id=$_POST["id"];
  $nom=$_POST["nom"];
  $ape=$_POST["ape"];
  $dir=$_POST["dir"];

  $sql="update datos_usuarios set NOMBRE=:minom, APELLIDO=:miape, DIRECCION=:midir where ID=:miid";
  $resultado=$base->prepare($sql);
  $resultado->execute(array("miid"=>$id, ":minom"=>$nom, ":miape"=>$ape, ":midir"=>$dir));
  header("location:index.php");

  


}



?>

<p>
 
</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <table width="25%" border="0" align="center">
    <tr>
      <td></td>
      <td><label for="id"></label>
      <input type="hidden" name="id" id="id"value="<?PHP ECHO $id ?>"></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><label for="nom"></label>
      <input type="text" name="nom" id="nom" value="<?PHP ECHO $nom ?>"></td>
    </tr>
    <tr>
      <td>Apellido</td>
      <td><label for="ape"></label>
      <input type="text" name="ape" id="ape"value="<?PHP ECHO $ape ?>"></td>
    </tr>
    <tr>
      <td>Dirección</td>
      <td><label for="dir"></label>
      <input type="text" name="dir" id="dir"value="<?PHP ECHO $dir ?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>