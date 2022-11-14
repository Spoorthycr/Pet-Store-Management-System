<?php include('constant.php');?>
<style> -->
    .main{
        margin:1% 0;
    background-image:linear-gradient(rgba(195,134,81,0.27),rgba(184,142,104,0.09)),url(sign.jpg);
        height: 100vh;
        background-size:cover;
        background-position: center;
    margin-top: 40px;
    height: 100%;
}
</style>
<html>
    <head>
        <title>ADD CUSTOMER</title>
        <link rel="stylesheet" href="admin.css">
    </head>

    <body>
        <div class=" menu text-center">
            <ul>
                <li><a href="customer.php">Back</a></li>
            </ul>
            <div class="main">
                <div class="wrapper">
                <form align="center" action="addcustomer.php" method="post">
                    <h1>Add Customer</h1>
                    <?php 
                        if(isset($_SESSION['add']))//chekcing whether the session is set or not 
                        {
                            echo $_SESSION['add'];//display
                            unset($_SESSION['add']);//remove session page
                        }
                    ?><br>
                    Enter Customer name<br>
                    <input type="text" name="fname" id="button" placeholder="First Name" />
                    <input type="text" name="lname" id="button" placeholder="Last Name" /><br><br>
                     Gender
                    <input type="radio" name="gender" value="Female" id="rd"><span id="but" />Female</span>
                    <input type="radio" name="gender" value="Male" id="rd"><span id="but" />Male</span><br><br>
                     Address<br>
                    <input type="text" name="Cust_address" id="button" placeholder="Address" /><br><br>
                    Enter email address <br><br>

                    <input type="text" name="Email" id="button" placeholder="Email" /><br>
                    enter phone number <br><br>
                    <input type="phone" name="Cust_phno" id="button" placeholder="Phone No." /><br><br>
                    <input type="Submit" name="submit" value="Add Customer">
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
            $id = $_POST['customer id'];
           $full_name = $_POST['fname'];
           $last_name = $_POST['lname'];
           $gender=$_POST['gender'];
           $address = $_POST['Cust_address'];
           $email = $_POST['Email'];
           $phone_no = $_POST['Cust_phno'];
     
     //SQL query to save data into database 
     $sql = "INSERT INTO customer SET
       cs_id='$id',
       cs_fname='$full_name',
       cs_lname='$last_name',
       gender='$gender',
       cs_address='$address',
       cs_email='$email',
       cs_phno='$phone_no'
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
           //create a session variable to display msg
          $_SESSION['add'] = "<div class='add'>CUSTOMER ADDED</div>";
           //redirect page manage customer
           header("location:".SITEURL.'/customer.php');
       }
       else
       {
           // DATA FAILED
           //echo "failed to insert";
           $_SESSION['add'] = "failed to add customer";
           //redirect page  to add customer
           header("location:".SITEURL.'/addcustomer.php');
       }

     }   



?>
    </body>
</html>