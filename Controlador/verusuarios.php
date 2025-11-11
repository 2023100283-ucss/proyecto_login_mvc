<?php
require('Modelo/conexion.php');
$con = new Conexion();
$usuarios =$con->getUsers();
require('View/ver_usuarios.php');
?>