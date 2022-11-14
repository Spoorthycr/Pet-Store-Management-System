<?php include('constant.php');?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="login.css">
<title>Login</title>
</head>
<body>
    <header>
		<div id="container">
			<ul>
				
			
				<li><a href="contact.html">Contact</a></li>
				<li><a href="about.html">About</a></li>
				
				<li class="active"><a href="home.html">Home</a></li>
			</ul>
			</div>	
        <div id="login-box">
			<form action="" method="POST">
              <div class="one-box">
               <div class="cc">
                   <div style="color: rgb(255, 255, 255);position:absolute;top: 2px;left:160px;width: 300px;height: 70px;font-size: 60px;text-shadow: -1px 2px 2px #000;">
                    Urban<span style="color: #C533FF;">-pet</span></div>
                   </div>
                   <h2>
					 <?php
					 	 if(isset($_SESSION["login"]))
						  {
							  echo $_SESSION["login"];
							  unset($_SESSION["login"]);
						  }
					 
					 ?>  
				    </h2>
                   <h3>Username<br><br>
                   <input type="text" name="username" placeholder="Enter Username"/>
                   <br>Password<br><br>
                   <input type="text" name="password" placeholder="Enter Password"/>
                   <br></h3>
                   <input type="submit" name="login" value="LOGIN"/><br>
                   
						</form>			  
                   </div>

               </div>   
            

              </div>   
        

        

        </div>
    </header>
</body>
</html>
<?php

    //check if login button clicked or not
    if(isset($_POST['login']))
    {
        //process for login
        //get value 
        $username=$_POST['username'];
        $password=$_POST['password'];

        //sql query
        $sql="SELECT * FROM ad_login WHERE username='$username' AND password='$password'";

        //execute query
        $res=mysqli_query($conn,$sql);

        //count
        $count=mysqli_num_rows($res);

        if($count==1)
        {
            //user available
            $_SESSION['login']="Login successful";            
            header('location:'.SITEURL.'/category.php');
        }
        else
        {
            //user not available
            $_SESSION['login']="Login failed";
            header('location:'.SITEURL.'/login.php');
        }
    }
?>