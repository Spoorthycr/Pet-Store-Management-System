<?php include('constant.php');?>
<style>
    .main{
    margin:1% 0;
    background-image:linear-gradient(rgba(195,134,81,0.27),rgba(184,142,104,0.09)),url(sign.jpg);
        height: 100vh;
        background-size:cover;
        background-position: center;
    margin-top: 50px;
    height: 75%;
}
</style>
<html>
    <head>
        <title>ADD EMPLOYEE</title>
        <link rel="stylesheet" href="admin.css">
    </head>

    <body>
        <div class=" menu text-center">
            <ul>
                <li><a href="employee.php">Back</a></li>
            </ul>
            <div class="main">
                <div class="wrapper">
                <form align="center" action="addemp.php" method="post">
                    <h1>Add EMPLOYEE</h1><br>
                    <?php 
                        if(isset($_SESSION['add']))//chekcing whether the session is set or not 
                        {
                            echo $_SESSION['add'];//display
                            unset($_SESSION['add']);//remove session page
                        }
                    ?><br>
                    
                    Enter Employee name<br>
                    <input type="text" name="fname" id="button" placeholder="First Name" />
                    <input type="text" name="lname" id="button" placeholder="Last Name" /><br>
                     Gender
                    <input type="radio" name="gender" value="Female" id="rd"><span id="but" />Female</span>
                    <input type="radio" name="gender" value="Male" id="rd"><span id="but" />Male</span><br>
                     Address<br>
                    <input type="text" name="Emp_address" id="button" placeholder="Address" /><br>
                    Enter salary <br>
                    <input type="number" name="salary" id="button" placeholder="salary" /><br>
                    
                    enter phone number <br>
                    <input type="phone" name="Emp_phno" id="button" placeholder="Phone No." /><br>
                    <?php
                            $br="SELECT * FROM branches";
                            $run = mysqli_query($conn,$br);

                            if(mysqli_num_rows($run)>0)
                            {
                        ?>
                            <label>Enter Branch id</label><br>
                            <select name="branch_id" required>
                                <option>--Select--</option>
                                <?php 
                                    foreach($run as $row)
                                    {
                                ?>
                                <option value="<?php echo $row['branch_id'];?>"><?php echo $row['branch_id'];?></option>
                                <?php
                                    }
                                ?>
                            </select><br><br>
                            <?php
                            }
                            else
                            {
                                echo "no data available";
                            }
                            ?><br>
                    <input type="Submit" name="submit" value="Add Employee">
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

           $full_name = $_POST['fname'];
           $last_name = $_POST['lname'];
           $gender=$_POST['gender'];
           $address = $_POST['Emp_address'];
           $salary = $_POST['salary'];
           $branch_id=$_POST['branch_id'];
           $phone_no = $_POST['Emp_phno'];
     
     //SQL query to save data into database 
     $sql = "INSERT INTO employee SET
       emp_fname='$full_name',
       emp_lname='$last_name',
       gender='$gender',
       emp_address='$address',
       salary='$salary',
       branch_id='$branch_id',
       emp_phno='$phone_no'
       ";

       //execute query and save data in database
       $conn = mysqli_connect('localhost','root','') or die(mysqli_error());//database caonnection
       $db_select = mysqli_select_db($conn,'petstore') or die(mysqli_error());//select database

       //executing query and saving data into database

       $res =mysqli_query($conn,$sql) or die(mysqli_error());

       //check whether the(query is executed) data is inserted or not'
       if($res==TRUE)
       {
           //DATA INSERTED
           //echo "data inserted";
           $_SESSION['add'] = "<div class='add'>EMPLOYEE ADDED</div>";
           //redirect page manage customer
           header("location:".SITEURL.'/employee.php');
       }
       else
       {
           // DATA FAILED
           //echo "failed to insert";
           $_SESSION['add'] = "failed to add employee";
           //redirect page  to add customer
           header("location:".SITEURL.'/addemp.php');
       }

     }   



?>
    </body>
</html>