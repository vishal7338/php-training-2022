<?php
if($_POST){
if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) ){
$email=$_POST['email'];
$password=md5($_POST['password']);
$status=$_POST['status'];
$sql="INSERT INTO users (email,password,status) VALUES ('".$email."','".$password."','".$status."')";
$res=mysqli_query($conn,$sql);
addAlert('success','User successfully added!.');
}

}
?>