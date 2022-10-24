
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
    <div class="contenier">
        <div class="form">
            <section>
            <label><h1>Eliminar</h1></label>
            <form action="eliminar_registro.php" method="POST">
                <p>correo electronico</p><input type="email" name="email" placeholder="ingrese su correo" required>       
                <br>
                <br>
                <p class="slash">para registrar un nuevo usuarioo</p><a href="formularioregistro.php">ingrese aquí</a>
                <input type="submit" name="delete" 
                value="eliminar" id="buttom">
            </form>
            </section>
        </div>
    </div>
</body>
</html>