<?php include('constant.php'); ?>
<style> -->
    .main{
    margin:1% 0;
    background-image:linear-gradient(rgba(39, 60, 117,1.0),rgba(184,142,104,0.09));
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
        <link rel="stylesheet" href="admin.css">
    </head>
    <body>
        <!--menu section starts-->
        <div class="menu text-center">
                <ul>
                    <li><a href="sales.php">Back</a></li>
                </ul>
        </div>
        <div class="main">
            <div class="wrapper">
                <h1>Sales details</h1> 

                    <?php
                        
                        
                        $id=$_GET['id'];
                        $product_id=$_GET['product_id'];
                        $cs_id=$_GET['cs_id'];

                        //create sql to get details
                        $sql = "SELECT * FROM sales s,customer c,product p
                         WHERE s.sales_id=$id AND c.cs_id=$cs_id and p.product_id=$product_id";

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
                                    $sales_id=$rows['sales_id'];
                                    $cs_id=$rows['cs_id'];
                                    $cs_name=$rows['cs_fname'];
                                    $cs_phno=$rows['cs_phno'];
                                    $product_id=$rows['product_id'];
                                    $prod_name=$rows['prod_name'];
                                    $price=$rows['price'];
                                    $date=$rows['date'];
                                    

                                    ?>
                                    <form class="bg text-center" align=center > 
                                        <p><b>Customer ID :<?php echo $cs_id; ?><p><br>
                                        <p>Customer Name :<?php echo $cs_name; ?><p><br>
                                        <p>Customer Phone Number :<?php echo $cs_phno; ?><p><br>
                                        <p>Product ID :<?php echo $product_id; ?></p><br>
                                        <p>Product name :<?php echo $prod_name; ?></p><br>
                                        <p> Price :<?php echo $price; ?><p><br>
                                        <p>Date of purchase :<?php echo $date; ?></p><br>
                                    </form>
                                
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