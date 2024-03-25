<?php
include('includes/connect.php');
include('function/common_function.php');
@session_start();
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
     <style>
        .card-img-top
      {
       width:75%;
       height:75%;
       object-fit:fill;
      }
      </style>
</head>
<body>
    <div class="container-fluid p-0">
     
    
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
               <a class='nav-link text-white' href='./user_area/user_login.php'>Login</a>
             </li>";
         }
         else{
          echo"<li class='nav-item'>
          <a class='nav-link text-white' href='./user_area/logout.php'>Logout</a>
        </li>";
         }
         
         ?>
        </ul>
</nav>
<div class="bg-light">
  <h3 class="text-center"> OUR PRODUCTS</h3>
</div>
<div class="row px-1">
<div class="col-md-10">
<div class="row ">
  <?php
 search_data();
  get_unique_categories();
  get_unique_brands();
  
 
?>
</div>
</div>

<div class="col-md-2 bg-secondary p-0">
  <ul class="navbar-nav mb-auto text-center">
    <li class="nav-item bg-info">
      <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
   </li>

   <?php
   getbrands();
   ?>
 </ul>
  <ul class="navbar-nav mb-auto text-center">
    
    <li class="nav-item bg-info">
      <a href="#" class="nav-link text-light"><h4>categories</h4></a>
   </li>
   <?php
   getcategories();
   ?>
   </ul>
</div>
</div>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>