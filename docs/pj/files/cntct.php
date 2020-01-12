<html>
<?php 
    session_start();
	
?>
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
<body>
    <div style="position: absolute; top:0;right:0;">
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
        <button name=logout>
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
  
	 <div style="position: absolute; top:40%; left:50%; font-size:32px">
         <b><u>OR</u></b>
         </div>
  
	<br>
	 <div style="position:absolute; top:10;left:78;"><img src="images/00.jpg" width="180px" height="75px" ></div><br><br>
	&nbsp;
	<DIV style="position:absolute; top:30;left:280;"><h3><a>MAke In India</a></h3></div>
	<br>
	<center>
	<h3><a href="categories.html">Home</a>    &nbsp &nbsp|&nbsp &nbsp     <a href="categories.html">Categories</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="salesanddiscounts.html">Sales And Discounts</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="cntct.php">Login/Sign up</a>    &nbsp &nbsp|&nbsp &nbsp        <a href="aboutus.html">About Us</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="contactus.html">Contact Us</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="privacypolicy.html">Privacy Policy</a></h3>
<hr>

<center>
    
<div style="width:50%; position:absolute; left:0">
<form name=ff method=POST>
<br> <center> <h2><u>Register Yourself Here</u></h2></center>
<center>
Your Name:<br>
<input type="text"  name=nm required><br>

Email:<br>
    <input type="text"  name=emal required><br>

Password:<br>
<input type="password" name=pswd required><br>
	
Contact Number:<br>
<input type="text" name=phno required><br>
Date Of Birth:<br>
     <input type="date"  name=dob required><br>
  <br>
 Your Delivery Address <br> 
  <textarea rows=5 cols=30 name=addr required></textarea>
  <br> 
   <input type="reset" value="Reset" required><br> 
  <br>
 <input type="submit" value="Submit" name=btn required><br>

</center>
<?php
      if(isset($_REQUEST['btn']))
	  { addb();
	  }
      function addb()
	  {
		 $conn = new mysqli('localhost','root','','m2i_ent');
	        if($conn->connect_error)
			{die("Could not connect".$conn->connect_error);
			    
			  $fp = fopen("review.txt", "a+");
				$Record = $_POST["nm"] . "----------". $_POST["emal"]. "----------". $_POST["cmnt"];
				fwrite($fp, $Record."\r\n");
				echo "<font color=olive+ font face='arial' size='4pt'>", $Record,' successfully written.', ".</font>";
				fclose ($fp);
			
			
			}else
				$nm=$_POST['nm'];
			  $emal=$_POST['emal'];
			  $addr=$_POST['addr'];
			  $phno= $_POST['phno'];
			   $dob=$_POST['dob']; 
			   $pswd=$_POST['pswd']; 
			$qry="INSERT INTO users(user_name,email_id, user_num, user_adr, usr_pwd, dob) VALUES ('$nm','$emal','$phno','$addr','$pswd','$dob');";
		if($conn->query($qry)=== TRUE)
		echo "You are successfully registered" ;
         else 
		 {echo "Error".$conn->error ;
                $fp = fopen("review.txt", "w+");
				$Record = $_POST["nm"] . " ". $_POST["emal"]. " ". $_POST["cmnt"];
				fwrite($fp, $Record."\r\n");
				echo "<font color=olive+ font face='arial' size='4pt'>", $Record,' successfully written.', ".</font>";
				fclose ($fp);
		 }
          $conn->close();
          $conn = new mysqli('localhost','root','','m2i_ent_carts');
          $qry = "CREATE TABLE `".$phno."` ( `product_id` INT(11) NOT NULL , `count` INT(3) NOT NULL, PRIMARY KEY (product_id) ) ENGINE = InnoDB; ";
          $conn->query($qry);
          $conn->close();
		  
	  }
   ?>
    </form>
    </div>
<div style="width:50%;position:absolute; right:0; padding-top:40px">
    <form name=f2 method="post">
    <center>
        <h2><u><b>Login Here:</b></u></h2>
        <br><br>
        Phone Number:<br>
        <input type=text name=lphno required value="<?php if(isset($_COOKIE["m2iusername"])) echo $_COOKIE["m2iusername"]; ?>" > <br><br>
        Password:<br>
        <input type=password name=lpswd required value="<?php if(isset($_COOKIE["m2ipassword"])) echo $_COOKIE["m2ipassword"]; ?>" >
        
        <br><br>
        <input type=checkbox name=rempass value="Yes">Remember Password<br><br>
        <input type=submit name=btn2>
    </center>
    </form>
  <?php
    if(isset($_REQUEST['btn2']))
	  { login();
	  }
      function login()
	  {
		 $conn = new mysqli('localhost','root','','m2i_ent');
         $conn2 = new mysqli('localhost','root','','m2i_ent_carts');
	        if($conn->connect_error)
			{die("Could not connect".$conn->connect_error);			
			}else
            {	
			    $phno= $_POST['lphno'];
                $pswd=$_POST['lpswd']; 
                $qry="SELECT * FROM users where user_num = '$phno';";
                $result = $conn->query($qry);
                $qry2 = "SELECT COUNT(product_id) FROM `$phno`;";
                $result2 = $conn2->query($qry2);
                $row = $result2->fetch_assoc();
                $cartCount = $row["COUNT(product_id)"];
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    {
                        if($row["usr_pwd"]==$pswd)
                        {
                            
                            $det = $row["user_name"]."#".$row["email_id"]."#".$row["user_num"]."#".$row["user_adr"]."#".$row["dob"];
                            setcookie("user",$det,time()+(86400*20));//login stays for 20 days
                            setcookie("cart_count",$cartCount,time()+(86400*20));
                            echo "Login Successful!! <br> Welcome ".$row["user_name"];
                            
                        }
                        if(isset($_POST['rempass']) && $_POST['rempass'] == 'Yes')
                        {
                            echo "<br>Password remembered<br>";
                            setcookie("m2iusername",$row["user_num"],time()+(86400*2));
                            setcookie("m2ipassword",$row["usr_pwd"],time()+(86400*2));//password remembered for 2 days
                        }
                        header("Refresh:2");
                    }
                } else {
                    echo "Account Not Registered";
                }
		  
            }
          $conn->close();
      }
   ?>
</div>
<div style="position:absolute; bottom:30px;width:100%">
<hr><center>
	       <u><b>Copyrights & Copy 2017 All Rights Reserved M2I INDUSTRIES.</b></u>
	    </center>        
    </div>
        </center>
        </center>
         
</body>
</html>