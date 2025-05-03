<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'yooran';

$conn = mysqli_connect($host, $user, $password, $database);
if(!$conn) {
    echo 'gakonek!';
}

?>