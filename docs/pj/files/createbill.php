<?php
             
             
                    $x = "user";
                    if(isset($_COOKIE[$x]))
            {
                $userDetailsArray = explode("#",$_COOKIE[$x]);
                $phno = $userDetailsArray[2];
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
                  echo "<script> alert('Bill generated successfully with order number $orderNumber'); 
                            window.location.assign(\"casuals.php\")</script>";
                    }
            ?>
        ?>
        
       