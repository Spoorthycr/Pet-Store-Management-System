<?php include('constant.php');?>
<style> -->
    .main{
    margin:1% 0;
    background-image:linear-gradient(rgba(106, 176, 76,1.0),rgba(246, 229, 141,1.0));
        height: 100vh;
        background-size:cover;
        background-position: center;

    height: 75%;
}
.btn-primary{
    text-decoration: none;
    background-color: chartreuse;
    
}
</style>
<html>
    <head>
        <title>UPDATE ANIMAL</title>
        <link rel="stylesheet" href="admin.css">
    </head>
    <body>
    <div class=" menu text-center">
            <ul>
                <li><a href="animals.php">Back</a></li>
            </ul>
            <div class="main">
                <div class="wrapper">
                    <h1>Update animal</h1><br>
                    <?php

                        //create the id of selected customer
                        $id=$_GET['id'];

                        //create sql to get details
                        $sql = "SELECT * FROM animal WHERE pet_id=$id";
                         
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
                                $breed = $row['breed'];
                                $gender=$row['gender'];
                                $fur = $row['fur'];
                                $age = $row['age'];
                                $price = $row['price'];
                            }
                            else
                            {
                                //redirect the page
                                header('location:'.SITEURL.'animals.php');
                            }
                        }
                    
                    ?>
                    
                    <form align="center" action="" method="post">
                    
                    Enter Pet category<br>
                    <input type="text" name="category" id="button" value="<?php echo $category;?> " />
                    <br><br>
                    Enter the breed <br>
                    <input type="text" name="breed" id="button" value="<?php echo $breed;?> " /><br>
                     Enter the Gender <br>
                    <input type="text" name="gender" value="<?php echo $gender;?>" /><br>
                    Enter the color of Fur<br>
                    <input type="text" name="fur" id="button" value="<?php echo $fur;?>" /><br>
                    Enter the age(months) <br>
                    <input type="text" name="age" id="button" value="<?php echo $age;?>" /><br>
                    Enter the price <br>
                    <input type="text" name="price" id="button" value="<?php echo $price;?>" /><br>
                    <br>
                    <input type="hidden" name="pet_id" value="<?php echo $id;?>" />
                    <input type="Submit" name="submit" value="Update animal" class="btn-primary">
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
               $category = $_POST['category'];
               $breed = $_POST['breed'];
               $gender=$_POST['gender'];
                $fur= $_POST['fur'];
                $age = $_POST['pet_age'];
                $price = $_POST['price'];
               //sql query
               $sql = "UPDATE animal SET
               pet_category = '$category',
               breed='$breed',
                gender='$gender',
                fur='$fur',
                age='$age',
                price='$price'
               WHERE pet_id='$id'
               ";
               //execute query
               $res = mysqli_query($conn , $sql);

               //check the query is executed successfully
               if($res==true)
               {
                   //query executed and updated
                   $_SESSION['update'] = "<div class='success'> ANIMAL UPDATED SUCCESSFULLY</div>";
                   //redirect
                   header('location:'.SITEURL.'/animals.php');
               }
               else
               {
                   //failed
                   $_SESSION['update'] = "<div class='error'> failed to update</div>";
                   //redirect
                   header('location:'.SITEURL.'/animals.php');
               }
     
            }

        ?>
        
    </body>
</html>
