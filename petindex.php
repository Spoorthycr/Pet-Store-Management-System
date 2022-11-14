<style>
     *{
    margin: 0;
    padding: 0;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
.text-center{
text-align: center;

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
        color:tomato;
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
.main{
    
	margin:1% 0;
    background-image:linear-gradient(rgba(195,134,81,0.27),rgba(184,142,104,0.09)),url(loginhere.jpg);
        height: 100vh;
        background-size:cover;
        background-position: center;
    margin-top: 50px;
}
.wrapper{
padding: 1%;
width: 80%;
margin: 0 auto;
}
/*columns*/
.col{
list-style:none;
padding:10px 120px;
margin: 2%;

}
.col
{
background-color:transparent;
width:153px;
display:inline block;
border: 1px solid black;
border-radius:50px;
height:45px;
line-height:53px;
margin-left: 40px;
text-align:center;
float:center;

font-size:5px;
position:relative;

}


.col a{
text-decoration: none;
color:rgb(185, 40, 185);
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


</style>
    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>Pet index</title>
    <link href="" rel="stylesheet" type="text/css">
    </head>
    
    <body>	
        <header>
            <div id="container">
            <ul>
                <li><a href="category.php">Back</a></li>
               
                
            
            </ul>
            </div>
            
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
                    <h1><a href="animals.php">ANIMALS</a></h1>
                </div >
                <div class="col text-center">
                    <h1><a href="birds.php">BIRDS</a></h1>
                </div>
                <div class="col text-center">
                    <h1><a href="fish.php">FISHES</a></h1>
                </div>
                
                <div class="clearfix"></div>
            </div>
        </div>
    </body>
    </html>
