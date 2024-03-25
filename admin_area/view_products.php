<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h3 class="text-center text-primary"> All products</h3> 

   <table class="table table-border mt-5">
    <thead class="bg-info">
        <tr>
            <th> product id</th>
            <TH>product title</TH>
            <TH>product image </TH>
            <TH>total price</TH>
            <TH>total sold</TH>
            <TH>status</TH>
            <TH>edit</TH>
            <TH>delete</TH>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        global $con;
        $get_products="select * from products";
        $result=mysqli_query($con,$get_products);
        $number=0;
        while($row=mysqli_fetch_assoc($result))
        {
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $Product_image1=$row['Product_image1'];
            $Product_price=$row['Product_price'];
            $status=$row['status'];
            $number++;
            
            echo"<tr class='text-center'>
            <td>$number</td>
            <td>$product_title</td>
            <td><img src='./product_images/$Product_image1' class='product_img'/></td>
            <td> $Product_price/-</td>
            <td>0</td>
            <td>$status</td>
            <td><a href='' class='text-light'></a><i class='fa-solid fa-pen-to-square'></i></td>
            <td><a href='' class='text-light'></a><i class='fa-solid fa-trash'></i></td></tr>";
            
        }
        ?>
      
    </tbody>
   </table>
</body>
</html>