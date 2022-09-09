<?php
if(isset($_GET['user_id']) && !empty($_GET['user_id'])){
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
$sort="id";
$order="ASC";
$filter_url='';
$searching=' WHERE 1=1 ';
if(isset($_GET['filter_user_id']) && !empty($_GET['filter_user_id'])){
  $filter_user_id=$_GET['filter_user_id'];
  $searching.="AND id='".$filter_user_id."'";
  $filter_url.='&filter_user_id='.$filter_user_id;
}
if(isset($_GET['filter_email']) && !empty($_GET['filter_email'])){
  $filter_email=$_GET['filter_email'];
  $searching.="AND email LIKE '%".$filter_email."%'";
}
if(isset($_GET['filter_date_added']) && !empty($_GET['filter_date_added'])){
  $filter_date_added=$_GET['filter_date_added'];
  $searching.="AND date_added BETWEEN '".$filter_date_added." 00:00:00' AND '".$filter_date_added." 23:59:59'";
}

if(isset($_GET['filter_status'])){
  $filter_status=$_GET['filter_status'];
  $searching.="AND status='".$filter_status."'";
}
if(isset($_GET['sort']) && !empty($_GET['sort'])){
$sort=$_GET['sort'];
}
if(isset($_GET['order']) && !empty($_GET['order'])){
$order=$_GET['order'];
}
$page_size=1;
$page=1;
$page_index=0;

$count="SELECT count(*) as total FROM users ".$searching;
$res_count=mysqli_query($conn,$count);
$rec_total=mysqli_fetch_assoc($res_count);
$total_page=ceil($rec_total['total']/$page_size);

if(isset($_GET['page']) && !empty($_GET['page'])){
$page=$_GET['page'];
$page_index=($page - 1) * $page_size;
}
$order=($order=='ASC')?'DESC':'ASC';
$sorting="ORDER BY ".$sort." ".$order;

$users="SELECT * FROM users ".$searching." ".$sorting. " LIMIT " .$page_index.",".$page_size;
// echo $users;
// die;
$sql=mysqli_query($conn,$users);
$user_data=array();
while($row=mysqli_fetch_assoc($sql)){
    $user_data[]=$row;
}

?>