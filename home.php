<?php
include "connection.php";
session_start();
$email=$_SESSION['Semail'];
 if($email!="")
    {
      $msg=$email;
    }  
    else
    {
//echo "hi...";
   header("Location:index.php");
exit();
    }       
?>
<?php
//<<<<<<<<<<<<TO Export Table>>>>>>>>>>>>>>>>>>>
include "connection.php";
 if($_REQUEST['export'])
 {
define("DB_NAME", "solarpan_Tettra_App"); // db name
define("TABLE_NAME", "tettraAppF"); // table
$filename="Rate_A_Tradie_Listings.xls";
$out = '';
//$field_name = mysql_list_fields(DB_NAME, TABLE_NAME);
$field_name = mysql_list_fields(solarpan_Tettra_App, tettraAppF);
$count_field = mysql_num_fields($field_name); // count the table field

for ($i = 0; $i < $count_field; $i++) { // name of all fields
    $l = mysql_field_name($field_name, $i);
    $out .= $l . "\t"; // echo table fileds,
}

$out .= "\n"; // echo new line
$query = "SELECT * FROM tettraAppF Order by id desc";
    $data= mysql_query($query);
while($row = mysql_fetch_array($data)) 
 {
    for ($i = 0; $i < $count_field; $i++) 
    {
        $out .= $row["$i"] . "\t"; // echo data,
    }
   $out .= "\n"; // echo new line per data
}
// Output to browser with appropriate mime type.
 header('Content-type: application/ms-excel');
 header('Content-Disposition: attachment; filename='.$filename);
echo $out; // output
exit;
}
?>

<?php
//<<<<<<<<<<<<<<For Accept or Reject>>>>>>>>>>>>>>>
include "connection.php";
//<<<<<<<<<<<<<<For Update Status as 1 as accept>>>>>>>>>>>>>>>>>>>>>  
 $data=$_REQUEST['val'];
 //echo $data;
if($data!='')
   {
    $sql="select * from tettraAppF where id='$data'";
            $fdata=mysql_query($sql);
            $fech_data=mysql_fetch_array($fdata);
            $email_id= $fech_data['email'];
              if($fech_data['verify']!=1)
                {
  $sql="UPDATE tettraAppF SET verify=1 where id='$data'";
                mysql_query($sql);
                //echo "changes Successfully";
?>
<script>alert("Your Listing has been Accepted.");</script>
<?php
}
else
{
?>
<script>alert("Your Listing has been already Accepted.");</script>
<?php
}
}
?>
<?php
//<<<<<<<<<<<For DELETE INTRY>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
 $Ddata=$_REQUEST['Ddata'];
 //echo $data;
if($Ddata!='')
   {
 $sql="select email from tettraAppF where id='$Ddata'";
            $data=mysql_query($sql);
                   $fech_data=mysql_fetch_array($data);
$email_id= $fech_data['email'];
$sql="DELETE from tettraAppF where id='$Ddata'";
                mysql_query($sql);
                //echo " ID DELETED";
$Email_Id = $email_id;
{
//Edit the two lines below
$to=$email_id ;
$subject="Your Listing has been Deleted.";

$email_message .= "Thank you for creating a listing on Rate A Tradie. Unfortunately it has been rejected due to insufficient data or in-appropriate information. Kindly add a new listing with correct data so that it can be verified and listed with us.

Team Rate A tradie";
 
  
 
 // create email headers
 
$headers = 'From: '.$email."\r\n".
 
'Reply-To: '.$email."\r\n".
 
'X-Mailer: PHP/' . phpversion();
 
@mail($to, $subject, $email_message, $headers);  
 
}
?>
<script>alert("Your Listing has been successfully Deleted.");</script>
<?php
}
?>
<?php
//<<<<<<<<<<<<<<For Update Status as '0' for reject>>>>>>>>>>>>>>>>>>>>>
$rdata=$_REQUEST['Ustatus'];
if($rdata!='')
   {
    $sql="select * from tettraAppF where id='$rdata'";
            $data=mysql_query($sql);
            $fech_data=mysql_fetch_array($data);
            $email_id= $fech_data['email'];
              if($fech_data['verify']!=0)
                {
         $sql="UPDATE tettraAppF SET verify=0 where id='$rdata'";
                mysql_query($sql);
                //echo "changes Successfully";
$Email = $email_id;
//$emaile="narendrakumarmtr@gmail.com";
{
//Edit the two lines below
$to=$email_id ;
$subject="Your Listing has been Rejected";

$email_message .= "Thank you for creating a listing on Rate A Tradie. Unfortunately it has been rejected due to insufficient data or in-appropriate information. Kindly add a new listing with correct data so that it can be verified and listed with us.

Team Rate A tradie";
 
  
 
 // create email headers
 
$headers = 'From: '.$email."\r\n".
 
'Reply-To:'.$email."\r\n";
//'Reply-To:';
 
'X-Mailer: PHP/' . phpversion();
 
@mail($to, $subject, $email_message, $headers);  
 
}
?>
<script>alert("Your Listing has been Rejected.");</script>
<?php
}
else
{
?>
<script>alert("Your Listing has been already rejected.");</script>
<?php
}
}
?>

<head>
<title>Rate A Tradie | Homepage</title>
<link href="css/style1.css" rel="stylesheet" type="text/css">
<link href="css/design.css" rel="stylesheet" type="text/css">
<link href="css/demo_table.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js"></script>
<script src="js/jquery.dataTables.js" ></script>
</head>
<script type="text/javascript">
	/* <![CDATA[ */
	jQuery(document).ready(function(){
		jQuery('#memberlist').dataTable();
	});
	/* ]]> */

