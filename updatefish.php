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
        <title>UPDATE fish</title>
        <link rel="stylesheet" href="admin.css">
    </head>
    <body>
    <div class=" menu text-center">
            <ul>
                <li><a href="fish.php">Back</a></li>
            </ul>
            <div class="main">
                <div class="wrapper">
                    <h1>Update fish</h1><br>
                    <?php

                        //create the id of selected customer
                        $id=$_GET['id'];

                        //create sql to get details
                        $sql = "SELECT * FROM fish WHERE pet_id=$id";
                         
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
                                
                                $type = $row['type'];
                                $color=$row['color'];
                                $price = $row['price'];
                            }
                            else
                            {
                                //redirect the page
                                header('location:'.SITEURL.'fish.php');
                            }
                        }
                    
                    ?>
                    
                    <form align="center" action="" method="post">

                    
                    <br>
                    
                    Enter the fish type <br>
                    <input type="text" name="type" id="button" value="<?php echo $type;?> " /><br>
                     Enter the color <br>
                    <input type="text" name="color" value="<?php echo $color;?>" /><br>
                    Enter the price <br><br>
                    <input type="text" name="price" id="button" value="<?php echo $price;?>" /><br><br>
                    <br>
                    <input type="hidden" name="pet_id" value="<?php echo $id;?>" />
                    <input type="Submit" name="submit" value="Update fish" class="btn.primary">
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
               $id = $_POST['pet_id'];
               
               $type = $_POST['type'];
               $color=$_POST['color'];
                $price = $_POST['price'];
               //sql query
               $sql = "UPDATE fish SET
               
                type='$type',
                color='$color',
                price='$price'
               WHERE pet_id='$id'
               ";
               //execute query
               $res = mysqli_query($conn , $sql);

               //check the query is executed successfully
               if($res==true)
               {
                   //query executed and updated
                   $_SESSION['update'] = "<div class='success'> FISH UPDATED SUCCESSFULLY</div>";
                   //redirect
                   header('location:'.SITEURL.'/fish.php');
               }
               else
               {
                   //failed
                   $_SESSION['update'] = "<div class='error'> failed to update</div>";
                   //redirect
                   header('location:'.SITEURL.'/fish.php');
               }
     
            }

        ?>
        
    </body>
</html>
