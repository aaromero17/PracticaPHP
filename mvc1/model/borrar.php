<?php
require_once("conexion.php");
$base=Conectar::conexion();

$id=$_GET["ID"];
$base->query("delete from datos_usuarios where ID='$id'");
header("location:../index.php");

?>