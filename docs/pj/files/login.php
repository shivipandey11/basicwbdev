
<?php
      
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
                       echo "<script> window.location.assign(\"cntct.php\")</script>";
                    }
                } else {
                    return "Account Not Registered";
                }
		  
            }
          $conn->close();
      
   ?>