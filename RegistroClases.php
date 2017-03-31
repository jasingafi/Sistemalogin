<?php 
include("conexion.php"); 
session_start();
if (!isset($_SESSION['id_usuario'])) {
   header("Location: index.php");
}
$sql ="SELECT idTipousuario, tipo FROM tipo_usuario";
$resultadotipo = $conexion->query($sql); 
if (!empty($_POST)) {
  $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
  $unidades = mysqli_real_escape_string($conexion, $_POST['unidades']);
  $iduser = $_SESSION['id_usuario'];
  $sqlmateria = "INSERT INTO materias(nombre_materia,unidades,idusuario) 
                             VALUES('$nombre','$unidades','$iduser')";
  $resultadomateria=$conexion->query($sqlmateria);  
  if ($resultadomateria>0) {
       //Registro exitos               
       echo "<script> 
                    alert('Registro Exitoso ');
                    window.location='admin.php';
                    </script>";
           }else{
             echo "<script> 
                    alert('Error alregistrarse ');
                    window.location='RegistroClases.php';
                    </script>";
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
    
     <input type="text" name="nombre" placeholder="Nombre Clase" required />
     <input type="number" name="unidades" placeholder="Unidades Valorativas" required />
       
    <input type="submit" name="registrar" value="Registrar">
</form>

    

</body>
</html>