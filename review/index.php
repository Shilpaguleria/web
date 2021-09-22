<?php require_once("config/connection.php"); 
//echo "msg:".$_GET['msg'];
     if(isset($_SESSION['adm_loginid']))
{
header("location:home.php");
}
$msg='';
if(isset($_GET['msg']))
{
if($_GET['msg']='invalid')
{
$msg="Your User Name or Password Not Valid!";
} 
//echo $msg;
}
     ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
  <title>Admin Panel</title> 
     <link href="Styles/CLStyle.css" rel="stylesheet" type="text/css" />
     
    <style type="text/css">
        .style1
        {
            height: 15px;
        }
    </style>
    <script language="javascript">
        function fnreset() {
            document.form1.reset();
            return true;
        }
    </script>
</head>
<body>
   <form name="frmAdminLogin" action="login.php" method="post" id="loginform" AUTOCOMPLETE = "off">
   
   <input name="acction_type" value="login" type="hidden">
       <div id="centered">
<table width="554" border="0" align="center" bgcolor="white" cellpadding="0" cellspacing="0">
<tr>
    <td width="24"><img src="Images/left_wcorner.jpg" width="24" height="17" /></td>
    <td width="506" align="left" background="Images/bg_top.jpg"><img src="Images/trans.gif" width="1" height="1" /></td>
    <td width="24" align="right"><img src="Images/right_wcorner.jpg" width="24" height="17" /></td>
  </tr>
  
  <tr>
    <td colspan="3" align="center" background="Images/bg_white.jpg">
    <table width="536" border="0" cellspacing="0" bgcolor="white" cellpadding="0">
      <tr>
      
        <td align="left" colspan="3" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="65" align="left" valign="top">
            <img src="Images/logo.jpg" height="83" width="100" />
            <p style="color:#003300;margin:0;padding-left:10px;font-size:20px;"><b><?=PRO_NAME?></b></p></td>
            <td align="right" valign="bottom" class="ar_20b">Control Panel Login</td>
          </tr>
        </table></td>
        
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td align="left" bgcolor="#FFFFFF"></td>
        <td align="right">&nbsp;</td>
      </tr>
      
      <tr>
        <td width="16" align="left"><img src="Images/gray_left.jpg" width="16" height="15" /></td>
        <td bgcolor="#313234"><img src="Images/trans.gif" width="1" height="1" /></td>
        <td width="16" align="right"><img src="Images/right_gray.jpg" width="16" height="15" /></td>
      </tr>
      <tr>
        <td colspan="3" bgcolor="#313234"><img src="Images/trans.gif" width="8" height="8" /></td>
        </tr>
      <tr>
        <td bgcolor="#313234">&nbsp;</td>
        <td height="40" align="left" valign="top" bgcolor="#313234" class="ar_12bw">Enter a valid Username and Password. Then click the &quot;Sign In&quot; button to access the User Control Panel. </td>
        <td bgcolor="#313234">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#313234"><img src="Images/trans.gif" width="8" height="1" /></td>
        <td align="left" bgcolor="#909193" class="ar_12bw"><img src="Images/trans.gif" width="8" height="1" /></td>
        <td bgcolor="#313234"><img src="Images/trans.gif" width="8" height="1" /></td>
      </tr>
      <tr>
        <td bgcolor="#313234">&nbsp;</td>
        <td align="center" bgcolor="#313234" class="ar_12bw"></td>
        <td bgcolor="#313234">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#313234">&nbsp;</td>
        <td align="center" bgcolor="#313234" class="ar_12bw"><table width="98%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="78" align="left" class="ar_12bw">Username</td>
            <td width="426" align="left" class="ar_12bw"><input type="text" name="loginid" size="25" class="textfield" >
            
            </td>
          </tr>
          <tr>
            <td colspan="2"><img src="Images/trans.gif" width="1" height="6" /></td>
          </tr>
          <tr>
            <td align="left" class="ar_12bw">Password</td>
            <td align="left" class="ar_12bw">
           <input type="password" name="password" size="25" class="textfield" >
            </td>
          </tr>
          <tr>
            <td colspan="2" align="left" class="ar_12bw"><img src="Images/trans.gif" width="1" height="6" /></td>
            </tr>
          <tr>
            <td align="left" class="ar_12bw">&nbsp;</td>
            <td align="left" class="ar_12bw">
                               
                   
                  <input type="image" style="height: 18px; width: 54px; border-width: 0px;"  src="Images/sign-in.gif" id="ImgButtonSignIn" name="ImgButtonSignIn">
				  
				 <input type="image" style="height: 18px; width: 54px; border-width: 0px;" onclick="javascript:return fnreset();" src="Images/reset.gif" id="ImgBtnReset" name="ImgBtnReset"></td>
          </tr>
        </table></td>
        <td bgcolor="#313234">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#313234">&nbsp;</td>
        <td align="left" bgcolor="#313234" class="ar_12bw" style="color:#FF0000"><?php echo $msg; ?></td>
        <td bgcolor="#313234">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#313234"><img src="Images/trans.gif" width="8" height="1" /></td>
        <td align="left" bgcolor="#909193" class="ar_12bw"><img src="Images/trans.gif" width="8" height="1" /></td>
        <td bgcolor="#313234"><img src="Images/trans.gif" width="8" height="1" /></td>
      </tr>
      
      <tr>
        <td bgcolor="#313234">&nbsp;</td>
        <td height="40" align="left" valign="bottom" bgcolor="#313234" class="ar_12bw">If you have forgotten your password, click on the &quot;Forgot your Password&quot; link to have a reminder sent to you at the e-mail address you specified during registration. </td>
        <td bgcolor="#313234">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#313234">&nbsp;</td>
        <td height="35" align="left" bgcolor="#313234" class="ar_12bw"> 
         <a href="forgetpassword.php">  <img src="Images/forgot.gif" id="ImgForgot" name="ImgForgot"></a></td>
        <td bgcolor="#313234">&nbsp;</td>
      </tr>
      
       <tr>
        <td><img src="Images/dgray_left.jpg" width="16" height="15" /></td>
        <td bgcolor="#313234"><img src="Images/trans.gif" width="1" height="1" /></td>
        <td><img src="Images/dright_gray.jpg" width="16" height="15" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><img src="Images/left_d_corner.jpg" width="24" height="17" /></td>
    <td background="Images/bg_gray.jpg">&nbsp;</td>
    <td><img src="Images/right_dcorner.jpg" width="24" height="17" /></td>
  </tr>
</table>
</div>
    </form>
</body>
</html>

