<?php
 $email='';
 $status='';
 $user_id='';
 $password='';
$document_title='Add User';
if($_GET){
 
    $user_id=$_GET['user_id'];
    $get_user="SELECT * FROM users WHERE id='".$user_id."'";
    $res=mysqli_query($conn,$get_user);
    if(mysqli_num_rows($res) > 0){
    $row=mysqli_fetch_assoc($res);
    $email=$row['email'];
    $status=$row['status'];
    $photo=$row['photo'];
    $document_title='Edit User';
    }
  
  }



if($_POST){


//     echo '<pre>';
//  print_r($_FILES);
//  echo '</pre>';
//  die;
    if(isset($_POST['email']) && !empty($_POST['email'])){
           
    $email=$_POST['email'];
 
    $status=$_POST['status'];
    $password=$_POST['password'];
    if(!alreadyExist($email,$user_id)){
        if($user_id){
        $sql="UPDATE users SET email='".$email."', status='".$status."' WHERE id='".$user_id."'";
        $res=mysqli_query($conn,$sql);
        addAlert('success','User updated successfully!.');
        
        if(isset($_FILES['photo']['name']) && !empty($_FILES['photo']['name'])){
            $filename=time().'_'.$_FILES['photo']['name'];
            $dest='uploads/'.$filename;
            $src=$_FILES['photo']['tmp_name'];
            move_uploaded_file($src,$dest);
            $sql_photo="UPDATE users SET photo='".$filename."' WHERE id='".$user_id."'";
            mysqli_query($conn,$sql_photo);
            addAlert('success','User updated successfully!.');
        }

        if(!empty($password)){
            $password=md5($_POST['password']);
            $sql_1="UPDATE users SET password='".$password."' WHERE id='".$user_id."'";
            $res_1=mysqli_query($conn,$sql_1);
            addAlert('success','User updated successfully!.');
        }

}else{
if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) ){
$email=$_POST['email'];
$password=md5($_POST['password']);
$status=$_POST['status'];
$sql="INSERT INTO users (email,password,status) VALUES ('".$email."','".$password."','".$status."')";
// echo $sql;
// die;
$res=mysqli_query($conn,$sql);
addAlert('success','User successfully added!.');
}
}
    }else{
        addAlert('danger','Email already Exist!.');  
    }
}
}
function alreadyExist($email,$user_id){
    global $conn;
    $sql = "SELECT * FROM users WHERE email='". $email ."' AND id !='". $user_id ."'";
    $rs = mysqli_query($conn, $sql);
    if(mysqli_num_rows($rs)){
        
        return true;
    }
    return false;
}
?>