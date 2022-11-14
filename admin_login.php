<?php include('constant.php');?>
<style>
    *{
    margin: 0;
    padding: 0;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
.wrapper{
    padding: 1%;
    width: 80%;
    margin: 0 auto;
}
.text-center{
    text-align: center;
}
.tb-full{
    font-family: arial, sans-serif;
    border-collapse: collapse;
    outline:#b40a70 solid 5px;
    width: 100%;
    margin:5px ;
    background: #FAFAFA;
}
td, th {
    border: 1px solid black;
    text-align: center;
    padding: 8px;
}
.menu ul{
    list-style:none;
    padding:10px 120px;
    margin-right: 0px;
    
}
.menu ul li
{
    background-color:transparent;
    width:153px;
    display:inline-block;
    border: 1px solid transparent;
    border-radius:50px;
    height:45px;
    line-height:53px;
    text-align:center;
    float:right;
    
    font-size:5px;
    position:relative;
    
}
    
.menu ul li:hover >ul{
    color:#000;
    background-color:tomato;
    display:block;
}

.menu ul ul ul{
    margin-left:200px;
    top:0px;
    position:absolute;
}

.menu ul li a{
    text-decoration: none;
    color:tomato;
    font-family:cursive;
    font-size:21px;
    padding:5px 10px;
    border: 1px solid transparent;
    border-radius:10px;
    transition: 0.6s ease;
    float:right;
}

.menu ul li a:hover 
{
    background-color:tomato;
    color:#000;
}

th{
  background-color:#8d2663;
}
.output{
    text-align :center;
    background-color :white;
    border :1px solid blueviolet;
    padding: 2px;
    border-collapse: collapse;
}
.btn-primary{
    text-decoration: none;
    background-color: chartreuse;
    
    
}
.btn-primary: hover{
    background color: #2ed573;
}
.btn-secondary{
    text-decoration: none;
    background-color: coral;
}
.btn-secondary: hover{
    background color: #ff4757;
}
.success{
    color: #2ecc71;
    
}
.error{
    color:#e17055;
}
.add{
    color:#2980b9;
}
    
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
        <title>PET STORE MANAGEMENT</title>
        <link href="" rel="stylesheet" type="text/css">
    </head>
    <body>
        <!--menu section starts-->
        <div class="menu text-center">
                <ul>
                    <li><a href="category.php">Back</a></li>
                    <li><a href="add_admin.php" style="font-size:18px">Add Admin</a></li>
                </ul>
        </div>
        <div class="main">
            <div class="wrapper">
                <h1>Manage Admin</h1>

                <?php
                    if(isset($_SESSION["add"]))
                    {
                        echo $_SESSION["add"];
                        unset($_SESSION['add']);
                    }
                    if(isset($_SESSION["delete"]))
                    {
                        echo $_SESSION["delete"];
                        unset($_SESSION['delete']);
                    }
                    if(isset($_SESSION["update"]))
                    {
                        echo $_SESSION["update"];
                        unset($_SESSION['update']);
                    }
                    if(isset($_SESSION["pwd-not-match"]))
                    {
                        echo $_SESSION["pwd-not-match"];
                        unset($_SESSION['pwd-not-match']);
                    }
                    if(isset($_SESSION["user-not-found"]))
                    {
                        echo $_SESSION["user-not-found"];
                        unset($_SESSION['user-not-found']);
                    }
                    if(isset($_SESSION["change"]))
                    {
                        echo $_SESSION["change"];
                        unset($_SESSION['change']);
                    }
                ?>

                <table class="tb-full">
                    <tr>
                        <th>sl no</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        $sql="SELECT * from ad_login";

                        $res=mysqli_query($conn,$sql);

                        if($res==TRUE)
                        {
                            //count rows
                            $count=mysqli_num_rows($res);
                            //fucn to get rows
                            if($count>0)
                            {
                                while($rows=mysqli_fetch_assoc($res)){
                                    
                                    //getting data
                                    $id=$rows['id'];
                                    $username=$rows['username'];
                                    $password=$rows['password'];

                                    ?>
                                    <tr class="output">
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td><?php echo $password; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL;?>/change.php?id=<?php echo $id;?>" class="btn-primary">Change password</a>
                                            <a href="<?php echo SITEURL;?>/delete_admin.php?id=<?php echo $id;?>" class="btn-secondary">Delete</a>
                                        </td>
                                    </tr>
                                
                                <?php
                                }
                            }
                            else
                            {

                            }
                        }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>