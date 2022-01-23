<?php
include("conexion.php");
$id=$_GET["ID"];
$base->query("delete from datos_usuarios where ID='$id'");
header("location:index.php");

?>