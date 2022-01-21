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
    session_start();

    if(!isset($_SESSION["usuario"])){
        header("location:login.php");
    }
    ?>

  <h1>bienvenidos</h1>
    <?php
   echo "Hola ". $_SESSION["usuario"];
    ?>
    <BR><BR>
    <a href="usuariosregistrados1.php">Regresar</a>
    <BR><BR>
    <a href="cerrar.php">Salir</a>
    <BR><BR>
</body>
</html>