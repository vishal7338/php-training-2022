<?php
session_start();
$conn = mysqli_connect('localhost', 'root', 'root','login');
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>