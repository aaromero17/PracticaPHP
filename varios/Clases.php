
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
include 'clasex.php';

$toyota = new Auto();
$ford =new Auto();
$toyota->set_color("verde");

//$toyota->arrancar();
//echo $toyota->rueda;
$volvo=new Camion();
$volvo->set_color("azul");
$volvo->arrancar();
echo " el auto tiene ".$toyota->get_ruedas(). " ruedas<br>";
echo " el camion tiene ".$volvo->get_ruedas(). " ruedas<br>";






?>
    
</body>
</html>