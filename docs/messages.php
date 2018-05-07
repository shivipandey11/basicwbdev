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

	 
  
	<BR>
	 <DIV style="position:absolute; top:10;left:78;"><img src="images/00.jpg" width="180px" height="75px" ></div><br><br>
	&nbsp;
	<DIV style="position:absolute; top:30;left:280;"><h3><a>MAke In India</a></h3></div>
	<br>
	<center>
	<h3><a href="home.html">Home</a>    &nbsp &nbsp|&nbsp &nbsp     <a href="categories.html">Categories</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="salesanddiscounts.html">Sales And Discounts</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="cntct.php">Login/Sign up</a>    &nbsp &nbsp|&nbsp &nbsp        <a href="aboutus.html">About Us</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="contactus.html">Contact Us</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="privacypolicy.html">Privacy Policy</a></h3>
<hr>

<center>
<?php

	  
		 $conn = new mysqli('localhost','root','sunbeam','project');
	        if($conn->connect_error)
			{die("Could not connect".$conn->connect_error);
			    	$File = "review.txt";
		$fp = fopen($File, "r"); 				
		rewind($fp); 
		
		while (!feof($fp)) 
		{ $fxt = fgetc($fp);
            if($fxt==" ")
            { echo " ";
		      
			} if($fxt=="\n")
            { echo "<br>";
		      
			}			
            if($fxt !="")
             echo $fxt;				
		}
			}
			$qry="select DISTINCT * from usdetails ;";
			$result =$conn->query($qry);
			echo "<table border=5 color=Marine cellpaddding=2 cellspacing=7>";
		    echo "<tr><th>Username</th><th>Email</th><th>Message</th></tr>";
		 while($row = $result->fetch_assoc())
		 {  echo "<tr><td>".$row["usrname"]."</td><td>".$row["usemail"]."</td><td>".$row["comments"]."</td></tr>";
			 
		 }
         echo "</table>";
	  $conn->close();
   ?>
<hr>
	       <u><b>Copyrights & Copy 2017 All Rights Reserved M2I INDUSTRIES.</b></u>
	            

</body>
</html>