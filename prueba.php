<?php 

$nombre=$_POST['nombre'];


function p1($nombre){
    echo "hola mundo";
    
}
 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>

    <form action="prueba.php" name="f1" method="POST">
    nombre<input type="text" name="nombre">
    <input type="submit" name="btn1" onclick="p1();" >
    </form>

    </body>
</html>