<?php

require ("config.php");

class   Conexion{

    protected $conexionDB;

    

         public function  __construct(){
             
            try{
                $this->conexionDB = new PDO('mysql:host=localhost; dbname=prueba',DB_USER,DB_PASS);
                $this->conexionDB ->setAttribute(pdo::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);  
                $this->conexionDB->exec("SET CHARACTER SET utf8");            
                return $this->conexionDB;
            }  
         
        catch(PDOException $e){
            ECHO "conexion erronea: ". $e;
        }
        
        finally{
            $base=null;
        }

    }

        


    

}



?>