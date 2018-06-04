<?php
session_start();
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
echo "Saliendo.............";
header("refresh:2;url=../index.php");
?>