</script>
<html>
<head>
<title>Rate A Tradie | Listings </title>
</head>
<html>
<head>
<script>
function newDoc(x)
  {
  //alert(x);
var res=x;
 // alert (res);
window.location.assign("http://www.101atkins.com/Tettra_App/admin/home.php?val="+res )
var id="Accept_"+x;
//alert(id);
//document.getElementById(id).disabled=true;
}
</script>
</head>
<body>
</body>
</html>

<html>
<head>
<script>
function deletf(x)
  {
  //confirm("Press on ok button to delete");
var res=x;
  //alert (res);
window.location.assign("http://www.101atkins.com/Tettra_App/admin/home.php?Ddata="+res )
  }
</script>
</head>
<body>
</body>
</html>
<head>


<html>
<head>
<script>
function Myfunction(x)
  {
 //alert("Already Rejected");
var res=x;
  //alert (res);
window.location.assign("http://www.101atkins.com/Tettra_App/admin/home.php?Ustatus="+res )
  }
</script>
</head>
<body>
</body>
</html>

<div class="mainvieu">
<div class="logout" align="right"><a href="index.php">Logout</font></a> </a></div>
<div class="header">
<table  border="0" bgcolor="#000000" width="">
       <tr>
            <td width="109" height="70" align="right"><a href="home.php"><img src="img/tettra_logo2.png"></a></td>
         <td width="1100"><font color="#FFFFFF" size="+1">&nbsp;&nbsp;<b>Rate A Tradie - Business Search</b></font></h2><p align="right"><font color="#FF0000">
       <a href="home.php"><font color="#FFFFFF">Home</font></a> </a> <font color="#FFFFFF">    |</font>                  
       <a href="result1.php"><font color="#FFFFFF">User Data</font></a></a> <font color="#FFFFFF">    |</font>    
       <a href="duplicate.php"><font color="#FFFFFF">Duplicate Values</font></a><font color="#FFFFFF">    | </font>  <a href="importdata.php"><font color="#FFFFFF">Import Data</font></a></a> <font color="#FFFFFF">    | </font>  <a href="export.php"><font color="#FFFFFF">Export</font></a>
          </tr>
</table>
  </div>
<div class="icons"> 
<table border=" >
       <tr>
            <td height="53" colspan="20" align="left" border="2">Welcome:&nbsp;&nbsp;<?php echo $msg;?></td>       
       </tr>
  </table> 
</div>
<div class="wrap">
<div class="datagrid">
<table class="wp-list-table widefat fixed " id="memberlist" border="1" width="1160">
<thead>
  <tr>
       <th>Status</th>
       <th>Date</th> 
        <th>Id</th>
	<th>Name</th>
	<th>TradeName</th>
	<th>ABN</th> 
        <th>Phone</th>
	<th>zip</th>
	<th>Address</th>
	<th>Email</th> 
        <th>Website</th>
	<th>Category</th>
	<th>City</th>
 	<th>Costrate</th> 
        <th>SR</th>
	<th>PR</th>
	<th>AR</th>
	<th>Verify</th>
  </tr>
 </thead>
  <tbody>

<?php
		$sql = "select * from tettraAppF ORDER BY id DESC"; 
		$result = mysql_query($sql) or die ('Error, query failed');

		if (mysql_num_rows($result) > 0 )
		{

		?>
<?php
			while ($row = mysql_fetch_array($result))
			{
                      if($row ['verify']==0)
                      {
			$rdata=$row['id'];
                        $varify=$row['verify'];
	?>

     <tr>
 <th><input type="button" name="Accept" value="Accept" onClick="newDoc(<?php echo $rdata?>)" id="Accept"><br/><input type="button" value="Reject" name="Reject" onClick="Myfunction(<?php echo $rdata?>)" id="Reject"><br/><input type="button" value="Delete" name="delete" onClick="deletf(<?php echo $rdata?>)" id="delete"></th> 
			<th width=10><font size="-1"><?php echo $row['Date'] ?></font></th>
                        <th><font size="-1"><?php echo $row['id'] ?></font></th>
			<th><font size="-1"><?php echo $row['firstname'].$row['lastname']?></font></th>
			<th><font size="-1"><?php echo $row['tradename'] ?></font></th>
			<th><font size="-1"><?php echo $row['abn'] ?></font></th> 
			<th><font size="-1"><?php echo $row['phone'] ?></font></th>
			<th><font size="-1"><?php echo $row['zip'] ?></font></th>
			<th><font size="-1"><?php echo $row['address'] ?></font></th>
			<th><font size="-1"><?php echo $row['email'] ?></font></th> 
			<th><font size="-1"><?php echo $row['website'] ?></font></th>
			<th><font size="-1"><?php echo $row['category'] ?></font></th>
			<th><font size="-1"><?php echo $row['city'] ?></font></th>
			<th><font size="-1"><?php echo $row['costrate'] ?></font></th> 
			<th><font size="-1"><?php echo $row['servicerate'] ?></font></th>
			<th><font size="-1"><?php echo $row['professionalismrate'] ?></font></th>
			<th><font size="-1"><?php echo $row['averagerate'] ?></font></th>
			<th><font size="-1"><?php echo $row['verify'] ?></font></th>
		</tr>
<?php 
}
}
}
 else
  { 
?>
  <tr>
     <td colspan="6" style="text-align: center;">No Record Found!</td>
  <tr>
<?php
	
 }

 ?>
</tbody>
</table></div>  
</div>
<div class="export">


</body> 
</html>
</div> 
</div>
 