<?php include('constant.php');?>
<style>
    .main{
    margin:1% 0;
    background-image:linear-gradient(rgba(45, 52, 54,1.0),rgba(184,142,104,0.09));
        height: 100vh;
        background-size:cover;
        background-position: center;
    margin-top: 50px;
    height: 75%;
}
</style>
<html>
    <head>
        <title>ADD SALES</title>
        <link rel="stylesheet" href="admin.css">
    </head>

    <body>
        <div class=" menu text-center">
            <ul>
                <li><a href="sales.php">Back</a></li>
            </ul>
            <div class="main">
                <div class="wrapper">
                <form align="center" action="addsales.php" method="post">
                    <h1>Add sales</h1><br>
                    <?php 
                        if(isset($_SESSION['add']))//chekcing whether the session is set or not 
                        {
                            echo $_SESSION['add'];//display
                            unset($_SESSION['add']);//remove session page
                        }
                    ?>
                    <?php
                            $br="SELECT * FROM customer";
                            $run = mysqli_query($conn,$br);

                            if(mysqli_num_rows($run)>0)
                            {
                        ?>
                            <label>Enter Customer id</label><br>
                            <select name="cs_id" required>
                                <option>--Select--</option>
                                <?php 
                                    foreach($run as $row)
                                    {
                                ?>
                                <option value="<?php echo $row['cs_id'];?>"><?php echo $row['cs_id'];?></option>
                                <?php
                                    }
                                ?>
                            </select><br>
                            <?php
                            }
                            else
                            {
                                echo "no data available";
                            }
                            ?><br>
                    Enter date<br>
                    <input type="date" name="date" id="button" placeholder="date" />
                    <br>
                   
                    
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
                            </select><br>
                            <?php
                            }
                            else
                            {
                                echo "no data available";
                            }
                            ?><br>
                    <?php
                            $br="SELECT * FROM product";
                            $run = mysqli_query($conn,$br);

                            if(mysqli_num_rows($run)>0)
                            {
                        ?>
                            <label>Enter Product id</label><br>
                            <select name="product_id" required>
                                <option>--Select--</option>
                                <?php 
                                    foreach($run as $row)
                                    {
                                ?>
                                <option value="<?php echo $row['product_id'];?>"><?php echo $row['product_id'];?></option>
                                <?php
                                    }
                                ?>
                            </select><br>
                            <?php
                            }
                            else
                            {
                                echo "no data available";
                            }
                            ?><br>
                    
                    
                    <input type="Submit" name="submit" value="Add sales">

                    
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

         $id = $_POST['sales_id'];
         $cs_id = $_POST['cs_id'];
         $date  = $_POST['date'];
         
         $branch_id = $_POST['branch_id'];
         $product_id = $_POST['product_id'];
     
     //SQL query to save data into database 
     $sql = "INSERT INTO  sales SET
       sales_id='$id',
       cs_id = '$cs_id',
       date = '$date',
       
       branch_id='$branch_id',
       product_id='$product_id'
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
           $_SESSION['add'] ="<div class='add'>SALES ID ADDED</div>";
           //redirect page manage customer
           header("location:".SITEURL.'/sales.php');
       }
       else
       {
           // DATA FAILED
           //echo "failed to insert";
           $_SESSION['add'] = "failed to add sales";
           //redirect page  to add customer
           header("location:".SITEURL.'/addsales.php');
       }  

     }   



?>
    </body>
</html>