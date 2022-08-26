<?php
require_once('function.php');
if(!isset($_SESSION['admin_user']) || empty($_SESSION['admin_user'])){
    header('Location: login.php');
    die;
}
?>