
<?php 

require_once('config/connection.php');
require_once('common/header.php'); 
require_once('config/startup.php');
require_once('library/add_user_lib.php');

?>
<style>
  label.error{
    color:red;
  }
</style>
  </head>
  <body>
    

  <?php require_once('common/dash_header.php'); ?>
<div class="container-fluid">
  <div class="row">
    <?php require_once('common/sidebar.php'); ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php echo $document_title; ?></h1>
      </div>

      <div class="col-md-9">
        <?php echo displayAlert(); ?>
      <form class="row g-3 shadow p-4 my-3" method="POST" id="user_form" enctype="multipart/form-data">

  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control required" name="email" id="inputEmail4" value="<?php echo $email; ?>">
    
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="inputPassword4">
  </div>  
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" name="confirm_password" id="inputPassword4">
  </div> 
  <div class="col-md-6">
    <?php if(!empty($photo)){ ?>
      <img src="uploads/<?php echo $photo; ?>" width="50%" class="img-thumbnail">
      <?php } ?>
    <label for="photo" class="form-label">Photo</label>
    <input type="file" class="form-control" name="photo" id="photo">
  </div>
  <div class="col-md-4">
    <label for="status" class="form-label">Status</label>
    <select id="status" class="form-select" name="status">
      <option >select status</option>
      <option value="0" <?php echo ($status == 0)?'selected':'' ?>>Inactive</option>
      <option value="1" <?php echo ($status == 1)?'selected':'' ?>>Active</option>
    </select>
  </div>
 
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
</div>
</main>

<!-- Category page => id,category_name,photo,status,sort_order -->

</div>
</div>
<?php require_once('common/footer_script.php'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script>
$("#user_form").validate({
  submitHandler: function(form) {
    form.submit();
  }
});
</script>
<?php require_once('common/footer.php'); ?>