<?php 

$cedula=$_REQUEST['Cedula'];
$equipo=$_REQUEST['Equipo'];
$nombre=$_REQUEST['Nombre'];
$apellido=$_REQUEST['Apellido'];
$fnacim=$_REQUEST['Fnacim'];
$posicion=$_REQUEST['Posicion'];


$host ="localhost";
$dbname = "futbol";
$username = "root";
$password = "";

$cnx =mysqli_connect($host,$username,$password,$dbname);

$sql = "INSERT INTO jugador (cedula_jug, id_equ, nombre_jug, Apellido_jug, fenacin_jug, posicion_jug) 
VALUES ('$cedula','$equipo','$nombre','$apellido','$fnacim', '$posicion')";

if(mysqli_query($cnx,$sql)){
    echo " Registro exitoso";
}else{
    echo "registro fallido";
}
header("location: http://localhost/prog4/create-records-db/RegistroJugador.html");
exit();


?>