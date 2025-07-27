<!doctype html>
<html lang="en">

 <?php include 'auth.php' ?>
 <?php include 'header.php' ?>
  

    <?php
include("../db.php");

if (isset($_GET['action'], $_GET['product_id']) && $_GET['action']=='delete') {
  $id = (int)$_GET['product_id'];
  mysqli_query($con,
    "DELETE FROM products WHERE product_id = $id"
  );
  header("Location: index.php?page=productlist");  // adjust “productlist” to the actual page key
  exit;
}

// … after your product-delete if(…) block …

// USER DELETE
if (isset($_GET['action'], $_GET['user_id']) && $_GET['action']=='delete') {
  $uid = (int)$_GET['user_id'];
  mysqli_query($con, "DELETE FROM user_info WHERE user_id = $uid")
    or die(mysqli_error($con));
  header("Location: index.php?page=userlist");
  exit;
}


?>
<body class="n">
<?php 
include "sidenav.php";
include "topheader.php";

?>
      <main id="view-panel">
        <div class="container-fluid">
		
            <?php 
            $page = isset($_GET['page']) ? $_GET['page'] : 'home';
            include $page.'.php' ?>
          
        </div>

    </main>

  </body>
  <!-- jQuery & DataTables (make sure these are only included once globally) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  
  window.start_load = function(){
    $('body').append('<div id="preloader2"></div>');
  }
  window.end_load = function(){
    $('body #preloader2').remove();
  }
</script>