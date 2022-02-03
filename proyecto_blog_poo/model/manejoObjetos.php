<?php 
    include_once("objetoBlog.php");

    class manejoObjetos{
        private $conexion;

        public function __construct($conexion){
            $this->setConexion($conexion);           


        }

        public function setConexion(PDO $conexion){
            $this->conexion=$conexion;

        }

        public function getContenidoPorFecha(){
            $matriz=array();
            $contador=0;
            $resultado=$this->conexion->query("select * from contenido order by FECHA");
            while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                $blog=new ObjetoBlog();
                $blog->setId($registro["ID"]);
                $blog->setTitulo($registro["TITULO"]);
                $blog->setFecha($registro["FECHA"]);
                $blog->setComentario($registro["COMENTARIO"]);
                $blog->setImagen($registro["IMAGEN"]);
                $matriz[$contador]=$blog;
                $contador++;


            }
            return $matriz;
        }

        public function setContenido(ObjetoBlog $blog){
            $sql="insert into contenido(TITULO, FECHA, COMENTARIO, IMAGEN) values('".$blog->getTitulo()."','".$blog->getFecha()."','".$blog->getComentario()."','".$blog->getImagen()."')";
            $this->conexion->exec($sql);
            


        }
        
    }
?>