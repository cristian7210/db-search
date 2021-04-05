<?php

$equipo;
$posicion;
$edad;
$where = '';

if(isset($_REQUEST['equipo'])){
    
     $equipo =$_REQUEST['equipo'];
     $posicion=$_REQUEST['posicion'];
     $edad=$_REQUEST['edad'];
         
      if($equipo != ""){
            if($posicion != ""){
                if($edad != ""){
                    $where = "WHERE eq.id_equ = '$equipo' AND ju.posicion_jug = '$posicion' AND ju.edad_jug = '$edad' ";  
                    }
                else{
                    $where = "WHERE eq.id_equ = '$equipo' AND ju.posicion_jug = '$posicion'";
                }
            }
            else{
                $where = "WHERE eq.id_equ = '$equipo'";
            } 
        }
        elseif ($posicion != "") {
                $where = "WHERE ju.posicion_jug = '$posicion' ";  
        }
        else{
            if($edad != ""){
                $where = "WHERE ju.edad_jug = '$edad' ";  
            }
        }

        if($equipo == ""){
            if($posicion == ""){
                if($edad != ""){
                    $where = "WHERE eq.id_equ = '$equipo' OR ju.posicion_jug = '$posicion' OR ju.edad_jug = '$edad' ";  
                    }
                else{
                    $where = "WHERE eq.id_equ = '$equipo' OR ju.posicion_jug = '$posicion'";
                }

            }
            else{
                $where = "WHERE eq.id_equ = '$equipo' OR ju.posicion_jug = '$posicion' OR ju.edad_jug = '$edad' "; 
            }
           
        }
        else{
            $where = "WHERE eq.id_equ = '$equipo' "; 
        }
    }


$host ="localhost";
$dbname = "futbol";
$username = "root";
$password = "";

$cnx =new PDO("mysql:host=$host;dbname=$dbname",$username,$password);

$query = "SELECT * FROM jugador AS ju JOIN equipo eq ON ju.id_equ=eq.id_equ JOIN estadio es ON eq.id_equ=es.id_equ $where  ORDER BY ju.nombre_jug ASC";

$q = $cnx->prepare($query);

$result = $q->execute();

$informes = $q->fetchAll();

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
    <form action="informe.php" >
    EQUIPO<select name="equipo">
       <option></option>
       <option value="1">America</option>
       <option value="2">River PLate</option>
       <option value="3">Barcelona</option>
       <option value="4">Liverpool</option>
       <option value="5">Malaga</option>
       <option value="6">Celta</option>
       <option value="7">Racin</option>
       <option value="8">Milan</option>
       <option value="9">Juventus</option>
    </select>
    <a>POSICION</a>
    <select name="posicion">
       <option></option>
       <option value="1">Arquero</option>
       <option value="2">Defensa</option>
       <option value="3">Volante</option>
       <option value="4">Delantero</option>
    </select>

    <a>EDAD</a>
    <input type="number" name="edad" >
    <br>
    <br>
    <input type="submit" value="Buscar O" name="BO" >    
    </form>
    <br>
    <form > <input type="submit" value="Buscar Y" name="BY"> 
    </form>
    <br>
    <form> <input type="submit" value="Mostrar Todo" name="BT"> 
    </form>

    <h1>BD FUTBOL</h1>
    <table border="1">
        <tr>
        <td>CEDULA</td>
        <td>NOMBRE</td>
        <td>APELLIDO</td>
        <td>EDAD</td>
        <td>POSICION</td>

        <td>EQUIPO</td>
        <td>CIUDAD</td>
        <td>PAIS</td>

        <td>ESTADIO</td>
        <td>CAPACIDAD</td>
        
        </tr>
        
    <?php 
        for($i=0; $i<count($informes);$i++){
    ?>
    <tr>
        <td>
            <?php echo $informes[$i]["cedula_jug"] ?>
        </td>
        <td>
            <?php echo $informes[$i]["nombre_jug"] ?>
        </td>
        <td>
            <?php echo $informes[$i]["Apellido_jug"] ?>
        </td>
        <td>
            <?php echo $informes[$i]["edad_jug"] ?>
        </td>
        <td>
            <?php   if($informes[$i]["posicion_jug"]==1)
                        echo "ARQUERO";
                    if($informes[$i]["posicion_jug"]==2)
                        echo "DEFENSA";
                        if($informes[$i]["posicion_jug"]==3)
                        echo "VOLANTE";
                    if($informes[$i]["posicion_jug"]==4)
                        echo "DELANTERO";
                    
            ?>
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
       
        <td>
            <?php echo $informes[$i]["nombre_est"] ?>
        </td>
        <td>
            <?php echo $informes[$i]["Capacidad_est"] ?>
        </td>
        
    </tr>
    <?php
        }
    ?>

    </table>

      </body>
</html>




