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
#example1 {
  border: 2px solid red;
    font-family:Courier New;
 color:#D31145;
  box-shadow: 5px 10px #888888;
}

#example2{

  border: 2px solid red;
  border-radius: 40px;
   font-family:Courier New;
  color:#D31145;
  
  box-shadow: 5px 10px #888888;
}
input[type=text] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  background-color: #8DC87B;
  color: white;
  box-shadow: 10px 10px #7CB2CE;
  border-radius: 40px;
}
input[type=date] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  background-color: #8DC87B;
  color: white;
  box-shadow: 10px 10px #7CB2CE;
  border-radius: 40px;
}
input[type=password] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  background-color: #8DC87B;
  color: white;
  box-shadow: 10px 10px #7CB2CE;
  border-radius: 40px;}

textarea{
    width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  background-color: #8DC87B;
  color: white;
  box-shadow: 10px 10px #7CB2CE;
  border-radius: 40px;}

 input[type=button] {
font-size:20;
    color:white;
    background:#7CB2CE;
    display:inline;
    text-decoration:none;
    font-family:Courier New;
    transition-property:all;
    transition:all 1s;


}
 input[type=reset] {
font-size:20;
    color:white;
    background:#7CB2CE;
    display:inline;
    text-decoration:none;
    font-family:Courier New;
    transition-property:all;
    transition:all 1s;
}

 input[type=submit] {
font-size:20;
    color:white;
    background:#7CB2CE;
    display:inline;
    text-decoration:none;
    font-family:Courier New;
    transition-property:all;
    transition:all 1s;

}

#logout{
    font-size:20;
    color:white;
    background:#7CB2CE;
    display:inline;
    text-decoration:none;
    font-family:Courier New;
    transition-property:all;
    transition:all 1s;
}
</style>
     </head>
    <body bgcolor=#8DC87B>
<div style="position: absolute; top:0;right:0;"id=example1>
        <div>
        Hi 
        <?php
            $x = "user";
        if(isset($_COOKIE[$x]))
            {
                echo explode("#",$_COOKIE[$x])[0];
                echo "<br>You have ".$_COOKIE["cart_count"] ." items in your cart. <br>
            <a href=cart.php>Click Here to View Cart</a>"; ?>
            <br>
        <form method=post>
        <button name=logout id=logout>
            Log Out    
        </button>  
            </form><?php
            }
        else
        { if(isset($_SESSION["guest"]))
            {
                echo $_SESSION["guest"];
            }
            else
            {
                $_SESSION["guest"] = "guest! <br> Kindly Log In/Sign Up to make a purchase.";
                echo $_SESSION["guest"];
            }
        }
        ?>
        
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
    <DIV style="position:absolute; top:30;left:280;"><h3><a>Make In India</a></h3></div>
    <br>
    <center>
    <h3><a href="categories.php">Home</a>    &nbsp &nbsp|&nbsp &nbsp      <a href="salesanddiscounts.html">Sales And Discounts</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="cntct.php">Login/Sign up</a>    &nbsp &nbsp|&nbsp &nbsp        <a href="aboutus.html">About Us</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="contactus.html">Contact Us</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="privacypolicy.html">Privacy Policy</a></h3>
<hr>
   
    &nbsp &nbsp&nbsp &nbsp
  <a href="#"><img src="images/hm1.jpg" onmouseover="this.src='images/hm1a.jpg'" onmouseout="this.src='images/hm1.jpg'" width="300px height="180px" > 
<a href="#"><img src="images/hm2.jpg" onmouseover="this.src='images/hm2a.jpg'" onmouseout="this.src='images/hm2.jpg'" width="300px height="180px" >
<a href="#"><img src="images/hm3.jpg" onmouseover="this.src='images/hm3a.jpg'" onmouseout="this.src='images/hm3.jpg'" width="300px height="180px" >
<a href="#"><img src="images/hm4.png" onmouseover="this.src='images/hm4a.jpg'" onmouseout="this.src='images/hm4.png'" width="300px height="180px" >
<a href="#"><img src="images/hm5.jpg" onmouseover="this.src='images/hm5a.jpg'" onmouseout="this.src='images/hm5.jpg'" width="300px height="180px" >
</a>

    
        <br>
        <br>
        <br>
   <div style="position:absolute; bottom:30px;width:100%" id=example2>
<hr><center>
           <u><b>Copyrights & Copy 2017 All Rights Reserved M2I INDUSTRIES.</b></u>
        </center>        
    </div>
    
         </center>
        
    </body>   
     


</html>