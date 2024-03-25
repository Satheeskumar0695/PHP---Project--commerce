<?php
include('../includes/connect.php');

if(isset($_POST['insert_product']))
{
    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $Product_keywords=$_POST['Product_keywords'];
    $product_categories=$_POST['product_categories'];
    $product_brands=$_POST['product_brands'];
    $Product_price=$_POST['Product_price'];
    $Product_status='true';

    $Product_image1=$_FILES['Product_image1']['name'];
    $Product_image2=$_FILES['Product_image2']['name'];
    $Product_image3=$_FILES['Product_image3']['name'];

    $tmp_image1=$_FILES['Product_image1']['tmp_name'];
    $tmp_image2=$_FILES['Product_image2']['tmp_name'];
    $tmp_image3=$_FILES['Product_image3']['tmp_name'];


    if($product_title=='' or  $description=='' or $Product_keywords=='' or  $product_categories=='' or $product_brands=='' or $Product_price=='' or $Product_image1=='' or $Product_image2=='' or $Product_image3=='' )
    {
        echo"<script> alert('please fill all  details...')</script>";
        exit();
    }
    else{
        move_uploaded_file($tmp_image1,"./product_images/$Product_image1");
        move_uploaded_file($tmp_image2,"./product_images/$Product_image2");
        move_uploaded_file($tmp_image3,"./product_images/$Product_image3");


        $insert_products="insert into products(product_title,product_description,product_keywords,category_id,brands_id,Product_image1,Product_image2,Product_image3,Product_price,date,status) values('$product_title',
        '$description','$Product_keywords',$product_categories,$product_brands,'$Product_image1','$Product_image2','$Product_image3',' $Product_price',now(), ' $Product_status')";
    $result_query=mysqli_query($con,$insert_products);
    if($result_query)
    {
        echo"<script> alert('successfully inserted all data...!')</script>";
    }
    
    
    }

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inert products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link href="../css/style.css" rel="stylesheet">
     
     <style>
     body
      {
        background-image:url('../images/gh.jpg');
      }
      .container
    {
      
      color:blue;
    width:700px;
    height:900px;
    
    background-color:#fff;
    padding:30px;
    border-radius: 15px;
    box-shadow: 0 0 25px rgba(0,0,0,3);
    border:10px solid #41b9ff;
}
      </style>
    </head>
<body>
    <div class="container mt-3 w-55 m-auto">
        <h1 class="text-center">Insert Products</h1>
       <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-outline mb-4 w-50 m-auto">
            <label class="from-label">Product title </label>
            <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter the product title" autocomplete="off" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label class="from-label">Description</label>
            <input type="text" name="description" id="description" class="form-control" placeholder="Enter the description" autocomplete="off" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label class="from-label">Product keywords</label>
            <input type="text" name="Product_keywords" id="Product_keywords" class="form-control" placeholder="Enter the Product keywords" autocomplete="off" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
          <select name="product_categories" class="form-select">
            <option value="">Select  a category</option>
            
             <?php
             $select_query="select * from categories";
             $result_query=mysqli_query($con,$select_query);     
             while($row_data=mysqli_fetch_assoc($result_query))
             {
                $category_title=$row_data['category_tittle'];
                $category_id=$row_data['category_id'];
                echo "<option value='$category_id'>$category_title</option>";
             }
             ?>
          </select>         
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
          <select name="product_brands" class="form-select">
            <option value="">Select  a  brands </option>
            <?php
             $select_query="select * from brands";
             $result_select=mysqli_query($con,$select_query);     
             while($row_data=mysqli_fetch_assoc($result_select))
             {
                $brands_tittle=$row_data['brands_tittle'];
                $brands_id=$row_data['brands_id'];
                echo "<option value='$brands_id'>$brands_tittle</option>";
             }
             ?>
          </select>         
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label class="from-label">Product image</label>
            <input type="file" name="Product_image1" id="Product_image1" class="form-control" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label class="from-label">Product image2</label>
            <input type="file" name="Product_image2" id="Product_image2" class="form-control" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label class="from-label">Product image3</label>
            <input type="file" name="Product_image3" id="Product_image3" class="form-control" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label class="from-label">Product_price</label>
            <input type="text" name="Product_price" id="Product_price" class="form-control" placeholder="Enter the Product price" autocomplete="off" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="insert_product" class="btn btn-success  mb-3 px-3" value="Insert Products">
        </div>
       </form>

    </div>
    





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>