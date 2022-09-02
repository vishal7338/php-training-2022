<?php
if($_GET){
$user_id=$_GET['user_id'];
$delete_single="DELETE FROM users WHERE id='".$user_id."' AND id !='".$_SESSION['admin_user']['id']."'";
mysqli_query($conn,$delete_single);
addAlert('success','User deleted successfully!');
header('Location: manage_users.php');

}

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

$searching=' WHERE 1=1 ';
if(isset($_GET['filter_user_id']) && !empty($_GET['filter_user_id'])){
  $filter_user_id=$_GET['filter_user_id'];
  $searching.="AND id='".$filter_user_id."'";
}
if(isset($_GET['filter_email']) && !empty($_GET['filter_email'])){
  $filter_email=$_GET['filter_email'];
  $searching.="AND email LIKE '%".$filter_email."%'";
}
if(isset($_GET['filter_status'])){
  $filter_status=$_GET['filter_status'];
  $searching.="AND status='".$filter_status."'";
}

$users="SELECT id,email,status FROM users ".$searching."";
// echo $users;
// die;
$sql=mysqli_query($conn,$users);
$user_data=array();
while($row=mysqli_fetch_assoc($sql)){
    $user_data[]=$row;
}

?>