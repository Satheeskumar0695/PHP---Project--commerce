<?php
include('./includes/connect.php');
include('function/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
           <!-- font css fill-->
     
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     
     <link href="css/style.css" rel="stylesheet">
    <style>
      body
      {
        background-image:url('images/cart.jpg');
      }
      .cart_image
      {
       width:100px;
       height:100px;
       object-fit:contain;
      }
       .container-fluid
    {
      
      color:blue;
    width:1200px;
    height:500px;
    
    background-color:#fff;
    padding:30px;
    border-radius: 15px;
    box-shadow: 0 0 25px rgba(0,0,0,3);
    border:10px solid #41b9ff;
}
  
    </style>
</head>
<body>
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
        </li>
        </ul>
</nav>
    <div class="container-fluid mt-5 p-0">
     
    
 <!-- calling cart function -->
 <?php
cart();
?>

<div class= "title ">
  <h3 class="text-center "> OUR PRODUCTS</h3>
</div>

<div class="container ">
<div class="row">
  <form action="" method="post">

    <div class="container mt-10">
    <table class="table table-bordered text-center">
    
                     <!-- display the code for dynamic data  -->
                     <?php
                      global $con; 
                      $get_ip_address=getIPAddress();
                      $total_price=0;
                      $cart_query="select * from cart_details where ip_address='$get_ip_address'";
                      $result_query=mysqli_query($con,$cart_query);
                      $result_count=mysqli_num_rows($result_query);
                      if($result_count>0){
                     echo  "<thead>
            <tr>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Remove</th>
                <th colspan='2'> Operation</th>
             </tr>
        </thead>
        <tbody>";
                         while($row=mysqli_fetch_array( $result_query))
                      {
                        $product_id=$row['product_id'];
                        $select_products="select * from products where product_id='$product_id'";
                        $result_product=mysqli_query($con,$select_products);
                        while($row_product_price=mysqli_fetch_array($result_product))
                        {
                         $product_price=array($row_product_price['Product_price']); 
                         $price_table=$row_product_price['Product_price'];
                         $product_title=$row_product_price['product_title'];
                         $product_image1=$row_product_price['Product_image1'];
                         $product_values=array_sum($product_price); 
                         $total_price+=$product_values;
                   
                  
                     
                     ?>


            <tr>
                <td><?php  echo $product_title;?></td>
                <td><img src="./images/<?php  echo $product_image1;?>"alt=""class="cart_image"></td>
                <td><input type="text" name="qty"class="form-input w-50"></td>
                <?php  
                global $con; 
                $get_ip_address=getIPAddress();
                if(isset($_POST['update_cart']))
                {
                  $quantities=$_POST['qty'];
                  $update_cart="update cart_details set quantity=$quantities where ip_address= '$get_ip_address'";
                  $result_product_quantity=mysqli_query($con,$update_cart);
                  $total_price=$total_price*$quantities;
                }
            
                ?>
                <td><?php  echo  $price_table;?></td>
                <td><input type="checkbox" name="remove_item[]" value="<?php   echo $product_id;?>"></td>
                <td>
                
                   <input type="submit"  value="update cart" class="bg-info px-3  py-2 border-0 mx-3" name="update_cart">
                   <button type="submit"   class="bg-danger px-3  py-2 border-0 mx-3" name="remove_cart"><i class="fa fa-trash"></i></button>
                </td>
                
            </tr>
            <?php }}}
            
            else{
              echo"<h2 class='text-center text-danger'> cart is empty </h2>";
            }
            
            
            
            ?>
        </tbody>
    </table>
    </div>
      
    <div class="d-flex mb-5">
      <?php

global $con; 
$get_ip_address=getIPAddress();
// $total_price=0;
$cart_query="select * from cart_details where ip_address='$get_ip_address'";
$result_query=mysqli_query($con,$cart_query);
$result_count=mysqli_num_rows($result_query);
if($result_count>0){
echo" <h4 class='px-3'>Subtotal:$total_price<strong class=text-info></strong></h4>

<input type='submit' name='Continue_shopping' value='Continue shopping' class='bg-info px-3  py-2 border-0 mx-3'>
<button class='bg-secondary p-3 py-2 border-0 '><a href='./user_area/checkout.php' class='text-light text-decoration-none'>Checkout</button></a>";
}
else
{
  echo"<input type='submit'   name='Continue shopping' value='Continue shopping' class='bg-info px-3  py-2 border-0 mx-3' name='Continue shopping'>";
}

if(isset($_POST['Continue_shopping']))
{
  echo"<script>window.open('index.php','_self')</script>";
}
      ?>
        
    </div>
</div>
</form>

<!-- function to remove items -->
<?php

function remove_cart_item()
{
  global $con;
  if(isset($_POST['remove_cart']))
  {
    foreach($_POST['remove_item'] as $remove_id)
    {
      echo $remove_id;
      $delete_query="delete from  cart_details where product_id=$remove_id";
      $run_delete=mysqli_query($con,$delete_query);
      if($run_delete)
      {
        echo"<script>window.open('cart.php','_self')</script>";
      }
    }

  }
}
echo $remove_items=remove_cart_item();
?>

</div>
 
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>