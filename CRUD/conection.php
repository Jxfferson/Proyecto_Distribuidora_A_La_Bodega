<?php

function conectarDB(){
    $host = "localhost";
    $user = "root";
    $pass = "";
    $bd = "proyectocamilojefferson";

    $connect=mysqli_connect($host, $user, $pass);

    mysqli_select_db($connect, $bd);

    return $connect;

}


?>