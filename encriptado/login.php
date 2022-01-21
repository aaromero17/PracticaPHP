
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?PHP
if(isset($_POST["enviar"])){
try{
  
  $base = new PDO("mysql:host=localhost; dbname=prueba","root","");
  $base->setAttribute(pdo::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $base->exec("SET CHARACTER SET utf8");
  $sql="SELECT * FROM usuarios_pas WHERE USUARIOS= :login";
  $resultado=$base->prepare($sql);
  $login=htmlentities(addslashes($_POST['login']));
  
  $resultado->bindValue(":login",$login);
  
  $resultado->execute();
  $nroregistro=$resultado->rowCount();
  if($nroregistro!=0){     
    $registro=$resultado->fetch(PDO::FETCH_ASSOC);

    if(password_verify($_POST["password"],$registro["PASS"])){
        session_start();
        $_SESSION["usuario"]=$_POST["login"];
    }    
   else{
    echo "Clave invalida";
   }

  }else{
      echo "Usuario incorrecto";
  }
  


  $resultado->closeCursor();

}catch(PDOException $e){
 ECHO "conexion erronea: ". $e;


}
}

?>
<?php

if(!isset($_SESSION['usuario'])){
include ("formulario.html");
}else{

    echo "El usuario: ". $_SESSION['usuario'];
}
?>


<h2>Contenido de la web</h2>;
<table WIDTH="800" BOrder="0" >
    <TR>
        <td><IMG src="imagenes/img1.jpg" width=300 height="171"></td>
        <td><IMG src="imagenes/img2.jpg" width=300 height="171"></td>
    </TR>
    <TR>    
        <td><IMG src="imagenes/img3.jpg" width=300 height="171"></td>
        <td><IMG src="imagenes/img4.jpg" width=300 height="171"></td>
       
        
    </TR>
</table>
</body>
</html>

