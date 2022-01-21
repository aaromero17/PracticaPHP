<?php
$server="localhost";
$db="prueba";
$user="root";
$pass="";
$usuario=$_POST['usuario'];
$password=$_POST['pass'];
$passEncriptado= password_hash($password,PASSWORD_DEFAULT,array("cost"=>12));



try{
  
     $base = new PDO("mysql:host=$server; dbname=$db",$user,$pass);
     $base->setAttribute(pdo::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
     $base->exec("SET CHARACTER SET utf8");
     $sql="INSERT INTO usuarios_pas (USUARIOS, PASS) values (:USU, :PAS)";
     $resultado=$base->prepare($sql);
     $resultado->execute(array(":USU"=>$usuario, ":PAS"=>$passEncriptado));
     
     
     echo "registro insertado: ". $passEncriptado;


     $resultado->closeCursor();

}catch(PDOException $e){
    ECHO "conexion erronea: ". $e;


}finally{
$base=null;

}





?>