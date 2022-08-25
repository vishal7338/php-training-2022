<?php
$conn = mysqli_connect('localhost', 'root', 'root','login');
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$first_name='';
if($_POST){
if(isset($_POST['first_name']) && !empty($_POST['first_name'])){
  $first_name=$_POST['first_name'];
}else{
$error='Name is compulsory';
}
$class=$_POST['class'];

$sql = "INSERT INTO registration (name, email, gender,class,address)
VALUES ('".$first_name."', 'john@example.com', '1','".$class."','abcd colony')";
mysqli_query($conn, $sql);
if (mysqli_query($conn, $sql)) {
  $id =mysqli_insert_id($conn);
 
  header("Location: registration_2.php?student_id=".$id);
  die;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
if($_GET['student_id']){
$student_id=$_GET['student_id'];
$get_data="SELECT * FROM registration WHERE id='".$student_id."'";
$sql_run=mysqli_query($conn, $get_data);
$row=mysqli_fetch_assoc($sql_run);

}
// $update_query="UPDATE registration SET class = '10th', name ='Suresh' WHERE id='1'";
// $sql_run=mysqli_query($conn, $update_query);
// $delete_query="DELETE FROM registration WHERE id='1'";
// $sql_run=mysqli_query($conn, $delete_query);



// if(mysqli_num_rows($sql_run) > 0){
// while($row=mysqli_fetch_assoc($sql_run)){
// echo $row['id'].' '.$row['name'],'<br>';
// }
// }
?>
<!doctype html>
<html>
<head>
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container w-75 my-5">
        <h1 class="text-center">Registration Form</h1>
<form class="row g-3 shadow p-4 my-3" method="POST">
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <?php echo $error; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">First name</label>
    <input type="text" class="form-control" name="first_name" id="inputEmail4" value="<?php echo (isset($_GET['student_id']))? $row['name']:'';
    ?>">
    
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="inputPassword4">
  </div>
   <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputPassword4" value="<?php echo (isset($_GET['student_id']))? $row['email']:'' ?>">
  </div><div class="col-md-6">
    <label for="inputPassword4" class="form-label">Class</label>
    <input type="text" class="form-control" id="inputPassword4">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
Gender
  <div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1">
  <label class="form-check-label" for="flexRadioDefault1">
  Male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="2">
  <label class="form-check-label" for="flexRadioDefault2">
    Female
  </label>
</div>
 
  <div class="col-12">
    <button type="submit" name="register_submit" class="btn btn-primary">Register</button>
  </div>
</form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>