<?php

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$genero = $_POST['genero'];
$domicilio = $_POST['domicilio'];
$usuario = $_POST['usuario'];
$pwd = $_POST['pwd'];

$pwd_cifrado = password_hash($pwd, PASSWORD_DEFAULT, array("cost"=>10));

require("conexion.php");

$sql = "INSERT INTO usuarios (usuario_id, nombre, apellidos, genero, domicilio, usuario, pwd) VALUES (NULL, :nombre, :apellidos, :genero, :domicilio, :usuario, :pwd)";
$result = $conex->prepare($sql);
$result->execute(array(":nombre"=>$nombre, ":apellidos"=>$apellidos, ":genero"=>$genero, ":domicilio"=>$domicilio, ":usuario"=>$usuario, ":pwd"=>$pwd_cifrado));

if ($result){
    header("location: formulario.html");
} else{
    header("location: formulario.html");
}

$result->closeCursor();

?>