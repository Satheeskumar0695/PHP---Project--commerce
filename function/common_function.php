<?php

 
function get_products()
{
    global $con;
    //condition to isset or not  //

    if(!isset($_GET['category']))
    {
        if(!isset($_GET['brand']))
        {
    $select_query="select * from products  order by rand() LIMIT 0,16";
$result_query= mysqli_query($con,$select_query);
// $row=mysqli_fetch_assoc($result_query);
// echo $row['product_title'];
while($row=mysqli_fetch_assoc($result_query))
{
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $Product_image1=$row['Product_image1'];
  $Product_price=$row['Product_price'];
  $category_id=$row['category_id'];
  $brands_id=$row['brands_id'];
  echo"<div class='col-md-2 mb-3'>
  <div class='card'>
  <img src='./admin_area/product_images/$Product_image1' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>Price: $Product_price/-</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'><i class='fas fa-shopping-cart'></i></a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
  </div>
</div>
  </div>";
  }
}

}
}
// getting  unique-category//
function get_unique_categories()
{
    global $con;

    if(isset($_GET['category']))
    {
    $category_id=$_GET['category']; 
    $select_query="select * from products where category_id= $category_id";
  $result_query=mysqli_query($con,$select_query);
$num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows==0){
    echo"<h2 class='text-center text-danger'>No stock for  this categories...!</h2>";
}
while($row=mysqli_fetch_assoc($result_query))
{
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $Product_image1=$row['Product_image1'];
  $Product_price=$row['Product_price'];
  $category_id=$row['category_id'];
  $brands_id=$row['brands_id'];
  echo"<div class='col-md-2 mb-3'>
  <div class='card'>
  <img src='./admin_area/product_images/$Product_image1' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>Price: $Product_price/-</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'><i class='fas fa-shopping-cart'></i></a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
  </div>
</div>
  </div>";
  }
}
}

// getting unique brands//


function get_unique_brands()
{
    global $con;

    if(isset($_GET['brand']))
    {
       $brand_id=$_GET['brand']; 
    $select_query="select * from products  where brands_id=$brand_id";
  $result_query= mysqli_query($con,$select_query);
$num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows==0){
    echo"<h2 class='text-center text-danger'>No brands available in this time...!</h2>";
}
while($row=mysqli_fetch_assoc($result_query))
{
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $Product_image1=$row['Product_image1'];
  $Product_price=$row['Product_price'];
  $category_id=$row['category_id'];
  $brands_id=$row['brands_id'];
  echo"<div class='col-md-2 mb-3'>
  <div class='card'>
  <img src='./admin_area/product_images/$Product_image1' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>Price: $Product_price/-</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'><i class='fas fa-shopping-cart'></i></a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
  </div>
</div>
  </div>";
  }
}
}



//  getting all function //

function get_all_product()
{
    global $con;

    if(!isset($_GET['category']))
    {
        if(!isset($_GET['brand']))
        {
    $select_query="select * from products  order by rand()";
$result_query= mysqli_query($con,$select_query);
while($row=mysqli_fetch_assoc($result_query))
{
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $Product_image1=$row['Product_image1'];
  $Product_price=$row['Product_price'];
  $category_id=$row['category_id'];
  $brands_id=$row['brands_id'];
  echo"<div class='col-md-2 mb-3'>
  <div class='card'>
  <img src='./admin_area/product_images/$Product_image1' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>Price: $Product_price/-</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'><i class='fas fa-shopping-cart'></i></a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
    </div>
</div>
  </div>";
  }
}
}
}
// // displaying brands in side nav//
function getbrands()
{
    
    global $con;
    $select_brands="select * from  brands";
    $result_brands=mysqli_query($con,$select_brands);
   
 while($row_data=mysqli_fetch_assoc($result_brands))
 {
   $brand_title=$row_data['brands_tittle'];
   $brand_id=$row_data['brands_id'];
 echo"<li class='nav-item'>
 <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>";
 }

}

// displaying brands in side nav//
function getcategories()
{
    global $con;
    $select_category="select * from  categories";
   $result_category=mysqli_query($con,$select_category);
  
while($row_data=mysqli_fetch_assoc($result_category))
{
  $category_title=$row_data['category_tittle'];
  $category_id=$row_data['category_id'];
echo"<li class='nav-item'>
<a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>";
}

}

function search_data()
{
       global $con;
if(isset($_GET['search_data_product']))
{
    $user_search=$_GET['search_data'];
    $search_query="select * from products where product_keywords like '%$user_search%'";
$result_query= mysqli_query($con,$search_query);
$num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows==0){
    echo"<h2 class='text-center text-danger'> This brands is not available...!</h2>";
}
while($row=mysqli_fetch_assoc($result_query))
{
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $Product_image1=$row['Product_image1'];
  $Product_price=$row['Product_price'];
  $category_id=$row['category_id'];
  $brands_id=$row['brands_id'];
  echo"<div class='col-md-2 mb-3'>
  <div class='card'>
  <img src='./admin_area/product_images/$Product_image1' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>Price: $Product_price/-</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'><i class='fas fa-shopping-cart'></i></a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
  </div>
</div>
  </div>";
  }
}
}


