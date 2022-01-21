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

    if(isset($_COOKIE["Idioma_seleccionado"])){
        if ($_COOKIE["Idioma_seleccionado"]=="SP"){
            header("location:spanish.php");
        }else if($_COOKIE["Idioma_seleccionado"]=="EN"){
            header("location:english.php");   

        }
       
    }


    ?>
    <table width="25%" border="0" align="center">
        <tr>
            <td colspan="2" align="center" ><h1>Elige idioma</h1></td>
        </tr>
        <tr>
            <td align="center"><a href="crearcookie.php?Idioma=SP"><img src="img/esp.gif" width="90" height="60"></a></td>
            <td align="center"><a href="crearcookie.php?Idioma=EN"><img src="img/usa.gif" width="90" height="60"></a></td>        
        </tr>




    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</body>
</html>