<?php include('constant.php');?>
<style>
    .main{
    margin:1% 0;
    background-image:linear-gradient(rgba(195,134,81,0.27),rgba(184,142,104,0.09)),url(labrador.jpg);
        height: 100vh;
        background-size:cover;
        background-position: center;
    margin-top: 50px;
    height: 75%;
}
</style>
<html>
    <head>
        <title>ADD PRODUCTS</title>
        <link rel="stylesheet" href="admin.css">
    </head>

    <body>
        <div class=" menu text-center">
            <ul>
                <li><a href="product.php">Back</a></li>
            </ul>
            <div class="main">
                <div class="wrapper">
                <form align="center" action="addproduct.php" method="post">
                    <h1>Add Product</h1><br>
                    <?php 
                        if(isset($_SESSION['add']))//chekcing whether the session is set or not 
                        {
                            echo $_SESSION['add'];//display
                            unset($_SESSION['add']);//remove session page
                        }
                    ?><br><br>
                   
                    Enter product name<br>
                    <input type="text" name="product_name" id="button" placeholder="product name" />
                    <br><br>
                    Enter product type<br>
                    <input type="text" name="type" id="button" placeholder="type" /><br><br>
                    Enter the price<br>
                    <input type="number" name="price" id="button" placeholder="price" /><br><br>
                    It belongs to<br>
                    <input type="text" name="belongs_to" id="button" placeholder="belongs to" /><br><br>
                    <input type="Submit" name="submit" value="Add Product">

                    
</form>
                    
                    <br>
                

                </div>

            </div>
            
                
            

        </div>
        <?php 
   //process the value from form and save it in database


     //check whetehr the login button is clicked or not
     if(isset($_POST['submit']))
     {
         //Button clicked
         //echo "Button Clicked"; 
         //get the data from the form

           $prod_name = $_POST['product_name'];
           $prod_type = $_POST['type'];
           $price = $_POST['price'];
           $belongs_to=$_POST['belongs_to'];
           
     
     //SQL query to save data into database 
     $sql = "INSERT INTO  product SET
       prod_name='$prod_name',
       
       prod_type='$prod_type',
       price='$price',
       belongs_to='$belongs_to'
       ";

       //execute query and save data in database
       $conn = mysqli_connect('localhost','root','') or die(mysqli_error());//database caonnection
       $db_select = mysqli_select_db($conn,'petstore') or die(mysqli_error());//select database

       //executing query and saving data into database

       $res =mysqli_query($conn,$sql) or die(mysqli_error($conn));

       //check whether the(query is executed) data is inserted or not'
      if($res==TRUE)
       {
           //DATA INSERTED
           //echo "data inserted";

           $_SESSION['add'] ="<div class='add'>PRODUCT ADDED</div>";
           //redirect page manage product
           header("location:".SITEURL.'/product.php');
       }
       else
       {
           // DATA FAILED
           //echo "failed to insert";
           $_SESSION['add'] = "failed to add product";
           //redirect page  to add product
           header("location:".SITEURL.'/addproduct.php');
       }  
     }   



?>
    </body>
</html>