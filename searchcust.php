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
    background-image:linear-gradient(rgba(195,134,81,0.27),rgba(184,142,104,0.09)),url(puppy.jpg);
        height: 100vh;
        background-size:cover;
        background-position: center;
    margin-top: 50px;
    height: 75%;
}
</style>
<html>
    <head>
        <title>search</title>
        <link rel="stylesheet" href="admin.css">
    </head>
    <body>
        <!--menu section starts-->
        <div class="menu text-center">
                <ul>
                    <li><a href="customer.php">Back</a></li>
                </ul>
        </div>
        <div class="main">
            <div class="wrapper">
                <h1>SEARCH</h1><br><br>

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
                ?>
 
                <table class="tb-full">
                                <tr>
                                <th>Customer_id</th>
                                <th>Customer fname</th>
                                <th>Customer lname</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>email</th>
                                <th>ph no</th>
                                <th>actions</th>
                                            
                                </tr>
                            
                            
                                <?php
                        if(isset($_POST['search']))
                        {
                            $cs_id=$_POST['id'];
                            $sql3="SELECT * FROM customer WHERE cs_id=$cs_id";
                            $res = mysqli_query($conn,$sql3);
                            if($res==TRUE){
                                //check whether data availabe or not
                                $count=mysqli_num_rows($res);
                
                                if($count==1){
                                        //get details
                                        //echo 'available';
                                        $rows=mysqli_fetch_assoc($res);
                                            //get individual data
                                            $full_name = $rows['cs_fname'];
                                            $last_name = $rows['cs_lname'];
                                            $gender=$rows['gender'];
                                            $address=$rows['cs_address'];
                                            $email=$rows['cs_email'];
                                            $phno=$rows['cs_phno'];


                                        ?>

                                        <tr class="output">
                                        <td><?php echo $cs_id;?></td>
                                        <td><?php echo $full_name;?></td>
                                        <td><?php echo $last_name;?></td>
                                        <td><?php echo $gender;?></td>
                                        <td><?php echo $address;?></td>
                                        <td><?php echo $email;?></td>
                                        <td><?php echo $phno;?></td>
                                        <td>
                                            <a href="<?php echo SITEURL;?>/updatecust.php?id=<?php echo $id;?>" class="btn-primary">Update</a>
                                            <a href="<?php echo SITEURL;?>/deletecust.php?id=<?php echo $id;?>" class="btn-secondary">Delete</a>
                                        </td>
                                        </td>
                                    </tr>


                                        <?php
                                }
                                else{
                                        echo "this ID is not found";
                                }
                        }
                        }


                    ?>
                </table>
            </div>
        </div>
    </body>
</html>