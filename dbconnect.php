<?php
require 'dbconfig.php';
$mysqli=new mysqli("localhost","id19461560_chenrique_petscarlos","B67CL4wm6HyC~zll","id19461560_tienda_petscarlos");
$link = mysqli_connect($dbhost, $dbusername,$dbpassword,$dbname);
if(mysqli_connect_errno()){
    printf("conexion fallida: %s\n", mysqli_connect_error());/*el porcentaje mostrara el tipo error que devuelve mysqli_connect_error  */
    exit();
}
$acentos = $mysqli->query("SET NAMES 'utf8'")
?>