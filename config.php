<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "php_loginform";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Failed to connect with database.')</script>");
}

?>