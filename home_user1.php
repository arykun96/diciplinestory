
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>

<body>
<?php
include "usuario_header.php";
session_start();
if(!isset($_SESSION["nombre_usuario"])){
    header('location: formulario.php');
    echo "no se ha encontrado la sesión";
}else{
   
}
?>
<div class="conteiner">


<h1>inicio</h1>
<div id="usuarios">
<section class="users">
<h2>tu usuario</h2>
<?php echo "<p>usuario:" . " " . $_SESSION["nombre_usuario"] . "</p>"; ?>
<h2>administrar perfil</h2>
<a href="form_eliminar.php">borrar cuenta</a>
</section>
</div>


</div>

</body>
</html>