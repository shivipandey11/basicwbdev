<?php
      
     
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
		if($conn->query($qry)=== TRUE){
		  echo "You are successfully registered.<script> window.location.assign(\"cntct.php\")</script> " ;
        }
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
		  
	  
   ?>