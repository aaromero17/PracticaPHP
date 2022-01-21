<?php
$server="localhost";
$db="prueba";
$user="root";
$pass="";
$nart=$_POST['nombreA'];



try{
  
     $base = new PDO("mysql:host=$server; dbname=$db",$user,$pass);
     $base->setAttribute(pdo::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
     $base->exec("SET CHARACTER SET utf8");
     $sql="DELETE FROM artículos where NOMBREARTICULO= :nar";
     $resultado=$base->prepare($sql);
     $resultado->execute(array( ":nar"=>$nart));
     
     echo "registro borrado";


     $resultado->closeCursor();

}catch(PDOException $e){
    ECHO "conexion erronea: ". $e;


}finally{
$base=null;

}





?>