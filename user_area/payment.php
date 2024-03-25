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
    <title>PAYMENT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
           <!-- font css fill-->
     
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     
     <link href="../css/style.css" rel="stylesheet">
     <style>
        .payment-img
       {
        width:90%;
        margin:auto;
        display:block;
       }
     </style>
     
</head>
<body>
    <?php
    $user_ip=getIPAddress();
    $get_user="select * from user_table where user_ip='$user_ip'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];
    
    
    
    ?>

    <div class="class-container">
        <h2 class="text-center text-info"> Payment option</h2>
        <div class="row d-flex justify_content-center align-items-center my-4">
            <div class="col-md-6 mx-2">
            <a href="http://www.paytm.com" target="blank"><img src="../images/payment.jpg" alt=""  class="payment-img""></a>
            </div>
            <div class="col-md-4 justify-content-right" >
            <a href="order.php?user_id=<?php echo $user_id;?>"><h3 class="text-center">Pay offline</h3></a>
            </div>
            
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>