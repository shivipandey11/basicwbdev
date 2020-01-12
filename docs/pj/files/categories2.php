<html>

     <head>
	 
	         <title>  M2I  Enterprises  </title> 
 		  <style>
a
	{
	font-size:20;
	color:white;
	background:#7CB2CE;
	display:inline;
	text-decoration:none;
	font-family:Courier New;
	transition-property:all;
	transition:all 1s;

	}
a:hover
	{
	text-decoration:none;
	font-size:30;
	color:white;
	background:#D31145;
	display:inline;
	font-family:Courier New;
	border-radius:2cm;

	}


</style>
	 </head>
	 <body >

<div style="position: absolute; top:0;right:0;">
        <div>
        Hi 
        <?php
            $x = "user";
        if(isset($_COOKIE[$x]))
            {
                echo explode("#",$_COOKIE[$x])[0];
                echo "<br>You have ".$_COOKIE["cart_count"] ." items in your cart.";
            }
        else
        { if(isset($_SESSION["guest"]))
            {
                echo $_SESSION["guest"];
            }
            else
            {
                $_SESSION["guest"] = "guest";
                echo $_SESSION["guest"];
            }
          if(isset($_SESSION["cart"]))
            {
                echo "<br>You have ".count($_SESSION["cart"])." items in your cart.";
            }
            else
            {
                $_SESSION["cart"] = [];
                echo "<br>You have ".count($_SESSION["cart"])." items in your cart.";
            }
        }
        ?>
        <br>
        <form method=post>
        <button name=logout>
            Log Out    
        </button>  
            </form>
        <?php
            if(isset($_REQUEST['logout']))
            {
                setcookie("user","abcd",time()-3600);
                setcookie("cart_count","abcd",time()-3600);
                echo "Log out successful";
                header("Refresh:2");
            }
            ?>
        </div>    
    </div>  
	<br>
	 <DIV style="position:absolute; top:10;left:78;"><img src="images/00.jpg" width="180px" height="75px" ></div><br><br>
	&nbsp;
	<DIV style="position:absolute; top:30;left:280;"><h3><a>MAke In India</a></h3></div>
	<br>
	<center>
	<h3><a href="home.html">Home</a>    &nbsp &nbsp|&nbsp &nbsp     <a href="categories.html">Categories</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="salesanddiscounts.html">Sales And Discounts</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="cntct.php">Login/Sign up</a>    &nbsp &nbsp|&nbsp &nbsp        <a href="aboutus.html">About Us</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="contactus.html">Contact Us</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="privacypolicy.html">Privacy Policy</a></h3>
<hr>
   
    &nbsp &nbsp&nbsp &nbsp
    <a href="casuals.php"> <img src="images/mcasual.jpg" onmouseover="this.src='images/mcasuala.jpg'" onmouseout="this.src='images/mcasual.jpg'" width="300px" height="180px"> </a>
    <a href="#"> <img src="images/mformal.jpg" onmouseover="this.src='images/mformala.jpg'" onmouseout="this.src='images/mformal.jpg'" width="300px" height="180px"> </a>
    <a href="#"> <img src="images/methnic.jpg" onmouseover="this.src='images/methnica.jpg'" onmouseout="this.src='images/methnic.jpg'" width="300px" height="180px"> </a>
	<br>&nbsp &nbsp&nbsp &nbsp
    <a href="#"> <img src="images/mparty.jpg" onmouseover="this.src='images/mpartya.jpg'" onmouseout="this.src='images/mparty.jpg'"width="300px" height="180px"> </a>
    <a href="#"> <img src="images/mkids.jpg" onmouseover="this.src='images/mkidsa.jpg'" onmouseout="this.src='images/mkids.jpg'"width="300px" height="180px"> </a>
	
	
	    <br>
		<br>
		<br>
	<hr>
	       <u><b>Copyrights & Copy 2016 All Rights Reserved M2I INDUSTRIES.</b></u>
	            
	
	
         </center>
        
	</body>	  
	 


</html>