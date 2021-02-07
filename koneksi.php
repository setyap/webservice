<?php

$connection = null;

try{
    //config

$host = "localhost";
$username = "root";
$password = "";
$dbname   = "cr_wanda";

//connect
$database = "mysql:dbname=$dbname;host=$host";
$connection = new PDO($database, $username, $password);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$konek = mysqli_connect($host, $username, $password, $dbname) or die("Database MYSQL Tidak Terhubung");


}catch(PDOException $e){
    echo "error ! ", $e->getMessage();
    die;
}


?>