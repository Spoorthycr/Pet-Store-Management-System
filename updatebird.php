<?php include('constant.php');?>
<style> -->
    .main{
    margin:1% 0;
    background-image:linear-gradient(rgba(140, 122, 230,1.0),rgba(184,142,104,0.09));
        height: 100vh;
        background-size:cover;
        background-position: center;
    margin-top: 50px;
    height: 75%;
}
</style>
<html>
    <head>
        <title>UPDATE bird</title>
        <link rel="stylesheet" href="admin.css">
    </head>
    <body>
    <div class=" menu text-center">
            <ul>
                <li><a href="birds.php">Back</a></li>
            </ul>
            <div class="main">
                <div class="wrapper">
                    <h1>Update bird</h1><br>
                    <?php

                        //create the id of selected customer
                        $id=$_GET['id'];

                        //create sql to get details
                        $sql = "SELECT * FROM bird WHERE pet_id=$id";
                         
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
                                $category = $row['pet_category'];
                                $type = $row['type'];
                                $noise=$row['noise'];
                                $price = $row['price'];
                            }
                            else
                            {
                                //redirect the page
                                header('location:'.SITEURL.'birds.php');
                            }
                        }
                    
                    ?>
                    
                    <form align="center" action="" method="post">

                    
                    <br>
                    Enter Pet category<br>
                    <input type="text" name="category" id="button" value="<?php echo $category;?> " />
                    <br><br>
                    Enter the type <br>
                    <input type="text" name="type" id="button" value="<?php echo $type;?> " /><br>
                     Enter the noise <br>
                    <input type="text" name="noise" value="<?php echo $noise;?>" /><br>
                    Enter the price <br><br>
                    <input type="text" name="price" id="button" value="<?php echo $price;?>" /><br><br>
                    <br>
                    <input type="hidden" name="pet_id" value="<?php echo $id;?>" />
                    <input type="Submit" name="submit" value="Update bird" class="btn.primary">
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
               $category = $_POST['category'];
               $type = $_POST['type'];
               $noise=$_POST['noise'];
                $price = $_POST['price'];
               //sql query
               $sql = "UPDATE bird SET
               pet_category = '$category',
                type='$type',
                noise='$noise',
                price='$price'
               WHERE pet_id='$id'
               ";
               //execute query
               $res = mysqli_query($conn , $sql);

               //check the query is executed successfully
               if($res==true)
               {
                   //query executed and updated
                   $_SESSION['update'] = "<div class='success'> BIRD UPDATED SUCCESSFULLY</div>";
                   //redirect
                   header('location:'.SITEURL.'/birds.php');
               }
               else
               {
                   //failed
                   $_SESSION['update'] = "<div class='error'> failed to update</div>";
                   //redirect
                   header('location:'.SITEURL.'/birds.php');
               }
     
            }

        ?>
        
    </body>
</html>