// view details//
function view_details()
{
  {
    global $con;
    //condition to isset or not  //
if(isset($_GET['product_id']))
{
    if(!isset($_GET['category']))
    {
        if(!isset($_GET['brand']))
        {
          $product_id=$_GET['product_id'];
    $select_query="select * from products where product_id=$product_id";
$result_query= mysqli_query($con,$select_query);
while($row=mysqli_fetch_assoc($result_query))
{
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $Product_image1=$row['Product_image1'];
  $Product_image2=$row['Product_image2'];
  $Product_image3=$row['Product_image3'];
  $Product_price=$row['Product_price'];
  $category_id=$row['category_id'];
  $brands_id=$row['brands_id'];
  echo"<div class='col-md-2 mb-3'>
  <div class='card'>
  <img src='./admin_area/product_images/$Product_image1' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>Price: $Product_price/-</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'><i class='fas fa-shopping-cart'></i></a>
    <a href='index.php' class='btn btn-secondary'><i class='fa-solid fa-house'></i></a>
  </div>
</div>
  </div>
  
  <div class='col-md-8'>
    <!-- related images -->
    <div class='row'>
        <div class='col-md-12'>
            <h4 class='text-center text-info mb-5'>Related products</h4>
        </div>
        <div class='col md-6'>
        <img src='./admin_area/product_images/$Product_image2' class='card-img-top' alt='$product_title'>
        </div>
        <div class='col md-6'>
        <img src='./admin_area/product_images/$Product_image3' class='card-img-top' alt='$product_title'>
        </div>
    </div>
  </div>";
  }
}
}
}
}
}
  
// get ip address function//
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;             


// cart function//
function cart()
{
  if(isset($_GET['add_to_cart']))
  {
    global $con;
    $get_ip_address=getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query="select * from  cart_details where ip_address='$get_ip_address' and product_id= $get_product_id" ;
    $result_query=mysqli_query($con,$select_query);
   $num_of_rows=mysqli_num_rows($result_query);
     if($num_of_rows>0)
     {
    echo"<script> alert (' This item already present inside the cart ')</script>";
    echo"<script>window.open('index.php','_self')</script>";
     }
      else{
        $insert_query="insert into cart_details(product_id,ip_address,quantity) values ($get_product_id,'$get_ip_address',0)";
        $result_query=mysqli_query($con,$insert_query);
        // echo"<script> alert (' This item added to the cart ')</script>";
        echo"<script>window.open('index.php','_self')</script>";
      }
    }
  }

// function get cart item number//
function cart_item()
{
  if(isset($_GET['add_to_cart']))
  {
    global $con;
    $get_ip_address=getIPAddress();
    $select_query="select * from  cart_details where ip_address='$get_ip_address'";
    $result_query=mysqli_query($con,$select_query);
   $count_cart_items=mysqli_num_rows($result_query);
    
  }
      else{
        global $con;
       $get_ip_address=getIPAddress();
       $select_query="select * from   cart_details where ip_address='$get_ip_address'";
      $result_query=mysqli_query($con,$select_query);
      $count_cart_items=mysqli_num_rows($result_query);
        
      }
      echo $count_cart_items;
    }



// total price//
 function total_cart_price()
 {
   global $con; 
   $get_ip_address=getIPAddress();
   $total_price=0;
   $cart_query="select * from cart_details where ip_address='$get_ip_address'";
   $result_query=mysqli_query($con,$cart_query);

   while($row=mysqli_fetch_array( $result_query))
   {
     $product_id=$row['product_id'];
     $select_products="select * from products where product_id='$product_id'";
     $result_product=mysqli_query($con,$select_products);
     while($row_product_price=mysqli_fetch_array($result_product))
     {
      $product_price=array($row_product_price['Product_price']); 
      $product_values=array_sum($product_price); 
      $total_price+=$product_values;
}
}
echo $total_price;
}


// get user order details

function get_user_order_details()
  {
    global $con; 
    $username=$_SESSION['username'];
    $get_details="select * from  user_table where user_name='$username'";
    $result_query=mysqli_query($con, $get_details);
    while($row_query=mysqli_fetch_array($result_query))
    {

      $user_id=$row_query['user_id'];
      if(!isset($_GET['edit_account']))
    { 
        if(!isset($_GET['my_order']))
        {
          if(!isset($_GET['delete_account']))
          {
            $get_orders="select * from  order_pending where user_id=$user_id and order_status='pending'";
            $result_orders_query=mysqli_query($con,$get_orders);
            $row_count=mysqli_num_rows($result_orders_query);
            if($row_count>0)
            {
              echo"<h3 class='text-center>You have <span class='text-danger'>$row_count</span> pending orders</h3>";
            }
            
          }

        }
      }

    }
  }


?>
