<?php

require_once "mysql.php";

try {

    $pre="mysql:host=$host;dbname=$db_name;charset=$charset";
    $conn = New PDO($pre,$db_username,$db_password);
} catch (PDOException $e) {
    $d= new PDOException($e->getMessage());
    $error_code=$d->getCode();
    header("Location:../errorpages/global_maintenace.php?error_code=$error_code");
    exit();
}



?>
