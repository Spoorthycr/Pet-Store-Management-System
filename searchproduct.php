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
    background-image:linear-gradient(rgba(194, 54, 22,1.0),rgba(184,142,104,0.09));
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
                    <li><a href="product.php">Back</a></li>
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
                                <th>Product id</th>
                                <th>Product name</th>
                                <th>Product type</th>
                                <th>price</th>
                                <th>Belongs to</th>
                                <th>actions</th>
                                            
                                </tr>
                            
                            
                                <?php
                        if(isset($_POST['search']))
                        {
                            $id=$_POST['id'];
                            $sql3="SELECT * FROM product WHERE product_id=$id";
                            $res = mysqli_query($conn,$sql3);
                            if($res==TRUE){
                                //check whether data availabe or not
                                $count=mysqli_num_rows($res);
                
                                if($count==1){
                                        //get details
                                        //echo 'available';
                                        $rows=mysqli_fetch_assoc($res);
                                            //get individual data
                                            $id=$rows['product_id'];
                                            $name = $rows['prod_name'];
                                            $type = $rows['prod_type'];
                                            $price=$rows['price'];
                                            $belongs_to=$rows['belongs_to'];


                                        ?>

                                        <tr class="output">
                                       
                                        <td><?php echo $id;?></td>
                                        <td><?php echo $name;?></td>
                                        <td><?php echo $type;?></td>
                                        <td><?php echo $price;?></td>
                                        <td><?php echo $belongs_to;?></td>
                                        <td>
                                        <a href="<?php echo SITEURL;?>/updateproduct.php?id=<?php echo $id;?>" class="btn-primary">Update</a>
                                            <a href="<?php echo SITEURL;?>/deleteproduct.php?id=<?php echo $id;?>" class="btn-secondary">Delete</a>                                        </td>
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