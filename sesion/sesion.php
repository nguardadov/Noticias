<?php

    $user = $_POST["user"];
    $pass = $_POST["password"];

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://gamenewsuca.herokuapp.com/login",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "user=$user&password=$pass",
        CURLOPT_HTTPHEADER => array(
        "Content-Type: application/x-www-form-urlencoded"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);
    // verificamos si existe un error
    if ($err) {
         echo "cURL Error #:" . $err;
         //header("refresh:2;url=../index.php?error=error");

    } else {
       
        $obj = json_decode($response,true);
        $token = "";
       foreach($obj as $k => $v)
       {
           $token= $v;
       }

       if(!strcmp($token,"Usuario desconocido")==0)
       {
        echo "Bienvenido..................";
        session_start();
        $_SESSION["token"]=$token;
        $_SESSION["pass"]=$user;
        header("refresh:2;url=../players/players.php");
       }
       else{
        echo "Redireccionando..................";
        header("refresh:2;url=../index.php?error=error");
       }

    }

?>