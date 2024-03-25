<?php
$con=mysqli_connect('localhost','root','','mystore');
if(!$con)
{
    die(mysqli_error($con));
}
include('../function/common_function.php');
@session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
           <!-- font css fill-->
     
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     
     <link href="css/style.css" rel="stylesheet">
    <style>
          .background_image
          {
            color:blue;
            
          }
    /* .container-fluid 
    {
      color:blue;
    width:400px;
    height:400px;
    background-color:#fff;
    padding:30px;
    border-radius: 15px;
    box-shadow: 0 0 25px rgba(0,0,0,3);
    border:10px solid #41b9ff;
} */

        </style>

</head>
<body class="background_image">

<div class="container-fluid mt-1 px-0">
        <h2 class="text-center mb-5">User Login</h2>
         <div class="row d-flex justify-content-center">
            <div class="col lg-6 col-xl-5 ">
                <img src="../images/userlogin.jpg" alt="admin registration" class="img-fluid">
            </div>
            <div class=" container col lg-5 col-xl-3 mx-4">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-outline mb-4">
            <label for="user_username" class="form-label">User Name </label>
            <input type="text" id="user_username" class="form-control" name="user_username" placeholder="Enter your username" autocomplete="off" required="required"/>
          </div> 
          
          <div class="form-outline mb-4">
            <label for="password" class="form-label">Password </label>
            <input type="password" id="user_password" class="form-control" name="user_password" placeholder="Enter your password" autocomplete="off" required="required"/>
          </div>
          
          <div class=" mt-4 pt-2">
            <input type="submit" value="Login"  class="bg-info  py-2 px-3 border-0" name="user_login">
            <p  class="small fw-bold mt-2 pt-1"> Don't have an account..? <a href="user_registration.php" class="text-danger text-decoration-none">Register</a></P>
        </div>
          
        </form>
    </div>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<?php
if(isset($_POST['user_login']))
{
  $user_username=$_POST['user_username'];
  $user_password=$_POST['user_password'];
  $select_query="select * from user_table where user_name='$user_username'";
  $result=mysqli_query($con, $select_query);
  $row_count=mysqli_num_rows($result);
  $row_data=mysqli_fetch_assoc($result);
   $user_ip=getIPAddress();

  //cart items ...
 $select_query_cart="select * from cart_details where ip_address='$user_ip'";
  $select_cart=mysqli_query($con, $select_query_cart);
  $row_count_cart=mysqli_num_rows($select_cart);

  if($row_count>0)
  {
    $_SESSION['username']=$user_username;
if(password_verify($user_password,$row_data['user_password'])){
  
  if($row_count==1 and $row_count_cart==0)
  { $_SESSION['username']=$user_username;
    echo"<script> alert (' login successfully..')</script>";
    echo"<script>window.open('profile.php','_self')</script>";
  }
  else{
    $_SESSION['username']=$user_username;
    echo"<script> alert (' login successfully..')</script>";
    echo"<script>window.open('payment.php','_self')</script>";
  }
}
}
else{
  echo"<script> alert ('Invalid credentials')</script>";
}
  }
  else{
    // echo"<script> alert ('Invalid credentials')</script>";
  }

?>