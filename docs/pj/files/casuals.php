<html>

     <head>
	 
	         <title>  M2I  Enterprises  </title> 
 		  <style>
.product-image,a
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
a:hover, .product-image:hover
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
	 <body ><div style="position: absolute; top:0;right:0;">
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
	<div style="position:absolute; top:30;left:280;"><h3><a>MAke In India</a></h3></div>
	<br>
	<center>
	<h3><a href="home.html">Home</a>    &nbsp &nbsp|&nbsp &nbsp     <a href="categories.html">Categories</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="salesanddiscounts.html">Sales And Discounts</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="cntct.php">Login/Sign up</a>    &nbsp &nbsp|&nbsp &nbsp        <a href="aboutus.html">About Us</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="contactus.html">Contact Us</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="privacypolicy.html">Privacy Policy</a></h3>
<hr>
   
        <?php
            $conn = new mysqli('localhost','root','','m2i_ent');
            $product_array = $conn->query("SELECT * FROM products");
            

                    while($row = $product_array->fetch_assoc()){
                        $imgid = $row["id"];
                        $qry = "SELECT name FROM product_images WHERE product_id = $imgid;";
                        $res2 = $conn->query($qry);
        ?>
        <div class="product-item">
            <form method="post" >
                <div class="product-image"><?php while($row2=$res2->fetch_assoc()){?><img src="prodimages/<?php echo $row2["name"]; ?>"><?php } ?></div>
                <div class="product-tile-footer">
                    <input type=hidden value ="<?php echo $row["id"]; ?>" name=itemId>
                    <div class="product-title"><?php echo $row["name"]; ?></div>
                    <div class="product-description"><?php $desc = $row["description"]; echo html_entity_decode($desc); ?></div>
                    <div class="product-price"><?php echo "$".$row["price"]; ?></div>
                    <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" />
                        <button name=add>Add to Cart</button>
                    </div>
		          </div>
            </form>
	   </div>
        
        <?php
             }
            if(isset($_REQUEST["add"]))  
            {
               //echo $_REQUEST["quantity"];
                $x = "user";
                $itemId = $_REQUEST["itemId"];
                $itemQuantity = $_REQUEST["quantity"];
                if(isset($_COOKIE[$x]))
            {
                $userDetailsArray = explode("#",$_COOKIE[$x]);
                $phno = $userDetailsArray[2];
                $conn2 = new mysqli('localhost','root','','m2i_ent_carts');
                
                $result = $conn2->query("SELECT * FROM `$phno` WHERE `product_id` = $itemId");
                
                if ($result->num_rows>0)
                {
                    $qry = "UPDATE `$phno` SET `count`= count + $itemQuantity WHERE `product_id` = $itemId";
                }
                else
                    $qry = "INSERT INTO `$phno`(`product_id`, `count`) VALUES ($itemId,$itemQuantity)";
                    $temp = $_COOKIE["cart_count"];
                    echo $temp;
                    setcookie("cart_count",$temp+1,time()+(86400*20));
                if($conn2->query($qry) == TRUE);
                {
                    echo "<script> alert('Items Added Succesfully'); 
                            location.href='casuals.php'</script>";
                    //header("Refresh:2");
                }
                 
                    
                //echo "<br>You have ".$_COOKIE["cart_count"] ." items in your cart.";
                
            }
        else
            { 
               echo "<script>
               alert('Kindly Log In/Sign Up to Continue')
               window.location.href = 'cntct.php'</script>";
            }
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