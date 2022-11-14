<?php include('constant.php');?>
<style> -->
    .main{
    margin:1% 0;
    background-image:linear-gradient(rgba(106, 176, 76,1.0),rgba(246, 229, 141,1.0));
        height: 100vh;
        background-size:cover;
        background-position: center;
    margin-top: 50px;
    height: 75%;
}
</style>
<html>
    <head>
        <title>UPDATE product</title>
        <link rel="stylesheet" href="admin.css">
    </head>
    <body>
    <div class=" menu text-center">
            <ul>
                <li><a href="product.php">Back</a></li>
            </ul>
            <div class="main">
                <div class="wrapper">
                    <h1>Update product</h1><br>
                    <?php

                        //create the id of selected customer
                        $id=$_GET['id'];

                        //create sql to get details
                        $sql = "SELECT * FROM product WHERE product_id=$id";
                         
                        //execute the query
                        $res=mysqli_query($conn,$sql);

                        //check whether teh query is executed or not
                        if($res==true)
                        {
                            //check whether the data is available or not
                            $count = mysqli_num_rows($res);
                            //check whether we have data or not 
                            if($count==1)
                            {
                                //get the details
                                //echo "admin available";
                                $row= mysqli_fetch_assoc($res);
                                $P_name=$row['prod_name'];
                                $type = $row['prod_type'];
                                $price = $row['price'];
                                $belongs_to=$row['belongs_to'];
                            }
                            else
                            {
                                //redirect the page
                                header('location:'.SITEURL.'product.php');
                            }
                        }
                    
                    ?>
                    
                    <form align="center" action="" method="post">

                    
                    <br>
                     Product Name <br>
                    <input type="text" name="name" id="button" value="<?php echo $P_name;?> " /><br>
                    
                    Product Type <br>
                    <input type="text" name="type" id="button" value="<?php echo $type;?> " /><br>
                    Enter the price <br>
                    <input type="text" name="price" id="button" value="<?php echo $price;?>" /><br>
                    
                    Belongs to <br>
                    <input type="text" name="belongs_to" value="<?php echo $belongs_to;?>" /><br>
                    <input type="hidden" name="id" value="<?php echo $id;?>" />
                    <input type="Submit" name="submit" value="Update product" class="btn.primary">
                </form>
                    
                    <br>
                    
                

                </div>

            </div>
            
                
            

        </div>
        <?php 

            //check whether the submit btton is clicked or not
            if(isset($_POST['submit']))
            {
                //echo "button clicked";
               //get all the values from form
               $id = $_POST['id'];
               $name = $_POST['name'];
               $type = $_POST['type'];
                $price = $_POST['price'];
                $belongs_to=$_POST['belongs_to'];
               //sql query
               $sql = "UPDATE product SET
               prod_name='$name',
                prod_type='$type',
                price='$price',
                belongs_to='$belongs_to'
               WHERE product_id='$id'
               ";
               //execute query
               $res = mysqli_query($conn , $sql);

               //check the query is executed successfully
               if($res==true)
               {
                   //query executed and updated
                   $_SESSION['update'] = "<div class='success'> PRODUCT UPDATED SUCCESSFULLY</div>";
                   //redirect
                   header('location:'.SITEURL.'/product.php');
               }
               else
               {
                   //failed
                   $_SESSION['update'] = "<div class='error'> failed to update</div>";
                   //redirect
                   header('location:'.SITEURL.'/product.php');
               }
     
            }

        ?>
        
    </body>
</html>
