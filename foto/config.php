<?php
$servername = "localhost";
$username ="root";
$password ="";
$databasename = "ecommerce";

$config = new mysqli($servername, $username, $password,$databasename );
if ($config->connect_error) {
    die("connecsion failed". $config->connect_error);
    }
?>