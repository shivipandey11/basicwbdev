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
	<br>
	 <div style="position:absolute; top:10;left:78;"><img src="images/00.jpg" width="180px" height="75px" ></div><br><br>
	&nbsp;
	<DIV style="position:absolute; top:30;left:280;"><h3><a>MAke In India</a></h3></div>
	<br>
	<center>
	<h3><a href="home.html">Home</a>    &nbsp &nbsp|&nbsp &nbsp     <a href="categories.html">Categories</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="salesanddiscounts.html">Sales And Discounts</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="cntct.php">Login/Sign up</a>    &nbsp &nbsp|&nbsp &nbsp        <a href="aboutus.html">About Us</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="contactus.html">Contact Us</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="privacypolicy.html">Privacy Policy</a></h3>
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
                    <td><form method = post><input type=hidden value ="<?php echo $row["product_id"]; ?>" name=itemId><button name=remove>Remove Item</button></form></td>
                </tr>    
                    
           
       <?php
                    }
                }
            $conn2->close();
            $conn->close();
            
        if(isset($_REQUEST["remove"]))  
            {
                $x = "user";
                $itemId = $_REQUEST["itemId"];
                if(isset($_COOKIE[$x]))
            {
                $userDetailsArray = explode("#",$_COOKIE[$x]);
                $phno = $userDetailsArray[2];
                $conn2 = new mysqli('localhost','root','','m2i_ent_carts');
                
                $result = $conn2->query("DELETE FROM `$phno` where `product_id` = $itemId");
                
                if ($result == TRUE)
                {
                    $temp = $_COOKIE["cart_count"];
                
                    setcookie("cart_count",$temp-1,time()+(86400*20));
                    header("Refresh:2");
                }
                else
                {
                    echo $conn2->error;
                    //header("Refresh:2");
                }
                    
                //echo "<br>You have ".$_COOKIE["cart_count"] ." items in your cart.";
                
            }
            $conn2->close();
        }
        ?>
        </table>
        <br>
                Your total amount = <?php echo $billSum; ?>
        <form method=post>
            <button name=placeOrder>Place Order</button>
            
        </form>
        <?php 
                
                if(isset($_REQUEST["placeOrder"]))
                {
                    $x = "user";
                    $conn2 = new mysqli('localhost','root','','m2i_ent_carts');
                    if($conn2->query("SELECT COUNT(product_id) FROM `$phno`")->fetch_assoc()["COUNT(product_id)"] == 0)
                    {
                        exit("No Items in Cart");
                    }
                //$itemId = $_REQUEST["itemId"];
                if(isset($_COOKIE[$x]))
                {
                $userDetailsArray = explode("#",$_COOKIE[$x]);
                $phno = $userDetailsArray[2];
                $conn3 = new mysqli('localhost','root','','m2i_ent_orders');
                $orderNumber = time().rand(12345,99999);
                $qry = "CREATE TABLE `m2i_ent_orders`.`$orderNumber` ( `product_id` VARCHAR(30) NOT NULL , `count` INT(2) NOT NULL ) ENGINE = InnoDB;";
                $result = $conn2->query($qry);
                if ($result == TRUE)
                {
                    $result = $conn2->query("SELECT * FROM `$phno`");   
                while($row=$result->fetch_assoc())        
                {
                    $itemId = $row["product_id"];
                    $itemCount = $row["count"];
                    $qry = "INSERT INTO `$orderNumber` VALUES ($itemId, $itemCount)";
                    
                    $conn2->query("DELETE FROM `$phno`");
                    setcookie("cart_count",0,time()+(86400*20));
                }
                     $qry = "INSERT INTO `orderslist` (`OrderId`, `userName`, `userAddress`, `userPhone`) VALUES ($orderNumber,'".$userDetailsArray[0]."','".$userDetailsArray[3]."',$userDetailsArray[2])";
                    if($conn3->query($qry) == FALSE)
                        die($conn3->error);
                }
                else
                {
                    echo $conn3->error;
                    //header("Refresh:2");
                }
                    
                //echo "<br>You have ".$_COOKIE["cart_count"] ." items in your cart.";
                
            }
            $conn2->close();
            $conn3->close();
                  header("Refresh:2");  
                }
            ?>
	    <br>
		<br>
		<br>
	<hr>
	       <u><b>Copyrights & Copy 2016 All Rights Reserved M2I INDUSTRIES.</b></u>
	            
         </center>
	
	
	</body>	


</html>