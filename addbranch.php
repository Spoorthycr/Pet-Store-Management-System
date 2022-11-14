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
        <title>ADD BRANCHES</title>
        <link rel="stylesheet" href="admin.css">
    </head>

    <body>
        <div class=" menu text-center">
            <ul>
                <li><a href="branches.php">Back</a></li>
            </ul>
            <div class="main">
                <div class="wrapper">
                <form align="center" action="addbranch.php" method="post">
                    <h1>Add new branch</h1><br>
                    <?php 
                        if(isset($_SESSION['add']))//chekcing whether the session is set or not 
                        {
                            echo $_SESSION['add'];//display
                            unset($_SESSION['add']);//remove session page
                        }
                    ?><br><br>
                    
                    Enter branch address<br>
                    <input type="text" name=" address" id="button" placeholder="branch address" />
                    <br><br>
                    Enter the Phone no.<br>
                    <input type="number" name="phone no" id="button" placeholder="phone no." /><br><br>
                    Enter email address <br><br>
                    <input type="text" name="Email" id="button" placeholder="Email" /><br><br>
                    
                    <input type="Submit" name="submit" value="Add branch">

                    
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
        
           $branch_adrs= $_POST['address'];
           $phone_no = $_POST['phone_no'];
           $email = $_POST['Email'];
     
     //SQL query to save data into database 
     $sql = "INSERT INTO branches SET
       branch_address='$branch_adrs',
       email='$email',
       branch_phno='$phone_no'
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
           $_SESSION['add'] ="<div class='add'>BRANCH ADDED</div>";
           //redirect page manage customer
           header("location:".SITEURL.'/branches.php');
       }
       else
       {
           // DATA FAILED
           //echo "failed to insert";
           $_SESSION['add'] = "failed to add branch";
           //redirect page  to add customer
           header("location:".SITEURL.'/addbranch.php');
       }   

     }   



?>
    </body>
</html>