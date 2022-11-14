<style type="text/css">
	
    *{
        margin: 0;
        padding: 0;
        font-family: Century Gothic;
    }
    
    header{
        background-image:linear-gradient(rgba(195,134,81,0.27),rgba(184,142,104,0.09)),url(labrador.jpg);
        height: 100vh;
        background-size:cover;
        background-position: center;
        
    }
    
    
    
    
    #container ul{
        list-style:none;
        padding:10px 120px;
         margin-right: 0px;
        
    }
    #container ul li
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
        
        font-size:20px;
        position:relative;
        
    }
        
    #container ul li:hover >ul{
        color:#000;
        background-color:white;
    display:block;}
    
    
    
    #container ul ul ul{
        margin:150px;
        top:0px;
        position:absolute;
    }
    
    #container ul li a{
        text-decoration: none;
        color:white;
        font-family:cursive;
        font-size:21px;
        padding:5px 20px;
        border: 1px solid transparent;
        border-radius:20px;
        transition: 0.6s ease;
    }
    
    #container ul li a:hover 
    {
        background-color:white;
        color:#000;
    }
    .wrapper{
    padding: 1%;
    width: 80%;
    margin: 0 auto;
}
.text-center{
    text-align: center;
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
}

.menu ul li a:hover 
{
    background-color:tomato;
    color:#000;
}

.menu ul li.active a
{
    background-color:tomato;
    color:#000;
}
.main{
    margin:1% 0;
    background-color:transparent;
    margin-top: 50px;
    height: 75%;
}

.clearfix{
    float:none;
    clear:both
}
.col{
    list-style:none;
    padding:10px 120px;
    margin: 2%;
    
}
.col
{
    background-color:transparent;
    width:153px;
    display:inline-block;
    border: 1px solid black;
    border-radius:50px;
    height:45px;
    line-height:53px;
    margin-left: 50px;
    text-align:center;
    float:left;
    
    font-size:5px;
    position:relative;
    
}

.col a{
    text-decoration: none;
    color:rgb(190, 80, 190);
    font-family:cursive;
    font-size:21px;
    padding:5px 10px;
    border: 1px solid transparent;
    border-radius:10px;
    transition: 0.6s ease;
}

.col a:hover 
{
    background-color:deepskyblue;
    color:#000;
}

.col.active a
{
    background-color:tomato;
    color:#000;
}
</style>
    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>Category</title>
        <link href="" rel="stylesheet" type="text/css"><!-- linking css file to html file-->
    </head>
    
    <body>	
        <header>
            <div id="container">
            <ul>
                <li><a href="home.html">Log out</a></li>
              
                
            
            </ul>
            </div>
            <div class="one-box">
                <div class="cc">
                    <div style="color: rgb(255, 255, 255);position:absolute;top: 2px;left:160px;width: 300px;height: 70px;font-size: 60px;text-shadow: -1px 2px 2px #000;">
                     Urban<span style="color: #C533FF;">-pet</span></div>
                    </div>
        </div>
        <!--menu section ends-->
        <!--main section starts-->
        <div class="main">
            <div class="wrapper">
            <div class="col text-center">
                    <h1><a href="admin_login.php">ADMIN</a></h1>
                </div >
                <div class="col text-center">
                    <h1><a href="customer.php">CUSTOMERS</a></h1>
                </div >
                <div class="col text-center">
                    <h1><a href="petindex.php">PETS</a></h1>
                </div>
                <div class="col text-center">
                    <h1><a href="employee.php">EMPLOYEE</a></h1>
                </div>
                <div class="col text-center">
                    <h1><a href="product.php">PRODUCTS</a></h1>
                </div>
                <div class="col text-center">
                    <h1><a href="sales.php">SALES</a></h1>
                </div>
                <div class="col text-center">
                    <h1><a href="branches.php">BRANCHES</a></h1>
                </div>
                
                
                <div class="clearfix"></div>
            </div>
        </div>
    </body>
    </html>
