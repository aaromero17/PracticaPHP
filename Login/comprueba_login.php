<?php

try{
  
  $base = new PDO("mysql:host=localhost; dbname=prueba","root","");
  $base->setAttribute(pdo::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $base->exec("SET CHARACTER SET utf8");
  $sql="SELECT * FROM usuarios_pas WHERE USUARIOS= :login and PASS= :password";
  $resultado=$base->prepare($sql);
  $login=htmlentities(addslashes($_POST['login']));
  $password=htmlentities(addslashes($_POST['password']));
  $resultado->bindValue(":login",$login);
  $resultado->bindValue(":password",$password);
  $resultado->execute();
  $nroregistro=$resultado->rowCount();
  if($nroregistro!=0){     
    
    session_start();
    $_SESSION["usuario"]=$_POST["login"];

    header("location:usuariosregistrados1.php");

  }else{
      header("location:login.php");
  }
  


  $resultado->closeCursor();

}catch(PDOException $e){
 ECHO "conexion erronea: ". $e;


}

?>