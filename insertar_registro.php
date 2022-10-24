<?php

$busqueda_usuario = $_POST['user'];
$busqueda_correo = $_POST['email'];
$busqueda_contraseña=$_POST['password'];
$pass_cifrada=password_hash($busqueda_contraseña, PASSWORD_DEFAULT);

//$fecha=$_POST['fecha'];
try{
    

 $base = new PDO('mysql:host=localhost; dbname=db_user_php','root',"");
 $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 $base->exec("SET CHARACTER SET utf8");

   // echo "conexion exitosa";
   $sql= "INSERT INTO users (username,email,password) VALUES (:user, :email, :password)";


 $resultado=$base->prepare($sql);
 // $resultado->execute(array());
 $resultado->execute(array(":user"=>$busqueda_usuario, ":email"=>$busqueda_correo, ":password"=>$pass_cifrada ));

 echo "registro exitoso";

 $resultado->closeCursor();

}catch(PDOException $e){
    die( "error al conectarte a la base de datos" . $e->getMessage());
}finally{
    $base==null;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formstyle.css">
    <title>Document</title>
</head>
<body>

</body>
</html>

