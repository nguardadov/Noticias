<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>

    <?php
        if(isset($_GET["error"]))
        {
            echo "<h2>Las credenciales son invalidas</h2>";
        }
    ?>

    <form action="sesion/sesion.php" method="post">
        <input type="text" placeholder="user" name="user">
        <input type="password" placeholder="*******" name="password">
        <input type="submit" value="Ingresar">
    </form>
</body>
</html>