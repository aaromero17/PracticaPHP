<?php
$server="localhost";
$db="prueba";
$user="root";
$pass="";
$busSec=$_POST['seccion'];
$nart=$_POST['nombreA'];
$fecha=$_POST['fecha'];
$busPOri=$_POST['pori'];
$precio=$_POST['precio'];


try{
  
     $base = new PDO("mysql:host=$server; dbname=$db",$user,$pass);
     $base->setAttribute(pdo::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
     $base->exec("SET CHARACTER SET utf8");
     $sql="INSERT INTO artículos (SECCION, NOMBREARTICULO, FECHA, PAISDEORIGEN, PRECIO) values (:sec, :nar,:fec, :pao, :pre)";
     $resultado=$base->prepare($sql);
     $resultado->execute(array(":sec"=>$busSec,  ":nar"=>$nart, ":fec"=>$fecha, ":pao"=>$busPOri,":pre"=>$precio));
     
     echo "registro insertado";


     $resultado->closeCursor();

}catch(PDOException $e){
    ECHO "conexion erronea: ". $e;


}finally{
$base=null;

}





?>