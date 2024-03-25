
<?php
include('../includes/connect.php');
if(isset($_POST['insert_cat']))
{
  $category_title=$_POST['category_title'];

  $select_query="select * from categories where category_tittle='$category_title'";
  $result_select=mysqli_query($con,$select_query);
  $number=mysqli_num_rows($result_select);
  if($number>0)
  {
    echo "<script> alert (' This  category is  present inside the database')</script>";
  }
  else
  {
  $insert_query="insert into categories (category_tittle) values('$category_title')";
  $result=mysqli_query($con,$insert_query);
  if($result)
  {
    echo "<script> alert ('categories has been added successfully..!')</script>";
  }

}
}

?>


<h2 class="text-center text-primary"> Insert Categories</h2>
<form action=""  method="post"class="mb-2 " >
<div class="input-group   mx-5  mt-5 w-50 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-book"></i></span>
  <input type="text" class="form-control" name="category_title" placeholder="Insert category" aria-label="category" aria-describedby="basic-addon1">
</div>
<div class="input-group  mx-5 w-10 mb-2 m-auto">
<input type="submit" class="bg-info border-0 p-2 my-3" name="insert_cat" value="insert category">
</div>

</form>