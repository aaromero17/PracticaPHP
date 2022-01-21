<?php
$server="localhost";
$db="prueba";
$user="root";
$pass="";
$busSec=$_GET['seccion'];
$busPOri=$_GET['pori'];

try{
  
     $base = new PDO("mysql:host=$server; dbname=$db",$user,$pass);
     $base->setAttribute(pdo::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
     $base->exec("SET CHARACTER SET utf8");
     $sql="SELECT * FROM artículos WHERE SECCION= :secc and PAISDEORIGEN= :pdorigen";
     $resultado=$base->prepare($sql);
     $resultado->execute(array(":secc"=>$busSec, ":pdorigen"=>$busPOri));
     while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){

        echo "Nombre articulo: ". $registro['NOMBREARTICULO']." la seccion: ".$registro['SECCION']. " Pais de origen : ". $registro['PAISDEORIGEN']."<br>";
     }


     $resultado->closeCursor();

}catch(PDOException $e){
    ECHO "conexion erronea: ". $e;


}finally{
$base=null;

}





?>