<?php

$host ="localhost";
$dbname = "futbol";
$username = "root";
$password = "";

$cnx =new PDO("mysql:host=$host;dbname=$dbname",$username,$password);

$query = "SELECT * FROM `equipo` WHERE 1";

$q = $cnx->prepare($query);

$result = $q->execute();

$informes = $q->fetchAll();

//var_dump($informes);



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
    <form action="">
   <select name="" id=""></select>
   </form>

    <h1>EQUIPOS</h1>
    <table border="1">
        <tr>
        <td>ID</td>
        <td>NOMBRE</td>
        <td>CIUDAD</td>
        <td>PAIS/td>
        </tr>
        
    <?php 
        for($i=0; $i<count($informes);$i++){
    ?>
    <tr>
        <td>
            <?php echo $informes[$i]["id_equ"] ?>
        </td>
        <td>
            <?php echo $informes[$i]["Nombre_equ"] ?>
        </td>
        <td>
            <?php echo $informes[$i]["ciudad_equ"] ?>
        </td>
        <td>
            <?php echo $informes[$i]["pais_equ"] ?>
        </td>
        
    </tr>
    <?php
        }
    ?>

    </table>
    </body>
</html>