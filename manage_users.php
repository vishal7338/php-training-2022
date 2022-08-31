
<?php 

require_once('config/connection.php');
require_once('common/header.php'); 
require_once('config/startup.php');
require_once('library/manage_user_lib.php');
?>
  </head>
  <body>
    

  <?php require_once('common/dash_header.php'); ?>
<div class="container-fluid">
  <div class="row">
    <?php require_once('common/sidebar.php'); ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <form action="" method="POST">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manage Users</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="add_user.php" class="btn btn-sm btn-outline-success">Add User</a>
            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure want to delete this ?')">Delete</button>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <?php echo displayAlert(); ?>
<table class="table">
  <thead>
    <tr>
      <th scope="col"><input type="checkbox" class="form-check-input" onclick="$('.chk').prop('checked',$(this).is(':checked'))"></th>
      <th scope="col">S.no.</th>
      <th scope="col">ID</th>
      <th scope="col">Email</th>
      <th scope="col">status</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($user_data as $key=> $value){ ?>
    <tr>
      <td><input type="checkbox" class="form-check-input chk" value="<?php echo $value['id'];  ?>" name="chk[]"></td>
      <td><?php echo $key+1; ?> </td>
      <td><?php echo $value['id']; ?> </td>
      <td><?php echo $value['email']; ?> </td>
      <td><?php echo ($value['status'] == 1)?'<span class="badge bg-success">Active</span>':'<span class="badge bg-danger">Inactive</span>'; ?> </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
    </form>
    </main>




</div>
</div>
<?php require_once('common/footer_script.php'); ?>
<?php require_once('common/footer.php'); ?>