<?php
session_start();
?>
<html>
<head><title>feedback</title></head>
<body bgcolor = #005980 text = white>
<script type = "text/javascript">
function qwerty()
{
a=ff.na.value
b=ff.add.value
c=ff.comm.value

str="Hiii..."+a+" .We have recieved your comment that is '"+c+"' and soon you will receieve a notifiaction about the same on your Email ID that is "+b+" .THANK YOU!! FOR VISITING OUR WEBSITE......"
alert(str)
}
</script>
<br><center><h1><font size = 7 face = "Broadway">F e e d b a c k</font></h1>
<hr size = 4 width = 250 color = white><font size = 3 face = "Broadway"><br>
<form name = ff method=POST action=http://localhost/phpcode/MM12/Anime%20Blog%202/feedphp.php>
Enter Your Name - <input type = text name="na"><br><br>
Enter Your E-mail ID -<input type = text name="add"><br><br>
Enter Your Password -<input type = password name="pass"><br><br>
Gender - <input type =  radio name ="ra" checked>Male <input type = radio name ="ra">Female<br><br>
Age - <select name="sel"><option>None</option>
<option value=15>15</option>
<option value=16>16</option>
<option value=17>17</option>
<option value=18>18</option>
<option value=19>19</option>
<option value=20>20</option>
<option value=21>21</option>
<option value=22>22</option>
<option value=23>23</option>
<option value=24>24</option>
<option value=25>25</option>
<option value=26>26</option></select><br><br>
Your Views -  <br><br><textarea cols =50 rows = 10 name="comm"></textarea><br><br>
<input type=submit value=Submit name=btnsubmit onclick="qwerty()">
<input type=Reset value=Reset> 
</form>
</font>
<?php
if($_SESSION["visit"])
echo "This page has been visited - ".$_SESSION["visit"]=$_SESSION["visit"]+1;
else
$_SESSION["visit"]=1;

?>
<br><br>
</body>
</html>