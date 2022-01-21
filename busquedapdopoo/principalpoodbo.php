<?php

require "devuelveproducto.php";
$productos=new Devuelveproducto();
$pais=$_POST['buscar'];
$arrayProducto=$productos->getProducto($pais);

?>

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

    foreach($arrayProducto as $elemento){
        echo "<table><tr><td>";
        echo $elemento['SECCION']."</td><td>";
        echo $elemento['NOMBREARTICULO']."</td><td>";
        echo $elemento['FECHA']."</td><td>";
        echo $elemento['PAISDEORIGEN']."</td><td>";
        echo $elemento['PRECIO']."</td><td></tr></table>";
        echo "<br>";
        echo "<br>";


        
    }

    ?>
</body>
</html>