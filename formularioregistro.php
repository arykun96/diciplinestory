
 <?php
require "header.php";
$mensaje_creado="";

if (isset($_POST['submit'])){

try{
 $base = new PDO('mysql:host=localhost; dbname=db_user_php','root',"");
 $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 $base->exec("SET CHARACTER SET utf8");
 $busqueda_usuario =   $_POST['user'];
 $busqueda_correo = $_POST['email'];
 $busqueda_contraseña= $_POST['password'];


$pass_cifrada=password_hash($busqueda_contraseña, PASSWORD_DEFAULT);

   // echo "conexion exitosa";
 $sql= "INSERT INTO users (username,email,password) VALUES (:user, :email, :password)";
 $resultado=$base->prepare($sql);
 $resultado->execute(array(":user"=>$busqueda_usuario, ":email"=>$busqueda_correo, ":password"=>$pass_cifrada ));

 $mensaje_creado="usuario registrado con exito";

 
header('location: formularioregistro.php');
 $resultado->closeCursor();

}catch(PDOException $e){
    die( "error al conectarte a la base de datos" . $e->getMessage());
}finally{
    $base==null;
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleform.css">
    <title>Document</title>
</head>
<body>
<br>
<div class="contenier">
    <div id="form">
    <div class="form">    
    <form action="<?php $_SERVER["PHP_SELF"] ;?>" method="POST">
    <div class="alerta">
    <?php if(!empty($mensaje_creado)): ?>
    <p class="alerta_user"> <?=$mensaje_creado; ?></p>
     <?php endif; ?>
     </div>
        <h1>Regístrate</h1>
        <p class="parrafo"> usuario <input class="semi" type="text" placeholder="ingrese su nombre de usuario"name="user" required></p>
        <p class="parrafo"> correo <input type="email" placeholder="ingrese su correo"name="email"class="semi" required> </p>
        <p class="parrafo"> contraseña <input type="password" placeholder="ingrese su contraseña"name="password"class="semi" required> </p>
        <input class="button"  type="submit" name="submit" value="regístrate">
        <p class="entrar">¿ya tienes una cuenta? <a href="formulario.php">iniciar sesión</a></p>
        </div>
    </form>
    </div>
    </div> 
</body>
</html>