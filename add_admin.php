<?php include('constant.php');?>
<style> -->
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
        <title>Add_Admin</title>
        <link rel="stylesheet" href="admin.css">
    </head>
    <body>
    <div class="menu text-center">
                <ul>
                    <li><a href="admin_login.php">Back</a></li>
                </ul>
    </div>
    <div class="main">
        <div class="wrapper">
        <form class="main text-center" align=center action="" method="POST"> 
                <h1>Add Admin</h1>
                <?php 
                        if(isset($_SESSION['add']))//chekcing whether the session is set or not 
                        {
                            echo $_SESSION['add'];//display
                            unset($_SESSION['add']);//remove session page
                        }
                    ?><br><br>
                     <p>Enter the username :</p>
                    <input type="text" name="username" id="button" placeholder="Username" />
                    <p>Enter the password:</p>
                    <input type="text" name="password" id="button" placeholder="Enter Password" /><br><br>
                    <input type="Submit" name="submit" value="Add Admin">
        </form>            
        </div>
    </div>

       
       
    

    <?php
        //process value from form and save in database
        //check if submit button is clicked
        if(isset($_POST['submit']))
        {
            //button clicked
            //echo "button clicked";
            $username=$_POST['username'];
            $password=$_POST['password'];

            //sql query to save data into database
            $sql="INSERT INTO ad_login SET
            username ='$username',
            password ='$password'
            ";

            $res = mysqli_query($conn,$sql) or die (mysqli_error());
 
            //check whether inserted or nor and display appropriate messege
            if($res==TRUE){
                //data inserted
                //echo "inserted";
                $_SESSION['add']="Admin added succesfully";
                header("location:".SITEURL.'/admin_login.php');
            }
            else{
                //failed to inserted
                //echo "failed to insert";
                $_SESSION['add']="Failed to add";
                header("location:".SITEURL.'/admin_login.php');            }

        }
    ?>

    </body>
</html>