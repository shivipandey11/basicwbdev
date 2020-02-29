<?php
             
            
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
                    $temp = $_COOKIE["cart_count"] - 1;
                    setcookie("cart_count",$temp,time()+(86400*20));
                    echo "<script> alert('Items Removed Succesfully'); 
                            window.location.assign(\"cart.php\")</script>";
                }
                else
                {
                    echo $conn2->error;
                    //header("Refresh:2");
                }
                    
                //echo "<br>You have ".$_COOKIE["cart_count"] ." items in your cart.";
                
            }
            $conn2->close();
        
        
        ?>
        
       