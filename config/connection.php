<?php
session_start();
global $conn;
$conn = mysqli_connect('localhost', 'root', 'root','login');
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>