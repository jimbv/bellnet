<?php
/*$hostname='localhost';
$database='developeru_bd';
$username='root';
$password='';
*/
$database='bellnet_amma';
$username='amma';
$password='Amma.1271-';


$conexion=new mysqli($hostname,$username,$password,$database);
if($conexion->connect_errno){
    echo "El sitio web está experimentado problemas";
}
?>