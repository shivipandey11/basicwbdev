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
	<h3><a href="categories.php">Home</a>    &nbsp &nbsp|&nbsp &nbsp      <a href="salesanddiscounts.html">Sales And Discounts</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="cntct.php">Login/Sign up</a>    &nbsp &nbsp|&nbsp &nbsp        <a href="aboutus.html">About Us</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="contactus.html">Contact Us</a>    &nbsp &nbsp|&nbsp &nbsp    <a href="privacypolicy.html">Privacy Policy</a></h3>
<hr>

<center>
<form name=ff method=POST>
<BR> <center> <h2><u>Messages </u></h2></center>

User Name:<br>
<input type="text" name=usnm><br>
Password:<br>
     <input type="password"  name=pswd><br>
  <br>

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
				die("Could not connect".$conn->connect_error);
			
			  $usnm= $_POST['usnm'];
			   $pswd=$_POST['pswd']; 
			$qry="select user_key from owner where user_name='$usnm';";
			$regpsd =$conn->query($qry);
		 while($psdopt = $regpsd->fetch_assoc())
		 {
			 if($psdopt['user_key']==$pswd)
			 { echo "Click <a href=messages.php>here</a> to continue";
			 break;}
			 
		 }
         
	  }
   ?>
<hr>
	       <u><b>Copyrights & Copy 2017 All Rights Reserved M2I INDUSTRIES.</b></u>
	            

</body>
</html>