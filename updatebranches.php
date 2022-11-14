<?php include('constant.php');?>
<style> -->
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
        <title>UPDATE branches</title>
        <link rel="stylesheet" href="admin.css">
    </head>
    <body>
    <div class=" menu text-center">
            <ul>
                <li><a href="branches.php">Back</a></li>
            </ul>
            <div class="main">
                <div class="wrapper">
                    <h1>Update branches</h1><br>
                    <?php

                        //create the id of selected branches
                        $id=$_GET['id'];

                        //create sql to get details
                        $sql = "SELECT * FROM branches WHERE branch_id=$id";
                         
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
                                $branch_address = $row['branch_address'];
                                $email = $row['email'];
                                $branch_phno = $row['branch_phno'];
                            
                            }
                            else
                            {
                                //redirect the page
                                header('location:'.SITEURL.'branches.php');
                            }
                        }
                    
                    ?>
                    
                    <form align="center" action="" method="post">

                    <input type="hidden" name="id" value="<?php echo $id;?>" />
                    <br>
                   
                     Branch address<br>
                    <input type="text" name="branch_address" id="button" value="<?php echo $branch_address;?>" /><br>
                     Branch Email  <br>

                    <input type="text" name="Email" id="button" value="<?php echo $email;?>" /><br>
                     Phone number <br>
                    <input type="phone" name="branch_phno" id="button" value="<?php echo $branch_phno;?>" /><br>
                    <br>
                    <input type="Submit" name="submit" value="Update branches" class="btn.primary">
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
               $branch_address = $_POST['branch_address'];
               $branch_phno = $_POST['branch_phno'];
               $email = $_POST['Email'];
               //sql query
               $sql = "UPDATE branches SET
               branch_address = '$branch_address',
               	branch_phno = '$branch_phno',
               email = '$email'              
               WHERE branch_id='$id'
               ";
               //execute query
               $res = mysqli_query($conn , $sql);

               //check the query is executed successfully
               if($res==true)
               {
                   //query executed and updated
                   $_SESSION['update'] = "<div class='success'> BRANCH UPDATED SUCCESSFULLY</div>";
                   //redirect
                   header('location:'.SITEURL.'/branches.php');
               }
               else
               {
                   //failed
                   $_SESSION['update'] = "<div class='error'> failed to update</div>";
                   //redirect
                   header('location:'.SITEURL.'/branches.php');
               }
     
            }

        ?>
        
    </body>
</html>
