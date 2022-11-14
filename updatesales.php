<?php include('constant.php');?>
<style> -->
    .main{
    margin:1% 0;
    background-image:linear-gradient(106, 176, 76,1.0),rgba(246, 229, 141,1.0));
        height: 100vh;
        background-size:cover;
        background-position: center;
    margin-top: 50px;
    height: 75%;
}
</style>
<html>
    <head>
        <title>UPDATE sales</title>
        <link rel="stylesheet" href="admin.css">
    </head>
    <body>
    <div class=" menu text-center">
            <ul>
                <li><a href="sales.php">Back</a></li>
            </ul>
            <div class="main">
                <div class="wrapper">
                    <h1>Update sales</h1><br>
                    <?php

                        //create the id of selected sales
                        $id=$_GET['id'];

                        //create sql to get details
                        $sql = "SELECT * FROM sales WHERE sales_id=$id";
                         
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
                                                                
                                $cs_id = $row['cs_id'];
                                $date = $row['date'];
                               
                                $branch_id = $row['branch_id'];
                                $product_id = $row['product_id'];
                            }
                            else
                            {
                                //redirect the page
                                header('location:'.SITEURL.'sales.php');
                            }
                        }
                    
                    ?>
                    
                    <form align="center" action="" method="post">

                    <input type="hidden" name="id" value="<?php echo $id;?>" />
                    
                     <br> Customer id <br>

                    <input type="text" name="cs_id" id="button" value="<?php echo $cs_id;?>" /><br>
                    <br> Date<br>

                    <input type="date" name="date" id="button" value="<?php echo $date;?>" /><br>
                    
                    <br> branch id<br>

                    <input type="number" name="branch_id" id="button" value="<?php echo $branch_id;?>" /><br>
                    
                    <br> Product id<br>

                    <input type="number" name="product_id" id="button" value="<?php echo $product_id;?>" /><br>
                    
                    <br>
                    <input type="Submit" name="submit" value="Update sales" class="btn.primary">
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
               $id = $_POST['sales_id'];
               $cs_id = $_POST['cs_id'];
               $date  = $_POST['date'];
               
               $branch_id = $_POST['branch_id'];
               $product_id = $_POST['product_id'];
               
               
               //sql query
               $sql = "UPDATE sales SET
               cs_id = '$cs_id',
               date = '$date',
            
               branch_id='$branch_id',
               product_id='$product_id'
               
                
               WHERE sales_id='$id'
               ";
               //execute query
               $res = mysqli_query($conn , $sql);

               //check the query is executed successfully
               if($res==true)
               {
                   //query executed and updated
                   $_SESSION['update'] = "<div class='success'> SALES UPDATED SUCCESSFULLY</div>";
                   //redirect
                   header('location:'.SITEURL.'/sales.php');
               }
               else
               {
                   //failed
                   $_SESSION['update'] = "<div class='error'> failed to update</div>";
                   //redirect
                   header('location:'.SITEURL.'/sales.php');
               }
     
            }

        ?>
        
    </body>
</html>
