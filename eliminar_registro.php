<?php

include "usuario_header.php";
session_start();
if(!isset($_SESSION["nombre_usuario"])){
    header('location: formulario.php');
    echo "no se ha encontrado la sesión";
}else{
   
}


$busqueda_usuario = $_POST['email'];
//$fecha=$_POST['fecha'];
try{
 


 $base = new PDO('mysql:host=localhost; dbname=db_user_php','root',"");
 $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


   // echo "conexion exitosa";
$sql= "DELETE FROM users WHERE email=:email";
$base->exec("SET CHARACTER SET utf8");

 $resultados=$base->prepare($sql);
 
 $resultados->execute(array(":email"=>$busqueda_usuario));
header('location: formulario.php');

 


 $resultados->closeCursor();

}catch(PDOException $e){
    die( "error al conectarte a la base de datos" . $e->getMessage());
}finally{
    $base==null;
}
?>


