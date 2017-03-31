<?php
include("conexion.php"); 
session_start();
if (isset($_SESSION['id_usuario'])) {
   header("Location: admin.php");
}
if (!empty($_POST)) {
   $usuario = mysqli_real_escape_string($conexion, $_POST['user']);
   $password = mysqli_real_escape_string($conexion, $_POST['pass']);
   $enc_pass = sha1($password);
   $sql = "SELECT idusuarios, id_tipousuario FROM usuarios 
            WHERE  usuario='$usuario' AND password='$enc_pass'";
    $resultado = $conexion->query($sql);
    $rows = $resultado->num_rows;
    if ($rows>0) {
        $row = $resultado->fetch_assoc();
        $_SESSION['id_usuario'] = $row['idusuarios'];
        $_SESSION['tipo_usuario']= $row['id_tipousuario'];
        header("Location: admin.php");
    }else{
        $error = "Usuario o password incorrecto ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Sistema de Login</title>
</head>
<body>
<form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" >
    
    <input type="text" name="user" placeholder="Nombre de Usuario">
    <input type="password" name="pass" placeholder="Password ">
    <input type="submit" value="Ingresar">

</form>
    
</body>
</html>