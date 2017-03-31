<?php 
include("conexion.php"); 
session_start();
if (!isset($_SESSION['id_usuario'])) {
   header("Location: index.php");
} 
$sql = "SELECT idTipousuario, tipo FROM tipo_usuario";
$resultadotipo = $conexion->query($sql);

$ucenm = false;
if (!empty($_POST)) {
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $identidad = mysqli_real_escape_string($conexion, $_POST['identidad']);
    $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
    $usuario = mysqli_real_escape_string($conexion, $_POST['user']);
    $password = mysqli_real_escape_string($conexion, $_POST['pass']);
    $tipouser = $_POST['tipo_user'];
    $enc_pass = sha1($password);

    $sqluser = "SELECT idusuarios FROM usuarios WHERE usuario ='$usuario'";
    $resultadouser = $conexion->query($sqluser);
    $filas = $resultadouser->num_rows;
        if ($filas>0) {
            //$msj = "El usuario ya existe ";
            echo "<script> 
                    alert('El usuario ya existe ');
                    window.location='registrouser.php';
                    </script>";
        }else{
            $sqlalumno = "INSERT INTO alumnos (Identidad, Nombre, Telefono, Correo) VALUES ('$identidad','$nombre','$telefono','$correo')";  
            $reultadoalumno =$conexion->query($sqlalumno);
           // mysqli_query($conex,$consulta);  
           $idalumno = $conexion->insert_id;

           //Insertamos los datos del usuario
           $sqlusuario = "INSERT INTO usuarios (usuario, password, id_alumno, id_tipousuario) VALUES ('$usuario','$enc_pass', '$idalumno','$tipouser' )";
           $resultadousuario = $conexion->query($sqlusuario);
           if ($resultadousuario > 0) {
               //$ucenm = true;
             echo "<script> 
                    alert('Registro Exitoso ');
                    window.location='admin.php';
                    </script>";
           }else{
             echo "<script> 
                    alert('Error alregistrarse ');
                    window.location='registrouser.php';
                    </script>";
           }

        }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuarios</title>
</head>
<body>

<form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
    
    <input type="text" name="nombre" placeholder="Nombre Completo" required />
     <input type="text" name="identidad" placeholder="Numero de Identidad" required />
     <input type="tel" name="telefono" placeholder="Telefono" required />
     <input type="email" name="correo" placeholder="Correo" required />
    <input type="text" name="user" placeholder="usuario" required>
    <input type="password" name="pass" placeholder="Contraseña" required>
    <input type="text" name="passr" placeholder="Repetir contraseña" required>
    
    <select name="tipo_user" id="tipo_user">
        <option value="0">...Seleccione un usuario...</option>
        <?php 
            while ($fila = $resultadotipo->fetch_assoc()) { ?>
                <option value="<?php echo $fila['idTipousuario'];?>">
                        <?php echo $fila['tipo']; ?></option>
           
           <?php } ?> 
        
       
    </select>
    
    <input type="submit" name="registrar" value="Registrar">
</form>

  
</body>
</html>