<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table{
            width: 300px;
            margin: auto;
            background-color:blanchedalmond;
            border: 2px solid red;
            padding: 5px;
        }
        td{
            text-align: center;
        }


    </style>   
    <title>Document</title>
</head>
<body>
    <form action="buscarpdo.php" method="get">
         <table>
             <tr><th>Seccion:</th><td> <input type="text" name="seccion"></td></tr>
             <tr><th>Pais de origen:</th><td> <input type="text" name="pori"></td></tr>            
             <tr><td colspan="2"> <input type="submit" name="enviado" value="dale!" ></td></tr>
            </table>
            

        


    </form >
</body>
</html>