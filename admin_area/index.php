<?php
include('../includes/connect.php');
include('../function/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link href="../css/style.css" rel="stylesheet">
<style>
  .product_img
  {
    width:20%;
    object-fit:contain;
  }
  body
      {
        background-image:url('../images/cart.jpg');
      }
  
</style>
    </head>
<body>

<div class="container-fluid p-0">
<!-- <nav class="navbar navbar-expand-lg  navbar-light bg-info">
  <div class="container-fluid">
    <img src="../images/logo.jpg" alt="" class="logo">
    <nav class="navbar navbar-expand-lg  navbar-light bg-info">
      <ul class="navbar-nav">
        <li class="nav-item">
            <a href="" class="nav-link text-white">
                Welcome Guest
            </a>
        </li>
      </ul>
    </nav>
</div>
</nav> -->
  <div class="bg-light">
    <h3 class="text-center p-0">Manage Details</h3>
</div> 

<div class="row">
    <div class="col-md-12 bg-secondary p-1  align-items-center">
  <div class="button text-center">
 
<button class="my-3">
<a href="insert_product.php" class="nav-link text-light bg-info my-.5">Insert Products</a></button>
<button><a href="index.php?view_products" class="nav-link text-light bg-info my-.5">View Products</a></button>
<button><a href="index.php?insert_category" class="nav-link text-light bg-info my-.5">Insert Categories</a></button>
<button><a href="" class="nav-link text-light bg-info my-.5"> View Categories</a></button>
<button><a href="index.php?insert_brands" class="nav-link text-light bg-info my-.5"> Insert Brands</a></button>
<button><a href="" class="nav-link text-light bg-info my-.5"> View Brands</a></button>
<button><a href="admin_login.php" class="nav-link text-light bg-info my-.5"> Logout</a></button>
</div>
    </div>
</div>
</div>
    



<div class="container  my-3">
    <?php
if (isset($_GET['insert_category']))
{
     include('insert_categories.php');
}
if (isset($_GET['insert_brands']))
{
     include('insert_brands.php');
}
if (isset($_GET['view_products']))
{
     include('view_products.php');
}
    ?>
</div>








<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>