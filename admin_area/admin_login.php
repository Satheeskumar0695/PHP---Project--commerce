<?php
$con=mysqli_connect('localhost','root','','mystore');
if(!$con)
{
    die(mysqli_error($con));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
           <!-- font css fill-->
     
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     
     <link href="css/style.css" rel="stylesheet">
     <style>
        body{
            overflow:hidden;
        }
        </style>
</head>
<body>
    <div class="container-fluid m-5">
        <h2 class="text-center mb-5">Admin Login</h2>
         <div class="row d-flex justify-content-center">
            <div class="col lg-4 col-xl-6">
                <img src="../images/adminlogin.jpg" alt="admin registration" class="img-fluid">
            </div>
            <div class="col lg-6 col-xl-3">
                <form action="" method="post">
                    
                <div class="form-outline mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name= "email" placeholder="Enter your email" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="Password" class="form-label">Password</label>
                    <input type="password" id="password" name= "password" placeholder="Enter your password" class="form-control" >
                </div>
                
                <div>
                    <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_login" value="LOGIN">
                    <p  class="small fw-bold mt-3 pt-2"> Don't have an account..? <a href="admin_reg.php" class="text-danger text-decoration-none">Register</a></P>

                </div>
                </form>
            </div>
         </div>
         <?php
         if(isset($_POST['admin_login']))
         {
           $user_username=$_POST['email'];
           $user_password=$_POST['password'];
           $select_query="select * from  admin_table where email='$user_username' and password='$user_password'";
           if(isset( $select_query))
           {
            echo"<script>window.open('index.php','_self')</script>";

           }
           else{
            echo"<script> alert ('Invalid credentials')</script>";
          }
          
         }
         ?>
         
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
