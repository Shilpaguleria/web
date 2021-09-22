<?php
include"connection.php";
session_start();
$Uname=@$_REQUEST['Uname'];
$pwd=@$_REQUEST['pwd'];
$_SESSION['Semail']=$Uname;
session_write_close();
    if(@$_REQUEST['Login'])
	   {
	     if($Uname=="" or $pwd=="")
		    {
			$msg="Plise insert id and password....";
			}
		else
		{
		 $mysql="select * from admin where Email='$Uname'";
	   $data=mysql_query($mysql);
	   $rdata=mysql_fetch_array($data);
	   
	      echo $rdata['id'];
			if($rdata['Email']==$Uname and $rdata['password']==$pwd)
			   {
                                   header("Location:home.php");
                                   exit();
                            }
			else
		             {
			      $msg= "Id Password Not Found"; 
			     }		   
		}	
	   
	   }
	   ?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Rate A Tradie Admin Panel</title>
<!----><link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
  <table width="1000" border="0" bgcolor="#000000"align="center" >
       <tr>
            <td width="109" height="61" align="center"><img src="img/tettra_logo2.png"></td>
         <td width=""><font color="#FFFFFF" size="+1">&nbsp;&nbsp;&nbsp;Rate A Tradie - Business Search</font></h2></td>
       </tr>
  </table> 
<div class="cantener">
 <table border="0" align="center">
  <tr bgcolor="#FFFFFF">
        <td width="1000" height="451" colspan="4" bgcolor="#FFFFFF"><form action="index.php">
<table width="350" border="1" align="center" bgcolor="#000000">
<tr> <td height="4" colspan="2"> <?php echo $msg; ?></td></tr>
  	<tr>
      <td width="143" height="37" align="center"><font size="+1" color="#FFFFFF">Email ID:</font></td>
    <td width="274" height="37" align="center"><input type="email" name="Uname" size="30" placeholder="Enter Email Id" required="required" ></td>
	</tr>

	<tr bgcolor="#000000">
	    <td align="center" height="46"><font color="#FFFFFF" size="+1">Password:</font></td>
    <td align="center" height="46"><input type="password" name="pwd" size="30" placeholder="Enter Password" required="required"></td>
  </tr>
    <tr bgcolor="#000000">
    <td height="42" colspan="4" align="center"><input type="submit" name="Login" value="Login" size="20"></td>
     </tr>
</table>
</form>
</td>
  </tr>
</table>
</div>