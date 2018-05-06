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
	 <body >

	 
  
	<BR>
	 <DIV style="position:absolute; top:10;left:78;"><img src="images/00.jpg" width="180px" height="75px" ></div><br><br>
	&nbsp;
	<DIV style="position:absolute; top:30;left:280;"><h3><a>MAke In India</a></h3></div>
	<br>
	<center>
	<h3><a href="home.html">Home</a>    &nbsp &nbsp|&nbsp &nbsp     <a href="categories.html">Categories</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="salesanddiscounts.html">Sales And Discounts</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="cntct.php">Login/Sign up</a>    &nbsp &nbsp|&nbsp &nbsp        <a href="aboutus.html">About Us</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="contactus.html">Contact Us</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="privacypolicy.html">Privacy Policy</a></h3>
<hr>

<center>
<form name=ff method=POST>
<BR> <center> <h2><u>Contact Us, We will ping you back. </u></h2></center>
<center>
Your Name:<br>
<input type="text"  name=nm><br>

Email:<br>
    <input type="text"  name=emal><br>

Mailing Address:<br>
<input type="text" name=addr ><br>
	
User Name:<br>
<input type="text" name=usnm><br>
Date Of Birth:<br>
     <input type="text"  name=dob><br>
  <br>
 Your Message <br> 
  <textarea rows=5 cols=30 name=cmnt></textarea>
  <br> 
   <input type="reset" value="Reset"><br> 
  <br>
 <input type="submit" value="Submit" name=btn><br>

</center>
<?php
      if(isset($_REQUEST['btn']))
	  { addb();
	  }
      function addb()
	  {
		 $conn = new mysqli('localhost','root','sunbeam','project');
	        if($conn->connect_error)
			{die("Could not connect".$conn->connect_error);
			    
			  $fp = fopen("review.txt", "w+");
				$Record = $_POST["nm"] . "----------". $_POST["emal"]. "----------". $_POST["cmnt"];
				fwrite($fp, $Record."\r\n");
				echo "<font color=olive+ font face='arial' size='4pt'>", $Record,' successfully written.', ".</font>";
				fclose ($fp);
			
			
			}else
				$nm=$_POST['nm'];
			  $emal=$_POST['emal'];
			  $addr=$_POST['addr'];
			  $usnm= $_POST['usnm'];
			   $dob=$_POST['dob']; 
			   $cmnt=$_POST['cmnt']; 
			$qry="INSERT INTO usdetails(usrname,usemail, usaddress, usname, usrdob, comments) VALUES ('$nm','$emal','$addr','$usnm','$dob','$cmnt');";
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
			
			
			
		 
		  
		  
		  
		  
		  
	  }
   ?><?phpecho "<p><center>This page has been viewed <strong>" .$_SESSION['visits']. "</strong> times.</center></p>"
	?>
<hr>
	       <u><b>Copyrights & Copy 2017 All Rights Reserved M2I INDUSTRIES.</b></u>
	            

</body>
</html>