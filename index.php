<?php
 include('includes/connect.php');
 include('function/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>:: Ecommerce::</title>
    <link href="fa/css/svg-with-js.css">
    <link href="css/jquery.bxslider.css" rel="stylesheet">
    <link href="css/jquery.bxslider.min.css" rel="stylesheet">
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/owl.theme.default.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<style>
  <style>
  .card-img-top
      {
       width:70%;
       height:70%;
       object-fit:contain;
      }
      </style>
  </style>
<body>

<div class="wrapper">
 
<div class="navigation_bar">
 

  <div class="container ">
   
    <!-- insert  a logo -->
    <div class="logo">
    
      <img src="images/logo.png" alt="logo">
    </div>
    
    <!-- insert a box -->
    <div class="search_area">
    <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control mt-3 " type="search" placeholder="Search all products" aria-label="Search"  name="search_data">
        <input type="submit" value="search" class="btn btn-success mt-3" name="search_data_product">

        </form>
</div>

  <!-- user menu-->
  <div class ="user_menu">
    <ul>
      <li> <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-hoshpopup="true" aria-expaded="false"> 
        <i class="fas fa-user"></i>My Account </button> </a>
        <!-- dropdown button-->
        <div class="dropdown-menu dropdown-menu-right bg-dark" style="width:150px;">
             <a href="#"><button type="button" class="dropdown-item"><i class="fas fa-user"></i>&nbsp;Your Account</button></a>
            
              <div class="dropdown-divider"></div>
              <p class="text-center text-white" style="height:15px; line-height:20px;"><small> <i>If you are new user </i></small></p>
              <a href="./user_area/user_registration.php"><button type="button" class="dropdown-item text-center"><i class="fas fa-user"></i>&nbsp; Register</button></a>
              <a href="./user_area/user_login.php"><button type="button" class="dropdown-item text-center bg-danger"><i class="fas fa-user"></i>&nbsp; Login</button></a>
</div>
              
     </li>
      <li><a href="cart.php"><i class="fas fa-shopping-cart"></i>cart<sup><?php  cart_item(); ?></sup></a> </li>
      <li> <a href="cart.php"><i class="fas fa-shopping-cart"></i></a> </li>
    </ul> 
</div>
</div>

</div>

         <!-- slider area -->
         <div class="slider_area">
         <div class="slider">
      <div> <a href="#">
           <img src="images/slider/slider1.jpg" alt="">
      </a>
    </div>
    <div> <a href="#">
      <img src="images/slider/slider2.jpg" alt="">
 </a>
</div>
<div> <a href="#">
  <img src="images/slider/slider3.jpg" alt="">
</a>
</div>
</div>
</div>


<?php
cart();
?>

<div class= "title bg-light mt-4 mb-3">
  <h3 class="text-center "> OUR PRODUCTS</h3>
</div>
<form class= "products bg-light" >
<div class="row px-4">
<div class="col-md-12">
<div class="row px=4">
  <?php
  get_products();
   get_unique_categories();
   get_unique_brands();

  ?>
</div>
</div>
<div class="footContainer">
<div class="socialIcons">
  <a href=""><i class="fa-brands fa-facebook"></i></a>
</div>
</div>



  <script src="js/jquery.js"></script> 
  <script src="js/jquery.bxslider.min.js"></script> 
  <script src="js/owl.carousel.js"></script>
  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/bootstrap.min.js"></script> 
  <script src="fa/js/all.js"></script>
  <script src="js/main.js"></script>

</body>
</html>