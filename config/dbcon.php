<?php
$servername = "localhost";
$username = "root";
$password = "123456";

try{
$conn = new PDO("mysql:host=$servername;" , $username , $password);
echo "OK";
}
catch(PDOException $e){
echo $e->getMessage();
}