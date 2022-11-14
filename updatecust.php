<?php include('constant.php');?>
<style> -->
    .main{
    margin:1% 0;
    background-image:linear-gradient(rgba(195,134,81,0.27),rgba(184,142,104,0.09)),url(bird.jpg);
        height: 100vh;
        background-size:cover;
        background-position: center;
    margin-top: 50px;
    height: 100%;
}
</style>
<html>
    <head>
        <title>UPDATE CUSTOMER</title>
        <link rel="stylesheet" href="admin.css">
    </head>
    <body>
    <div class=" menu text-center">
            <ul>
                <li><a href="customer.php">Back</a></li>
            </ul>
            <div class="main">
                <div class="wrapper">
                    <h1>Update Customer</h1><br>
                    <?php

                        //create the id of selected customer
                        $id=$_GET['id'];

                        //create sql to get details
                        $sql = "SELECT * FROM customer WHERE cs_id=$id";
                         
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
                                $full_name = $row['cs_fname'];
                                $last_name = $row['cs_lname'];
                                $gender=$row['gender'];
                                $address = $row['cs_address'];
                                $email = $row['cs_email'];
                                $phone_no = $row['cs_phno'];
                                

                                
           

                            }
                            else
                            {
                                //redirect the page
                                header('location:'.SITEURL.'customer.php');
                            }
                        }
                    
                    ?>
                    
                    <form align="center" action="" method="post">

                    <input type="hidden" name="cs_id" value="<?php echo $id;?>" />
                    <br>
                    Enter Customer name<br>
                    <input type="text" name="fname" id="button" value="<?php echo $full_name;?> " />
                    <input type="text" name="lname" id="button" value=" <?php echo $last_name;?>" /><br><br>
                     Gender
                    <input type="text" name="gender" value="<?php echo $gender;?>" /><br>
                   
                     Address<br>
                    <input type="text" name="Cust_address" id="button" value="<?php echo $address;?>" /><br><br>
                    Enter email address <br><br>

                    <input type="text" name="Email" id="button" value="<?php echo $email;?>" /><br>
                    enter phone number <br><br>
                    <input type="phone" name="Cust_phno" id="button" value="<?php echo $phone_no;?>" /><br><br>
                    <br>
                    <input type="Submit" name="submit" value="Update Customer" class="btn.primary">
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
               $id = $_POST['cs_id'];
               $full_name = $_POST['fname'];
               $last_name = $_POST['lname'];
               $gender=$_POST['gender'];
               $address = $_POST['Cust_address'];
               $email = $_POST['Email'];
               $phone_no = $_POST['Cust_phno'];
               //sql query
               $sql = "UPDATE customer SET
               cs_fname = '$full_name',
               cs_lname = '$last_name',
               gender = '$gender',
               cs_address = '$address',
               cs_email = '$email',
               cs_phno = '$phone_no'
               WHERE cs_id='$id'
               ";
               //execute query
               $res = mysqli_query($conn , $sql);

               //check the query is executed successfully
               if($res==true)
               {
                   //query executed and updated
                   $_SESSION['update'] = "<div class='success'> CUSTOMER UPDATED SUCCESSFULLY</div>";
                   //redirect
                   header('location:'.SITEURL.'/customer.php');
               }
               else
               {
                   //failed
                   $_SESSION['update'] = "<div class='error'> failed to update</div>";
                   //redirect
                   header('location:'.SITEURL.'/customer.php');
               }
     
            }

        ?>
        
    </body>
</html>
