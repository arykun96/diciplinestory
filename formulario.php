<?php
include "header.php";

if(isset($_POST['login'])){
    $mensaje="";

try {
   $base= new PDO('mysql:host=localhost; dbname=db_user_php','root',"");

   $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   
   $sql="SELECT * FROM users WHERE username = ?";
   $resultado=$base->prepare($sql);
   $resultado->execute([$_POST['user']]);
   $user=$resultado->fetch();

if ($user && password_verify($_POST['password'], $user['password']))
{
    header('location: home_user1.php');
    session_start();
    $_SESSION["nombre_usuario"] = $_POST['user'];

} else {
    $mensaje= "error: el usuario y la contraseña no coinciden";
}
 
} catch (PDOException $e) {
   die ("Error: " . $e->getMessage());
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="styleform.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iniciar sesión</title>
</head>
<body>
    <br>
<div class="contenier">

    <div id="form">
      
    <div class="form">
    <form action="<?php $_SERVER["PHP_SELF"] ;?> " method="POST"> 
    <div class="error">
    <?php if(!empty($mensaje)): ?>
    <p class="error_p"> <?=$mensaje; ?></p>
  <?php endif; ?>
  </div>
        <h1>iniciar sesión</h1>
        <p class="parrafo" > usuario <input type="text" placeholder="ingrese su usuario"name="user"class="semi"> </p>
        <p class="parrafo" > contraseña <input type="password" placeholder="ingrese su contraseña"name="password"class="semi"> </p>
        <input class="button" type="submit" name="login" value="entrar">
        <p class="entrar">¿no te has registrado? <a href="formularioregistro.php">Regístrate</a></p>
        </form>    
        </div>
    </div>
</div>
    


</div>
</body>
</html>


