<?php
include('../includes/connect.php');
// include('../function/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHECK OUT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
           <!-- font css fill-->
     
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     
     <link href="css/style.css" rel="stylesheet">
    
</head>

<body>

 
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
        
 </nav>
    
    <?php
  if(!isset($_SESSION['username']))
  {
    include('user_login.php');
  }
  else{
    include('payment.php');
  }
?>
  
</div>



    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>