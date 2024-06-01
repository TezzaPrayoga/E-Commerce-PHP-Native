<?php
    error_reporting(E_ALL ^ E_DEPRECATED);
    $host = "localhost";
    $user = "bpgcdxkc_TP";
    $pass = "Prayoga321@";
    $dbname = "bpgcdxkc_log";

    $kon = mysqli_connect($host, $user, $pass, $dbname);
    if (!$kon){
        die("whehehe");
    }
?>