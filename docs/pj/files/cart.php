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
body{
    color:white;
}
</style>
	 </head>
	<body bgcolor=#8DC87B >
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
	 <div style="position:absolute; top:10;left:78;"><img src="images/00.jpg" width="180px" height="75px" ></div><br><br>
	&nbsp;
	<DIV style="position:absolute; top:30;left:280;"><h3><a>MAke In India</a></h3></div>
	<br>
	<center>
	<h3><a href="categories.php">Home</a>    &nbsp &nbsp|&nbsp &nbsp      <a href="salesanddiscounts.html">Sales And Discounts</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="cntct.php">Login/Sign up</a>    &nbsp &nbsp|&nbsp &nbsp        <a href="aboutus.html">About Us</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="contactus.html">Contact Us</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="privacypolicy.html">Privacy Policy</a></h3>
<hr>
   <table>
                <tr><th></th><th>Item Name</th><th>Unit Price</th><th>Quantity</th><th>Total</th><th></th></tr>    
        <?php
            $userDetailsArray = explode("#",$_COOKIE[$x]);
                $phno = $userDetailsArray[2];
                $billSum = 0;
                $conn2 = new mysqli('localhost','root','','m2i_ent_carts');
                $conn = new mysqli('localhost','root','','m2i_ent');
                $result = $conn2->query("SELECT * FROM `$phno`");   
                while($row=$result->fetch_assoc())        
                {
                    $id = $row["product_id"];
                    $product = $conn->query("SELECT * FROM products where `id` = $id");

                    while($row1 = $product->fetch_assoc()){
                        $imgid = $row1["id"];
                        $qry = "SELECT name FROM product_images WHERE product_id = $imgid;";
                        $res2 = $conn->query($qry);
                        $row2 = $res2->fetch_assoc();
                
        ?>
                
                <tr><td><img src="prodimages/<?php echo $row2["name"]; ?>" height="300" width="250"></td>
                    <td><?php echo $row1["name"]; ?></td>
                    <td><?php echo "$".$row1["price"]; ?></td>
                    <td><?php echo $row["count"]; ?></td>
                    <td><?php   $billSum = $billSum + $row["count"]*$row1["price"];
                                echo $row["count"]*$row1["price"]; ?></td>
                    <td><form method = post action="removefromcart.php"><input type=hidden value ="<?php echo $row["product_id"]; ?>" name=itemId><input type=submit value="Remove Item"></form></td>
                </tr>    
                    
           
       <?php
                    }
                }
            $conn2->close();
            $conn->close();
            
        
        ?>
        </table>
        <br>
                Your total amount = <?php echo $billSum; ?>
        <form method=post action="createbill.php">
            <button name=placeOrder>Place Order</button>
            
        </form>

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