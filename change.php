<?php include('constant.php');?>
<style>
    .main{
    margin:1% 0;
    background-image:linear-gradient(rgba(195,134,81,0.27),rgba(184,142,104,0.09));
        height: 100vh;
        background-size:cover;
        background-position: center;
    margin-top: 50px;
    
}
</style>
 <html>
    <head>
        <title>change password </title>
        <link rel="stylesheet" href="admin.css">
    </head>
    <body>
        <div class="menu text-center">
                    <ul>
                        <li><a href="admin_login.php">Back</a></li>
                    </ul>
        </div>
        <div class="menu">
            <div class="wrapper">
                    <h1>Change password</h1>
            </div>
        </div>


        <form class="main text-center" align=center action="" method="POST">    
            <p>Enter the old password :</p>
            <input type="text" name="oldpwd" id="button" placeholder="old password" />
            <p>Enter the new password:</p>
            <input type="text" name="newpwd" id="button" placeholder="new password"/>
            <p>Enter the confirm password:</p>
            <input type="text" name="confpwd" id="button" placeholder="confirm password"/><br><br>

            <input type="hidden" name="id" value="<?php echo $id;?>"/> 
            <input type="Submit" name="submit" class="btn-primary" value="Change password">

        </form>

        <?php

            if(isset($_POST['submit']))
            {
                //echo "clicked";
                $id=$_GET['id'];
                $cur=$_POST['oldpwd'];
                $new=$_POST['newpwd'];
                $conf=$_POST['confpwd'];

                $sql="SELECT * FROM ad_login WHERE id='$id' AND password='$cur' ";

                $res=mysqli_query($conn,$sql);

                if($res==TRUE)
                {
                    $count=mysqli_num_rows($res);

                    if($count==1)
                    {
                        //user exist and password can be changed
                            if($new==$conf)
                            {
                                //password match
                                $sql2="UPDATE ad_login SET
                                password='$new'
                                WHERE id=$id";

                                $res2=mysqli_query($conn,$sql2);

                                //check whether query executed
                                if($res2==TRUE)
                                {
                                    //success
                                    $_SESSION['change']="Password Changed";
                                    header('location:'.SITEURL.'/admin_login.php');
                                }
                                else
                                {
                                    //error
                                    $_SESSION['change']="Password not Changed";
                                    header('location:'.SITEURL.'/admin_login.php');
                                }
                            }
                            else
                            {
                                $_SESSION['pwd-not-match']="Password does not match";
                                header('location:'.SITEURL.'/admin_login.php');
                            }
                    }
                    else
                    {
                        //echo "user doesnt exist";
                        $_SESSION['user-not-found']="Error.Try again";
                        header('location:'.SITEURL.'/admin_login.php');
                    }
                }
            }
        ?>
    </body>
</html>