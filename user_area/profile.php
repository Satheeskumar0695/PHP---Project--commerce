<?php
 include('../includes/connect.php');
 include('../function/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
           <!-- font css fill-->
     
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     
     <link href="css/style.css" rel="stylesheet">
    
</head>
<body>
    <div class="container-fluid p-0">
     
    <nav class="navbar navbar-expand-lg  navbar-light bg-info">
  <div class="container-fluid">
    <img src="images/logo.jpg" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fas fa-shopping-cart"></i><sup><?php  cart_item(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total price:<?php total_cart_price();?> /-</a>
        </li>
        
      </ul>
      <form class="d-flex" action="../search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"  name="search_data">
        <input type="submit" value="search" class="btn btn-success" name="search_data_product">
      </form>
    </div>
  </div>
</nav>
 <!-- calling cart function -->
 <?php
cart();
?>
<nav class="navbar navbar-expand-lg  navbar-dark bg-secondary">
<ul class="navbar nav me-auto">
<li class="nav-item ">
        <?php
        if(!isset($_SESSION['username']))
         {
               echo"<li class='nav-item'>
               <a class='nav-link text-white' href='#'>Welcome Guest</a>
             </li>";
         }
         else{
          echo"<li class='nav-item'>
          <a class='nav-link text-white' href='#'>welcome ".$_SESSION['username']."</a>
        </li>";
         }
         
         ?>
        </li>
        
        <?php
        if(!isset($_SESSION['username']))
         {
               echo"<li class='nav-item'>
               <a class='nav-link text-white' href='user_login.php'>Login</a>
             </li>";
         }
         else{
          echo"<li class='nav-item'>
          <a class='nav-link text-white' href='logout.php'>Logout</a>
        </li>";
         }
         
         ?>
        </ul>
</nav>
<div class="class-row">
    <div class="col-md-2">
        <ul class="navbar-nav bg-secondary text-center mt-5" style="height:45vh">
        <li class="nav-item  ">
            <?php $username=$_SESSION['username'];?>
          <a class="nav-link text-light bg-info  "href="profile.php"><h4>Your profile</h4></a>
        </li>
        <li class="nav-item  ">
          <a class="nav-link text-light "href="profile.php">Pending order</a>
        </li>
        <li class="nav-item  ">
          <a class="nav-link text-light "href="profile.php?edit_account">Edit Account</a>
        </li>
        <li class="nav-item  ">
          <a class="nav-link text-light "href="profile.php?my_order">My orders</a>
        </li>
        <li class="nav-item  ">
          <a class="nav-link text-light "href="profile.php?delete_account">Delete Account</a>
        </li>
        <li class="nav-item  ">
          <a class="nav-link text-light "href="logout.php">Logout</a>
        </li>
        </ul>


    </div>
    <div class="col-md-10">
        <?php
      get_user_order_details();
      if(isset($_GET['edit_account']))
      {
        include('edit_account.php');
      }
        
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>