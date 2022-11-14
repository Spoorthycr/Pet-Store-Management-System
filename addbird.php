<?php include('constant.php');?>
<style>
    .main{
    margin:1% 0;
    background-image:linear-gradient(rgba(195,134,81,0.27),rgba(184,142,104,0.09)),url(bird.jpg);
        height: 100vh;
        background-size:cover;
        background-position: center;
    margin-top: 50px;
    
}
</style>
<html>
    <head>
        <title>ADD BIRD</title>
        <link rel="stylesheet" href="admin.css">
    </head>

    <body>
        <div class=" menu text-center">
            <ul>
                <li><a href="birds.php">Back</a></li>
            </ul>
            <div class="main">
                <div class="wrapper">
                <form align="center" action="addbird.php" method="post">
                    <h1>Add bird</h1><br>
                    <?php 
                        if(isset($_SESSION['add']))//chekcing whether the session is set or not 
                        {
                            echo $_SESSION['add'];//display
                            unset($_SESSION['add']);//remove session page
                        }
                    ?><br><br>
                    
                    Enter Pet Category<br>
                    <input type="text" name="Category" id="button" placeholder="Category" />
                    <br><br>
                    Enter the type<br>
                    <input type="text" name="Type" id="button" placeholder="Type" /><br><br>
                    Enter the level of noise <br>
                    <input type="radio" name="noise" value="low" id="rd"><span id="but" />low</span>
                    <input type="radio" name="noise" value="moderate" id="rd"><span id="but" />Moderate</span>
                    
                    <br><br>
                     
                    Enter the price
                    <input type="number" name="Price" id="button" placeholder="Price"/> <br><br>
                    <input type="Submit" name="submit" value="Add Bird">
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
           $pet_id=$_POST['pet_id'];
           $pet_category = $_POST['Category'];
           $type = $_POST['Type'];
           
           
          if(isset($_POST['noise'])){
              $noise = $_POST['noise'];
          }
          else{
              $noise = NULL;
          }
          if($noise != NULL){
              if($noise ="low"){
                   "$noise ";
              }
              elseif($noise ="moderate"){
                  "$noise";
              }
            
            }
          
          
          
           $price = $_POST['Price'];
           
     
     //SQL query to save data into database 
     $sql = "INSERT INTO bird SET
       pet_id='$pet_id',
       pet_category='$pet_category',
       
       type='$type',
       noise='$noise',
       price='$price'
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
           $_SESSION['add'] ="<div class='add'>BIRD ADDED</div>";
           //redirect page manage customer
           header("location:".SITEURL.'/birds.php');
       }
       else
       {
           // DATA FAILED
           //echo "failed to insert";
           $_SESSION['add'] = "failed to add bird";
           //redirect page  to add customer
           header("location:".SITEURL.'/addbird.php');
       }
      

     }   



?>
    </body>
</html>