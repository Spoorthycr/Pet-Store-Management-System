<?php include('constant.php');?>
<style>
    .main{
    margin:1% 0;
    background-image:linear-gradient(rgba(106, 176, 76,1.0),rgba(246, 229, 141,1.0));
        height: 100vh;
        background-size:cover;
        background-position: center;
    margin-top: 50px;
    
}
</style>
<html>
    <head>
        <title>ADD ANIMAL</title>
        <link rel="stylesheet" href="admin.css">
    </head>

    <body>
        <div class=" menu text-center">
            <ul>
                <li><a href="animals.php">Back</a></li>
            </ul>
            <div class="main">
                <div class="wrapper">
                <form align="center" action="addanimal.php" method="post">
                    <h1>Add Animal</h1><br>
                    <?php 
                        if(isset($_SESSION['add']))//chekcing whether the session is set or not 
                        {
                            echo $_SESSION['add'];//display
                            unset($_SESSION['add']);//remove session page
                        }
                    ?><br>
                    Enter Pet Category<br>
                    <input type="text" name="category" id="button" placeholder="Category" />
                    <br><br>
            
                    Enter the breed <br>
                    <input type="text" name="breed" id="button" placeholder="Breed" /><br><br>
                     Enter the gender
                    <input type="radio" name="gender" value="F" id="rd"><span id="but" />Female</span>
                    <input type="radio" name="gender" value="M" id="rd"><span id="but" />Male</span><br><br>
                    Enter the color of Fur
                    <input type="text" name="fur" id="button" placeholder="fur" /><br><br>
                    Enter the age(months)
                    <input type="number" name="pet_age" id="button" placeholder="Pet age"/> <br><br>

                    Enter the price
                    <input type="number" name="price" id="button" placeholder="Price"/> <br><br>
                    <input type="Submit" name="submit" value="Add Animal">
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

           $pet_category = $_POST['category'];
           
           $breed = $_POST['breed'];
          if(isset($_POST['gender'])){
              $gender = $_POST['gender'];
          }
          else{
              $gender = NULL;
          }
          if($gender != NULL){
              if($gender ="female"){
                   "$gender ";
              }
              else{
                  "$gender";
              }
          }
          $fur= $_POST['fur'];
           $age = $_POST['pet_age'];
           $price = $_POST['price'];
           
     
     //SQL query to save data into database 
     $sql = "INSERT INTO animal SET
       pet_category='$pet_category',
       
       breed='$breed',
       gender='$gender',
       fur='$fur',
       age='$age',
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
           $_SESSION['add'] ="<div class='add'>ANIMAL ADDED</div>";
           //redirect page manage customer
           header("location:".SITEURL.'/animals.php');
       }
       else
       {
           // DATA FAILED
           //echo "failed to insert";
           $_SESSION['add'] = "failed to add animal";
           //redirect page  to add customer
           header("location:".SITEURL.'/addanimal.php');
       }
       
     }   



?>
    </body>
</html>