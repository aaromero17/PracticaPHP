<?php 
     $miconexion=mysqli_connect("localhost","root","","bbddblog");
     /*Comrrobar <conexion></conexion*/
     if (!$miconexion){
         echo "La conexion a fallado";
         exit();

    
     }

     $miConsulta="select * from contenido order by FECHA desc";

     if($resultado=mysqli_query($miconexion,$miConsulta)){
         while($registro=mysqli_fetch_assoc($resultado)){
             echo "<h3>". $registro['TITULO']."</h3>". " ";
             echo "<h4>". $registro['FECHA']."</h4>". " ";
             echo "<div style='width:400px'>". $registro['COMENTARIO']."</div><br><br>";
             if($registro['IMAGEN']!=""){
                 echo "<img src='imagenes/". $registro['IMAGEN']. "'width='300px' /><br><br>";


             }
             echo "<hr>";


         }
     }
?>