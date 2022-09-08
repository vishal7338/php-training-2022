
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
      <th scope="col"><a href="manage_users.php?page=<?php echo $page; ?><?php echo $filter_url; ?>&sort=id&order=<?php echo $order; ?>">ID <i class="bi bi-caret-<?php echo ($order=='ASC')?'down':'up' ?>-fill"></i></a></th>
      <th scope="col">Email</th>
      <th scope="col">status</th>
      <th scope="col">Date added</th>
      <th scope="col">Action</th>
    </tr>
    <tr>
      <th></th>
      <th></th>
      <th><input type="text" class="form-control" id="filter_user_id" value="<?php echo $filter_user_id; ?>"></th>
      <th><input type="text" class="form-control" id="filter_email" value="<?php echo $filter_email; ?>"></th>
      <th> <select id="filter_status" class="form-select" name="filter_status">
      <option value=''>select status</option>
      <option value="0" <?php echo ($filter_status === '0')?'selected':'' ?>>Inactive</option>
      <option value="1" <?php echo ($filter_status == 1)?'selected':'' ?>>Active</option>
    </select></th>
    <th></th>
      <th><button type="button" class="btn btn-primary" id="btnFilter">Search</button><a href="manage_users.php" class="btn btn-warning" >Reset</a></th>

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
      <td><?php echo date('d-m-Y H:i:s a',strtotime($value['date_added'])); ?></td>
      <td><a href="add_user.php?user_id=<?php echo $value['id']; ?>">Edit</a> | <a href="manage_users.php?user_id=<?php echo $value['id']; ?>">Delete</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<nav aria-label="...">
  <ul class="pagination">
    <li class="page-item <?php echo ($page == 1)?'disabled':'' ?>">
    <a class="page-link" href="manage_users.php?page=<?php echo ($page - 1); ?>">Previous</a>
    </li>
    <?php for($i=1;$i<=$total_page;$i++){ ?>
      <?php if($i == $page){ ?>
    <li class="page-item active"><a class="page-link " href="manage_users.php?page=<?php echo $i;?>"><?php echo $i; ?></a></li>
    <?php }else{ ?>

      <li class="page-item" aria-current="page">
      <a class="page-link" href="manage_users.php?page=<?php echo $i;?>"><?php echo $i; ?></a>
    </li>
      <?php } ?>
    <?php }?>
    <li class="page-item <?php echo ($page == $total_page)?'disabled':'' ?>">
      <a class="page-link" href="manage_users.php?page=<?php echo ($page + 1); ?>">Next</a>
    </li>
  </ul>
</nav>
</div>

    </form>
    </main>




</div>
</div>
<?php require_once('common/footer_script.php'); ?>
<script>
$('#btnFilter').click(function(){
  var url='manage_users.php?';
  var filter_user_id=$('#filter_user_id').val();
  if(filter_user_id != ''){
    url+='&filter_user_id='+filter_user_id;
  }
  var filter_status=$('#filter_status').val();
  if(filter_status != ''){
    url+='&filter_status='+filter_status;
  }
  var filter_email=$('#filter_email').val();
  if(filter_email != ''){
    url+='&filter_email='+filter_email;
  }
window.location.href=url;
})

</script>
<?php require_once('common/footer.php'); ?>