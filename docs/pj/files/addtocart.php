<?php
             
            
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
                            window.location.assign(\"casuals.php\")</script>";
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
            
        
        ?>
        
       