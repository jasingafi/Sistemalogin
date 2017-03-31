<?php 
include("conexion.php"); 
session_start();
if (!isset($_SESSION['id_usuario'])) {
   header("Location: index.php");
}
$iduser = $_SESSION['id_usuario'];
$sql = " SELECT u.idusuarios, a.Nombre FROM usuarios AS u INNER JOIN 
            alumnos AS a ON u.id_alumno = a.IdAlumnos 
            WHERE u.idusuarios='$iduser'";
$resultado =$conexion->query($sql);
$row = $resultado->fetch_assoc();

$sqlalumnos = " SELECT u.idusuarios, a.Nombre, a.Telefono, 
                        a.Correo, u.usuario FROM 
                    usuarios AS u INNER JOIN alumnos AS a 
                    ON u.id_alumno = a.IdAlumnos ";
$resultadoalumnos = $conexion->query($sqlalumnos);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administracion</title>
</head>
<body>
<h1>
    <?php echo "Bienvenido: ".utf8_decode($row['Nombre']); ?>
</h1>
<?php 
if ($_SESSION['tipo_usuario']==1) { ?>
        <a href="registrouser.php">Registrar Usuarios</a>
        <br/>
<?php 
    }
?>
<?php 
if ($_SESSION['tipo_usuario']==2) { ?>
        <a href="RegistroClases.php">Registrar Mis Clases</a>
        <br/>
<?php 
    }
?>

    
    <a href="salir.php">Cerrar Sessión</a>
    <br/>

<?php 
if ($_SESSION['tipo_usuario']==1) { ?>
       
       <table border="1px">
           <thead>
               <tr>
                   <th>Nombre Completo</th>
                   <th>Usuario</th>
                   <th>Telefono</th>
                   <th>Correo</th>
                   <th>Editar</th>
                   <th>Eliminar</th>
               </tr>
           </thead>
           <tbody>
                  <?php 
                      while ($reguser = $resultadoalumnos->fetch_array(MYSQLI_BOTH)) {                      
                        # code
                        echo " <tr>
                                  <td>".$reguser['Nombre'] ."</td>
                                  <td>".$reguser['usuario'] ."</td>
                                  <td>".$reguser['Telefono'] ."</td>
                                  <td>".$reguser['Correo'] ."</td>
                                  
                              </tr>

          
                        ";
                      }
                  ?>

           </tbody>
       </table>
        
<?php 
    }
?>
    

</body>
</html>
