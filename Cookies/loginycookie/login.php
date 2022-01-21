
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
$autentificar=false;
if(isset($_POST["enviar"])){
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
                $autentificar=true;
               
                if(isset($_POST["recordar"])){
                    setcookie("nombre_usuario",$_POST["login"],time()+68400);
                    
    
                }

            }   
            
            else{
                 echo "Usuario incorrecto";
            }
             
           
        $resultado->closeCursor();
             
    }
    
    catch(PDOException $e){
        
        ECHO "conexion erronea: ". $e;
    }


}

?>
<?php

if($autentificar==false){

    if(!isset($_COOKIE["nombre_usuario"])){

        include ("formulario.html");
    }
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
<?php
if($autentificar==true || isset($_COOKIE["nombre_usuario"])){
    include("zonaregistrados.html");

}
?>
</body>
</html>

