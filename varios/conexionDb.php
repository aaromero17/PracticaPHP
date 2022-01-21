<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $dbhost="localhost";
    $dbNombre="prueba";
    $dbUsuario="root";
    $password="";

    $conexion=mysqli_connect($dbhost,$dbUsuario,$password,$dbNombre);
    $query="select* from datosPersonales";
    $resultado=mysqli_query($conexion,$query);
    $fila=mysqli_fetch_row($resultado);
    echo $fila[0]. " ";
    echo $fila[1]. " ";
    echo $fila[2]. " ";
    echo $fila[3]. " ";


?>
</body>
</html>