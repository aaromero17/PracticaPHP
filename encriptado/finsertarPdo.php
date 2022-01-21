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
        td,H1{
            text-align: center;
        }


    </style>   
    <title>Document</title>
</head>
<body>
    <h1>INTRODUCE USUARIO</h1>
    <form action="insertarPdo.php" method="POST">
         
         <table>
             <tr><th>Psuario:</th><td> <input type="text" name="usuario"></td></tr>
             <tr><th>Password:</th><td> <input type="text" name="pass"></td></tr>
                      
             <tr><td colspan="2"> <input type="submit" name="enviado" value="dale!" ></td></tr>
            </table>
            

        


    </form >
</body>
</html>