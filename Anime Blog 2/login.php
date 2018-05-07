<html>  
<body bgcolor=black >
<img src="e61217c4cb755ddf22441b26006fdbb6.jpg" height=620 width=1350>
<style>

.dropdown {
    opacity:0.5;
}

</style>


<div style ="position:absolute;top:150;left:380">
<div class = dropdown>
<img src = "log.jpg" height=300 width=600>
</div>
</div>

<div style ="position:absolute;top:180;left:500">
<form name=ff method="POST" >
<font color=white face="Matura MT Script Capitals" size=5>
R E G I S T R A T I O N 
<hr size=2 width=250><br>
User - I d  &nbsp&nbsp&nbsp&nbsp&nbsp<input type=text name="email"><br><br>
P a s s w o r d <input type=text name="pass"><br><br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type=submit name="btnsub">
</form></font>
</div >

<div style ="position:absolute;top:470;left:480">
<?php
if(isset($_REQUEST['btnsub']))
{$GLOBALS['na']=$_POST['email'];
$pas=$_POST['pass'];
if($na=='' OR $pas=='')
	die("<font size=6 face=Lucida Fax color=white>Please enter permissible values</font>");
$conn=new mysqli("localhost","root","sunbeam","feedback2");
$record = "insert into pranshu values('$na','$pas');";
if($conn->query($record)==true)
echo "<a href=main.html style='color:white;text-decoration:none;font-size:25'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCLICK TO VISIT.....</a>";
else
echo "not";}
?>
</div>
</body>
</html>