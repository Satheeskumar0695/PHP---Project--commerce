<?php
$con=mysqli_connect('localhost','root','','mystore');
if(!$con)
{
    die(mysqli_error($con));
}
include('../function/common_function.php')
?>


<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
           <!-- font css fill-->
     
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     
     <link href="css/style.css" rel="stylesheet">
    <style>
   
label.error{
  color:#f00;
}

        </style>

</head>
<body>

<div class="container-fluid mt-1 px-0">
        <h2 class="text-center mb-5">User Registration</h2>
         <div class="row d-flex justify-content-center">
            <div class="col lg-6 col-xl-5 ">
                <img src="../images/userreg.jpg" alt="admin registration" class="img-fluid">
            </div>
               <div class=" container col lg-5 col-xl-3 mx-4">
        <form id="frm" method="POST" enctype="multipart/form-data">
          <div class="form-outline ">
            <label for="user_username" class="form-label">User Name </label>
            <input type="text" id="user_username" class="form-control" name="user_username" placeholder="Enter your username" autocomplete="off" />
          </div> 
          <div class="form-outline ">
            <label for="email" class="form-label">Email id </label>
            <input type="text" id="user_email" class="form-control" name="user_email" placeholder="Enter your email_id" autocomplete="off" />
          </div>
          <div class="form-outline ">
            <label for="image" class="form-label">User image </label>
            <input type="file" id="user_image" class="form-control" name="user_image"/>
          </div>
          <div class="form-outline ">
            <label for="password" class="form-label">Password </label>
            <input type="password" id="user_password" class="form-control" pattern="/^[a-zA-Z0-9!@#\$%\^\&*_=+-]{8,12}$/g" name="user_password" placeholder="Enter your password" autocomplete="off" />
             <span id="strength"></span> 
          </div>
           <div class="form-outline ">
            <label for="conf_user_password" class="form-label"> Confirm Password </label>
            <input type="password" id=" conf_user_password" class="form-control" name="conf_user_password" placeholder="Enter your confirm password" autocomplete="off" />
          </div>
          <div class="form-outline ">
            <label for="address" class="form-label">Address</label>
            <input type="text" id="user_address" class="form-control" name="user_address" placeholder="Enter your address" autocomplete="off" />
          </div>
          <div class="form-outline  ">
            <label for="contact" class="form-label">Contact</label>
            <input type="text" id="user_contact" class="form-control" name="user_contact" placeholder="Enter your mobile no" autocomplete="off"/>
          </div>
          <div class=" mt-3 pt-1">
            <input type="submit"  id="submit" value="register"  class="bg-info  py-2 px-3 border-0" name="user_register">
            <p  class="small fw-bold mt-3 pt-2"> Already have an account..? <a href="user_login.php" class="text-bg-danger text-decoration-none">Login</a></P>
        </div>
          
        </form>
    </div>
</div>
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="js/jquery.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/hai.js"></script>
</body> 


</html>


<!-- php code for registration -->
<?php
global $con;
if(isset($_POST['user_register']))
{
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $user_conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    
    $user_ip=getIPAddress();
    


    // checking user name
     $select_query="select * from user_table where user_name='$user_username' or user_email='$user_email' ";
     $result=mysqli_query($con,$select_query);
     $row_count=mysqli_num_rows( $result);
     if( $row_count>0)
     {
        echo"<script>alert ('User name or email id  already exits')</script>";
     }
         else
     {
        $insert_query="insert into user_table (user_name,user_email,user_password,user_ip,user_address,user_mobile) values('$user_username','$user_email','$hash_password','$user_ip','$user_address','$user_contact')";
        $sql_execute=mysqli_query($con,$insert_query);
        if($sql_execute)
        {
            echo"<script>alert ('Registration successfully...')</script>";
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