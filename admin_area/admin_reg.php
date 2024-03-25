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
    <title>admin registration</title>
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
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
         <div class="row d-flex justify-content-center">
            <div class="col lg-6 col-xl-5">
                <img src="../images/adminreg.jpg" alt="admin registration" class="img-fluid">
            </div>
            <div class="col lg-6 col-xl-3">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                    <label for="name" class="form-label">Admin Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" class="form-control" >
                </div>
                <div class="form-outline mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name= "email" placeholder="Enter your email" class="form-control" autocomplete="off">
                </div>
                <div class="form-outline mb-4">
                    <label for="Password" class="form-label">Password</label>
                    <input type="password" id="password" name= "password" placeholder="Enter your password" class="form-control" autocomplete="off">
                </div>
                <div class="form-outline mb-4">
                    <label for="Confirm Password" class="form-label"> confirm Password</label>
                    <input type="password" id="cpassword" name= "cpassword" placeholder="Enter your  confirm password" class="form-control">
                </div>
                <div>
                    <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_registration" value="register">
                    <p  class="small fw-bold mt-3 pt-2"> Already have an account..? <a href="user_login.php" class="text-danger text-decoration-none">Login</a></P>

                </div>
                </form>
            </div>
         </div>
         
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<?php
global $con;
if(isset($_POST['admin_registration']))
{
    $user_username=$_POST['name'];
    $user_email=$_POST['email'];
    $user_password=$_POST['password'];
    $user_conf_user_password=$_POST['cpassword'];
   
    // checking user name
     $select_query="select * from  admin_table where name='$user_username' or email='$user_email' ";
     $result=mysqli_query($con,$select_query);
     $row_count=mysqli_num_rows( $result);
     if( $row_count>0)
     {
        echo"<script>alert ('User name or email id  already exits')</script>";
     }
         else
     {
        $insert_query="insert into admin_table (name,email,password) values('$user_username','$user_email','$user_password')";
        $sql_execute=mysqli_query($con,$insert_query);
        if($sql_execute)
        {
            echo"<script>alert ('Registration successfully...')</script>";
            echo"<script>window.open('admin_login.php','_self')</script>";
  
        }
        else{
           die(mysqli_error($con));
        }
     }

  // selecting cart items 
  $select_car_items="select * from  cart_details where ip_address='$user_ip' ";
  $result_cart=mysqli_query($con, $select_car_items);
  $row_count=mysqli_num_rows( $result_cart);
  if($row_count>0)
  {
    $_SESSION['username']=$user_username;
    echo"<script>alert ('you have items in cart')</script>";
    echo"<script>window.open('checkout.php','_self')</script>";
  
  }
else{
  echo"<script>alert window.open('../index.php','_self')</script>";

}

}
?>