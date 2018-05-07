<?php
if(isset($_POST['na']))
{
$fp=fopen("feed.txt","a+");
$wert=$_POST['na']."  ".$_POST['add']."  ".$_POST['pass'];
fwrite($fp,$wert."\r\n");
echo "<html><body bgcolor=#005980 text = white><center><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><font size = 4 face=Broadway>Your informtion has been saved in our database......<br><br>Thanks !!  &nbsp&nbspFor your valuable support</font></body></html>";
fclose($fp);
}
if(isset($_POST['btnsubmit']))
?>
