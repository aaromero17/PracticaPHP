<?php
try{
    $base= new PDO("mysql:host=localhost; dbname=prueba","root","");
    $base->setAttribute(pdo::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);
    $base->exec("SET CHARACTER SET UTF8");

}catch(Exception $e){
    die("Error". $e->getMessage());
    ECHO "Linea del error: ". $e->getLine();
}

?>