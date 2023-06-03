<?php

require_once("connect.php");
	$nombre = $_POST['name'];
	$contrasena = $_POST['password'];
    $contrasena= md5($contrasena);
	$consulta=("SELECT * FROM usuarios WHERE nombre = '$nombre' AND contrasena = '$contrasena'");
    $resultado = mysqli_query($conexion,$consulta);
    $test = mysqli_num_rows($resultado);

    if ($test>0) {
        header("Location: index.html");
    }else{
        echo "No se ha podido iniciar sesion, por favor vaya al inicio y vuelva a intentarlo";
    }
    
?>
