<?php
$conn = mysqli_connect('127.0.0.1', 'root', 'root1234', 'php_web2');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>