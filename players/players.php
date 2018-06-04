<!DOCTYPE html>
<?php
    session_start();
    if(! isset($_SESSION["token"]))
    {
        header("location:url=../index.php");
    }
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>
    <h1>Agregar Jugador</h1>
    <a href="../sesion/logout.php">Logout</a>
    <input type="text" id="token" value="<?=$_SESSION["token"]?>" hidden>
    <form id="players" method="post">
            <textarea id="avatar" cols="50" rows="5" placeholder="avatar"></textarea>
            <br>
            <br>
            <input type="text" placeholder="name" id="name">
            <br>
            <br>
            <textarea id="biografia" cols="50" rows="10" placeholder="biografia"></textarea>
            <br>
            <br>
            <select name="" id="game">
                <option value="lol">lol</option>
                <option value="csgo">csgo</option>
                <option value="overwatch">overwatch</option>
            </select>
            <br><br>
            <input type="submit" value="Enviar" id="enviar">
        </form>
       
        <script src="../public/js/jquery.js"> </script>
        <script>
            $(document).ready(function(){
               $("#players").submit(function(event){
                    enviar();
                   event.preventDefault();
               });

               function enviar()
               {
                    var settings = {
                        "async": true,
                        "crossDomain": true,
                        "url": "http://gamenewsuca.herokuapp.com/players",
                        "method": "POST",
                        "headers": {
                            "Authorization": "Bearer "+$("#token").val(),
                            "Content-Type": "application/x-www-form-urlencoded",
                            
                        },
                        "data": {
                            "name": $("#name").val(),
                            "biografia": $("#biografia").val(),
                            "avatar": $("#avatar").val(),
                            "game": $("#game").val()
                        }
                    }

                    $.ajax(settings).done(function (response) {
                        alert("jugador Ingresado con exito");
                        $("#name").val("");
                        $("#avatar").val("");
                        $("#biografia").val("")

                    });
               }
            });
        </script>
    </body>
</html>