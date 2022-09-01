<?php


if($_POST){
    $chked=$_POST['chk'];
  if(sizeof($chked) > 0){
    foreach($chked as $val){
        $delete_user="DELETE FROM users WHERE id='".$val."' AND id !='".$_SESSION['admin_user']['id']."'";
        $sql=mysqli_query($conn,$delete_user);
        if($val == $_SESSION['admin_user']['id']){
        addAlert('danger','Logined user id can not be delete!');
        }else{
            addAlert('success','User deleted successfully!');
        }
    }
  }
}




$users="SELECT id,email,status FROM users";
$sql=mysqli_query($conn,$users);
$user_data=array();
while($row=mysqli_fetch_assoc($sql)){
    $user_data[]=$row;
}

?>