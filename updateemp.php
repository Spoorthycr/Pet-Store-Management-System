<?php include('constant.php');?>
<style> -->
    .main{
    margin:1% 0;
    background-image:linear-gradient(rgba(106, 176, 76,1.0),rgba(246, 229, 141,1.0)););
        height: 100vh;
        background-size:cover;
        background-position: center;
    margin-top: 50px;
    height: 75%;
}
</style>
<html>
    <head>
        <title>UPDATE employee</title>
        <link rel="stylesheet" href="admin.css">
    </head>
    <body>
    <div class=" menu text-center">
            <ul>
                <li><a href="employee.php">Back</a></li>
            </ul>
            <div class="main">
                <div class="wrapper">
                    <h1>Update employee</h1><br>
                    <?php

                        //create the id of selected employee
                        $id=$_GET['id'];

                        //create sql to get details
                        $sql = "SELECT * FROM employee WHERE emp_id=$id";
                         
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
                                $full_name = $row['emp_fname'];
                                $last_name = $row['emp_lname'];
                                $gender=$row['gender'];
                                $address = $row['emp_address'];
                                $salary = $row['salary'];
                                $branch_id = $row['branch_id'];
                                $phone_no = $row['emp_phno'];
                                

                                
           

                            }
                            else
                            {
                                //redirect the page
                                header('location:'.SITEURL.'employee.php');
                            }
                        }
                    
                    ?>
                    
                    <form align="center" action="" method="post">

                    <input type="hidden" name="id" value="<?php echo $id;?>" />
                    <br>
                     Employee name<br>
                    <input type="text" name="fname" id="button" value="<?php echo $full_name;?> " />
                    <input type="text" name="lname" id="button" value=" <?php echo $last_name;?>" /><br><br>
                      Gender <br>
                    <input type="text" name="gender" value="<?php echo $gender;?>" /><br>
                   
                      Address<br>
                    <input type="text" name="address" id="button" value="<?php echo $address;?>" /><br>
                     <br> Salary <br>

                    <input type="text" name="salary" id="button" value="<?php echo $salary;?>" /><br>
                    <br> branch id<br>

                    <input type="number" name="branch_id" id="button" value="<?php echo $branch_id;?>" /><br>
                    Phone number <br>
                    <input type="phone" name="phno" id="button" value="<?php echo $phone_no;?>" /><br>
                    <br>
                    <input type="Submit" name="submit" value="Update employee" class="btn.primary">
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
               $full_name = $_POST['fname'];
               $last_name = $_POST['lname'];
               $gender=$_POST['gender'];
               $address = $_POST['address'];
               $salary = $_POST['salary'];
               $branch_id = $_POST['branch_id'];
               $phone_no = $_POST['phno'];
               //sql query
               $sql = "UPDATE employee SET
               emp_fname = '$full_name',
               emp_lname = '$last_name',
               gender = '$gender',
               emp_address = '$address',
               salary = '$salary',
               branch_id='$branch_id',
               emp_phno = '$phone_no'
               WHERE emp_id='$id'
               ";
               //execute query
               $res = mysqli_query($conn , $sql);

               //check the query is executed successfully
               if($res==true)
               {
                   //query executed and updated
                   $_SESSION['update'] = "<div class='success'> EMPLOYEE UPDATED SUCCESSFULLY</div>";
                   //redirect
                   header('location:'.SITEURL.'/employee.php');
               }
               else
               {
                   //failed
                   $_SESSION['update'] = "<div class='error'> failed to update</div>";
                   //redirect
                   header('location:'.SITEURL.'/employee.php');
               }
     
            }

        ?>
        
    </body>
</html>
