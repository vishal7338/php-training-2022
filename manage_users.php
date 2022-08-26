
<?php 

require_once('config/connection.php');
require_once('common/header.php'); 
require_once('config/startup.php');
?>
  </head>
  <body>
    

  <?php require_once('common/dash_header.php'); ?>
<div class="container-fluid">
  <div class="row">
    <?php require_once('common/sidebar.php'); ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manage Users</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="add_user.php" class="btn btn-sm btn-outline-success">Add User</a>
            <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
          </div>
         
        </div>
      </div>
</main>



</div>
</div>
<?php require_once('common/footer_script.php'); ?>
<?php require_once('common/footer.php'); ?>