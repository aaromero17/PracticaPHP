<?php 
    class Conexion{
        private $servidor="localhost";
        private $usuario="root";
        private $bd="album";
        private $pass="";
        private $conexion;
        
        public function __construct(){
            try{
                $this->conexion= new PDO("mysql:host=$this->servidor;dbname=$this->bd",$this->usuario,$this->pass);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            }catch(PDOException $e){
                return "Falla de conexion: ". $e;


            }
            
        } 

        public function ejecutar($sql){
            $this->conexion->exec($sql);
            return $this->conexion->lastInsertId();


        }



    }
    
?>